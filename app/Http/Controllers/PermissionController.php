<?php

namespace App\Http\Controllers;

use App\CategoryPermissions;
use App\Permissions;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index() 
    {
        $permissions = Permissions::all(); 
        $permissions_category = CategoryPermissions::pluck('name_category','name_category');
        $category = 2;
        // $permissions_category = Permissions::pluck('category','category');
        // $category = 2;

        return view('permission.index', compact('permissions_category','permissions','category'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'permission' => 'required'
        ]);

        $permission = new Permissions();

        $permission->name = $request->input('permission');
        $permission->guard_name = 'web';
        $permission->category = $request->input('permission_category');
        
        $permission->save();
        
        return redirect('/permission')->with('success','Permission data has been successfully added!');
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'permission' => 'required',
        ]);
        
        $permission = Permissions::findOrFail($request->permission_id);
        $permission->name = $request->input('permission');
        $permission->category = $request->input('permission_category');

        $permission->update();

        return redirect('/permission')->with('success','Permission data has been successfully updated!');
    }

    public function destroy($id)
    {
        Permissions::destroy($id);
        return redirect('/permission')->with('success', 'Permission data has been deleted!');
    }
}
