<?php

namespace App\Http\Controllers;

use DB;
use App\Timesheet;

use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    public function index() 
    {
        $tanggal = [25,26,27,28,29,30,31,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25];
        
        $data = DB::table('project_locations')
        ->join('projects','projects.project_code','=','project_locations.project_code')
        // ->join('user_project_locations','user_project_locations.project_location_code','=','project_locations.project_location_code')
        ->get();

        return view('timesheet.index', compact ('tanggal','data'));
    }

    public function create() 
    {   
        $data = DB::table('user_project_locations')
                ->join('users','users.namecode','=','user_project_locations.namecode')
                ->select('user_project_locations.id','users.namecode','name_employee','project_location_code')
                ->paginate(5); 
        
        return view('timesheet.create',compact('data'));
    }
    

    public function store(Request $request)
    {
        for ($i=0; $i < count((array)$request->id); $i++) {
            $timesheet = new Timesheet();        
            $timesheet->namecode = $request->namecode[$i];
            $timesheet->project_location_code = $request->project_location_code[$i];
            $timesheet->work = $request->working[$request->id[$i]];
            $timesheet->mandays = $request->mandays[$request->id[$i]];
            $timesheet->absent = $request->absent[$request->id[$i]];
            $timesheet->notes = $request->noteTimesheet[$i];
            $timesheet->save();
        };

        return redirect('/timesheet')->with('success','Saved!');
    }
}
