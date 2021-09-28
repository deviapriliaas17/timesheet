<?php

namespace App\Http\Controllers;

use App\Permissions;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index() 
    {
        $permissions = Permissions::all(); 
        return view('permission.index', compact('permissions'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'permission' => 'required'
        ]);

        $permission = new Permissions();

        $permission->name = $request->input('permission');
        $permission->guard_name = 'web';

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

        $permission->update();

        return redirect('/permission')->with('success','Permission data has been successfully updated!');
    }

    public function destroy($id)
    {
        Permissions::destroy($id);
        return redirect('/permission')->with('success', 'Permission data has been deleted!');
    }
}
