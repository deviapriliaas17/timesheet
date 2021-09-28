<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('role:admin');
    // }


    public function index()
    {
        $roles = Role::all();
        $data = DB::table('roles')
                ->paginate(5);
        return view('role.index', compact('roles','data'));
    }

    public function create() 
    {
        $category = Permission::select('category')->groupBy('category')->get();
        
        foreach($category as $key => $value){
            $permission = Permission::where('category', $value->category)->pluck('name'); 
            $category[$key]->permission = $permission;
        }
        return view('role.create',compact('category'));
    }

    public function store(Request $request)
    {        
        $role = new Role();

        $role->name = $request->input('role_name');
        $role->guard_name = 'web';
        $role->save();

        $idRole = Role::where('name', $role->name)->pluck('id')->first();
        $role = Role::find($idRole);
        
        foreach($request->permission as $p){
            $role->givePermissionTo($p); 
        }

        return redirect('/role');
    }

    public function edit($id)
    {
        $category = Permission::select('category')->groupBy('category')->get();
        
        foreach($category as $key => $value){
            $permission = Permission::where('category', $value->category)->pluck('name'); 
            $category[$key]->permission = $permission;
        }

        $role = DB::table('roles')
                ->select('id','name')
                ->where('id', $id)
                ->first();

        return view('role.edit',compact('role','category'));
    }

    public function destroy($id)
    {
        Role::destroy($id);
        return redirect('/role')->with('success','Role data has been successfully deleted!');
    }
}
