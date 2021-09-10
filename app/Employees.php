<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table = 'users';
    protected $fillable = ['name_employee', 'namecode', 'role_id', 'email','position_code', 'address', 'handphone'];

}
