<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Employees;
use App\Positions;
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
                ->select('users.name_employee','positions.name_position','users.address','users.contact','users.id','users.avatar')
                ->get();

        return view('employee.index', compact('data'));
    }

    public function create(Roles $roles, Positions $positions, Request $request)
    {
        $positions = Positions::all();
        $positions = Positions::pluck('name_position','id');
        $id_positions = 2;
        
        $roles = Roles::all();
        $roles = Roles::pluck('name','id');
        $id_roles = 2;

        return view('employee.create', compact('positions', 'roles', 'id_positions', 'id_roles') );
    }

    public function edit($id)
    {   
        
        $user = User::join('positions','positions.id','=','users.position_code')
                ->select('users.id','users.name_employee','users.namecode','users.email','positions.name_position','users.position_code','users.address','users.contact','users.avatar')
                ->where('users.id', $id)
                ->first();
        
        $positions = Positions::all();
        $positions = Positions::pluck('name_position','id');
        $id_positions = 2;

        $roles = Roles::all();
        $roles = Roles::pluck('name','id');
        $id_roles = 2;
        
        return view('employee.edit', compact('user','positions', 'roles', 'id_positions', 'id_roles') );
    }

    public function store(Request $request)
    {
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
            
            return redirect('/employee')->with('success', 'Successfully!');
        }
        
        public function update(Request $request, $id)
        {
            // $role = Role::find($request->role);
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
            // TEST
                
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

            return redirect('/employee')->with('success', 'Successfully!');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/employee')->with('success','Employee data has been successfully deleted!');
    }
}
