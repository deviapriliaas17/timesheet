<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Employees;
use App\Projects;
use App\ProjectLocation;
use App\Positions;
use App\ProjectLocationEmployees;
use App\Roles;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\CssSelector\Node\PseudoNode;
use Hash;

class EmployeeController extends Controller
{
    public function index() 
    {
        $data = User::join('positions','positions.id','=','users.position_code')
                ->join('user_project_locations','user_project_locations.namecode','=','users.namecode')
                ->select('users.name_employee','positions.name_position','users.address','users.contact','users.id','user_project_locations.project_location_code','users.avatar')
                ->get();

        // dd($data[1]->name_employee);
                
        return view('employee.index', compact('data'));
    }

    public function create(Roles $roles, Positions $positions, Request $request)
    {
        $positions = Positions::select('name_position','id')->get();
        
        $roles = Roles::select('name','id')->get();
        
        $project_locations = ProjectLocation::select('location_name','project_location_code')->get();
        
        return view('employee.create', compact('positions', 'roles', 'project_locations') );
    }
    
    public function edit($id)
    {   
        $user = User::join('positions','positions.id','=','users.position_code')
        ->join('user_project_locations','user_project_locations.namecode','=','users.namecode')
        ->select('users.id','users.name_employee','users.namecode','users.email','positions.name_position','users.position_code','users.address','users.contact','users.avatar','user_project_locations.project_location_code')
        ->where('users.id', $id)
        ->first();
        
        $positions = Positions::pluck('name_position','id');
        $id_positions = 1;
        
        $roles = Roles::pluck('name','id');
        $id_roles = 1;
        
        $project_locations = ProjectLocation::pluck('location_name','project_location_code');
        $id_location_project = 1;
        // $project_locations = ProjectLocation::select('location_name','project_location_code')->get();

        return view('employee.edit', compact('user','positions', 'roles', 'id_positions', 'id_roles','project_locations','id_location_project') );
    }

    public function store(Request $request)
    {
        dd($request->all());
        $request->validate(
            [
                'name_employee' => 'required',
                'address' => 'required',
                'contact' => 'required',
                'email' => 'required|string|email|max:255|unique:users',
                'position' => 'required',
                'role' => 'required',
                'password' => 'required',
            ]);
            
            $user = new User();
            
            $user->name_employee = $request->input('name_employee');
            $user->namecode = str_random(5);
            $user->address  = $request->input('address');
            $user->contact  = $request->input('contact');
            $user->email = $request->input('email');
            $user->position_code = $request->input('position');
            $user->password = Hash::make($request->input('password'));
            
            if($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/employee/', $filename);
                $user->avatar = $filename;
            } else {
                $user->avatar = 'user.jpg';
            }
            
            $user->save();
            $user->assignRole($request->input('role'));
            
            $employee = $user->namecode;
            
            $userLocation = new ProjectLocationEmployees();
            
            $userLocation->namecode = $employee;
            $userLocation->project_location_code = $request->input('project_location');
            $userLocation->save();

            return redirect('/employee')->with('success', 'Successfully!');
        }
        
        public function update(Request $request, $id)
        {   
            dd($request);
            $request->validate(
                [
                    'name_employee' => 'required',
                    'address' => 'required',
                    'contact' => 'required',
                    'email' => 'required',
                    'position' => 'required',
                    'role' => 'required',
                ]);
                
            $user = User::findOrFail($request->id);
            
            foreach($user->roles as $role){
                $user->removeRole($role->id);
            }
                
            $user->name_employee = $request->input('name_employee');
            $user->address  = $request->input('address');
            $user->contact  = $request->input('contact');
            $user->email = $request->input('email');
            $user->position_code = $request->input('position');
            $user->password = Hash::make($request->input('password'));
            
            if($request->hasFile('avatar')) 
            {
                $destination = 'uploads/employee/'.$user->avatar;
                    if(File::exists($destination))
                    {
                        File::delete($destination);
                    }
                    $file = $request->file('avatar');
                    $extension = $file->getClientOriginalExtension();
                    $filename =  time() . '.' . $extension;
                    $file->move('uploads/employee/', $filename);
                    $user->avatar = $filename;
            }

            $user->update();
            $role = Role::find($request->role);
            $user->assignRole($role->name);

            // $userLocation = ProjectLocation::findOrFail($request);
            
            // $userLocation->namecode = $employee;
            // $userLocation->project_location_code = $request->input('project_location');
            // $userLocation->save();

            return redirect('/employee')->with('success', 'Successfully!');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/employee')->with('success','Employee data has been successfully deleted!');
    }
}
