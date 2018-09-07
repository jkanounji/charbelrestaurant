<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use softDeletes;

    protected $fillable = [
        'name', 'phone', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }

    public function reservation()
    {
        return $this->belongsTo('App\Reservation');
    }
}
