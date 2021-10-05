<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectLocationEmployees extends Model
{
    protected $table = 'user_project_locations';
    protected $fillable = ['namecode', 'project_location_code'];
}
