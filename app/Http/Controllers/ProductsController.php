<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('name', 'asc')->get();

        return view('products.index')->with('products', $products);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|integer',
            'description' => 'required',
            'photo' => 'image|required|max:1999'
        ]);

        $filename_with_ext = $request->file('photo')->getClientOriginalName();
        $filename = pathinfo($filename_with_ext, PATHINFO_FILENAME);
        $extension = $request->file('photo')->getClientOriginalExtension();
        $filename_to_store = $filename.'_'.time().'.'.$extension;
        $path = $request->file('photo')->storeAs('public/product_images', $filename_to_store);

        $product = new Product;
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->display_price = number_format($request->input('price'));
        $product->description = $request->input('description');
        $product->photo = $filename_to_store;
        $product->save();

        return redirect('/products')->with('success', 'Product Created');
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show')->with('product', $product);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit')->with('product', $product);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|integer',
            'description' => 'required',
            'photo' => 'image|max:1999'
        ]);

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->display_price = number_format($request->input('price'));
        $product->description = $request->input('description');
        if ($request->hasFile('photo'))
        {
            $filename_with_ext = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filename_with_ext, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filename_to_store = $filename.'_'.time().'.'.$extension;
            $path = $request->file('photo')->storeAs('public/product_images', $filename_to_store);
            $product->photo = $filename_to_store;
        }
        $product->save();

        return redirect('/products/'.$id)->with('success', 'Product Updated');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        Storage::delete('public/product_images/'.$product->photo);
        $product->delete();
        return redirect('/products')->with('success', 'Product Deleted');
    }
}
