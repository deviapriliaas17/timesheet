<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() 
    {
        return view('employee.index');
    }

    public function create()
    {
        // $positions = Position::all();
        // $positions = Position::pluck('position','id_position');
        // $id_position = 2;
        return view('employee.create');
    }
}
