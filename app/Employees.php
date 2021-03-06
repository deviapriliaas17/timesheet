<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\{ProjectLocationEmployees, ProjectLocation};

class Employees extends Model
{
    protected $table = 'users';
    protected $fillable = ['id','name_employee', 'namecode', 'role_id', 'email','position_code', 'address', 'contact'];

}
