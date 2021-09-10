<?php

namespace App\Http\Controllers;

use DB;
use App\Roles;
use App\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('role:admin');
    // }


    public function index()
    {
        $roles = Roles::all();
        $data = DB::table('roles')
                ->paginate(5);
        return view('role.index', compact('roles','data'));
    }

    public function create() {
        return view('role.create');
    }

    public function store ()
    {

    }
}
