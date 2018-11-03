<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User;

class Admin extends User
{
    //
    use Notifiable;
    protected $fillable=[
      'name',
      'img',
      'email',
      'password'
    ];
}
