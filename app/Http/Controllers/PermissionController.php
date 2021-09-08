<?php

namespace App\Http\Controllers;

use App\Permissions;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index() {

        $permissions = Permissions::all(); 
        return view('permission.index', compact('permissions'));
    }
}
