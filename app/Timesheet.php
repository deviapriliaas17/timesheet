<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
        protected $table = 'timesheet';
        protected $fillable = ['namecode', 'project_location_code', 'work', 'mandays', 'absent', 'notes','dates'];
}
