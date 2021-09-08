<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Employees;
use App\Positions;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
    public function index() 
    {
        $employees = Employees::all();
        $positionEmployee = Positions::all();
        $positionEmployee = Positions::pluck('name_position', 'id');
        $id = 1;
        $data = DB::table('employees')
                ->join('positions','positions.id','=','employees.position_code')
                ->get();
        return view('employee.index', compact('employees','data','positionEmployee','id'));
    }

    public function create()
    {
        // $positions = Position::all();
        // $positions = Position::pluck('name','id');
        // $id = 2;
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'address' => 'required',
                'contact' => 'required',
                // 'email' => 'required|email|unique:employees',
                // 'position' => 'required'
            ]);
            
            for ($i=0; $i < count((array)$request->project_code); $i++) {
            $employees = new Employees();
            $employees->name = $request->input('name');
            $employees->address  = $request->input('address');
            $employees->employee_code  = str_random(3);
            // $employees->email = $request->input('email');
            $employees->handphone = $request->input('contact');
            // $employees->position = $request->input('position');

            $employees->save();
            };

            return redirect('/timesheet')->with('success', 'Successfully!');
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/employee')->with('success','Employee data has been successfully deleted!');
    }
}
