<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/util.js') }}" defer></script>
    <script src="{{ asset('js/breakpoints.min.js') }}" defer></script>
    <script src="{{ asset('js/browser.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    

</head>
<body>
    <div id="app">
        <header id="header">
        </header>
        @include('layouts.navbar')

        <main class="py-4">
            @include('layouts.messages')
            @yield('content')
        </main>
    </div>
</body>
@include('layouts.footer')
</html>
