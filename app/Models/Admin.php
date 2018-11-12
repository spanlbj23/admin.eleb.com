<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User;
use Spatie\Permission\Traits\HasRoles;

class Admin extends User
{
    //
    use HasRoles;
    use Notifiable;
    protected $guard_name='web';
    protected $fillable=[
      'name',
      'img',
      'email',
      'password'
    ];
}
