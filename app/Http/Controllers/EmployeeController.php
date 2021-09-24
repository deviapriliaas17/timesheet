<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Employees;
use App\Positions;
use App\Roles;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\CssSelector\Node\PseudoNode;

class EmployeeController extends Controller
{
    public function index() 
    {
        $data = DB::table('users')
                ->join('positions','positions.id','=','users.position_code')
                ->join('roles','roles.id','=','users.role_id')
                ->select('users.name_employee','positions.name_position','users.address','users.contact','roles.name','users.id','users.avatar')
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
        
        $user = DB::table('users')
                ->join('positions','positions.id','=','users.position_code')
                ->join('roles','roles.id','=','users.role_id')
                ->select('users.id','users.role_id','users.name_employee','users.namecode','users.email','positions.name_position','users.position_code','users.address','users.contact','roles.name','users.avatar')
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
            ]);
            
            $user = new User();
    
            $user->name_employee = $request->input('name_employee');
            $user->namecode = str_random(5);
            $user->address  = $request->input('address');
            $user->contact  = $request->input('contact');
            $user->email = $request->input('email');
            $user->position_code = $request->input('position');
            $user->role_id = $request->input('role');
            $user->password = '';
            
            if($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/employee/', $filename);
                $user->avatar = $filename;
            } else {
                return $request;
                $user->avatar = '';
            }

            $user->save();

            return redirect('/employee')->with('success', 'Successfully!');
    }

    public function update(Request $request)
    {
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
    
            $user->name_employee = $request->input('name_employee');
            $user->address  = $request->input('address');
            $user->contact  = $request->input('contact');
            $user->email = $request->input('email');
            $user->position_code = $request->input('position');
            $user->role_id = $request->input('role');
            
            if($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/employee/', $filename);
                $user->avatar = $filename;
            } else {
                $user->avatar = '';
            }

            $user->update();

            return redirect('/employee')->with('success', 'Successfully!');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/employee')->with('success','Employee data has been successfully deleted!');
    }
}
