<?php

namespace App\Http\Controllers;

use App\CategoryPermissions;
use App\Permissions;
use Illuminate\Http\Request;

class CategoryPermissionController extends Controller
{
    public function index()
    {
        $categoryPermissions = CategoryPermissions::all(); 
        return view('CategoryPermission.index', compact('categoryPermissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required'
        ]);

        $categoryPermissions = new CategoryPermissions();

        $categoryPermissions->category_code = str_random(3);
        $categoryPermissions->name_category = $request->input('category');

        $categoryPermissions->save();

        return redirect('/category_permission')->with('success','Category Permissions has been successfully added!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'category_permission' => 'required'
        ]);

        $categoryPermissions = CategoryPermissions::findOrFail($request->category_id);
        $categoryPermissions->name_category = $request->input('category_permission');

        $categoryPermissions->update();
        
        return redirect('/category_permission')->with('success', 'Category Permission data has been updated!' );
    }


    public function destroy($id)
    {
        CategoryPermissions::destroy($id);
        return redirect('/category_permission')->with('success','Category Permission data has been deleted!');
    }


}
