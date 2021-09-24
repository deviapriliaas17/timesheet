<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $table = 'users';
    protected $fillable = ['id','role_id','name_employee','namecode', 'email','position_code','address', 'contact', 'avatar'];
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

}
