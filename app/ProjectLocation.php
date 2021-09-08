<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectLocation extends Model
{
    protected $table = 'project_locations';
    protected $fillable = ['project_location_code', 'project_code', 'location_name'];
}
