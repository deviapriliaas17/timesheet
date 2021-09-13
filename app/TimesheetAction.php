<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimesheetAction extends Model
{
    protected $table = 'timesheet_action';
    protected $fillable = ['timesheet_code','project_location_code', 'processed_datetime', 'processed_by'];
}
