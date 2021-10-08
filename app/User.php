<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\{ProjectLocationEmployees, ProjectLocation};

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $table = 'users';
    protected $fillable = ['id','role_id','name_employee','password','namecode', 'email','position_code','address', 'contact', 'avatar'];
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];
    
    protected $appends = ['location_name'];

    public function getLocationNameAttribute(){
        if($this->attributes['namecode']){
            $dataLocation  = ProjectLocationEmployees::where('namecode', $this->attributes['namecode'])->first();

            $location = ProjectLocation::where('project_location_code', $dataLocation->project_location_code)->pluck('location_name')->first();
            // $location = ProjectLocation::where('project_location_code', $dataLocation->project_location_code)->get();
            return $location;
        }

    }
}
