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
                ->join('users','users.role_id','=','roles.id')
                ->get();
        return view('role.index', compact('roles', 'data'));
    }

    public function create() {
        return view('role.create');
    }

    public function store ()
    {

    }
}
