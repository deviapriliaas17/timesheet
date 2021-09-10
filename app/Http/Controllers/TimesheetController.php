<?php

namespace App\Http\Controllers;

use DB;
use DateTime;
use App\Timesheet;

use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    public function index() 
    {
        // $tgl = '25';
        // $monthNow = new DateTime('m');
        // dd($tgl.'-'.$monthNow);
        $begin = new DateTime( "2021-09-25" );
        $end   = new DateTime( "2021-10-25" );
        $dates = [];
        
        $interval = $begin->diff($end);
        $days = $interval->days;
        // for($i = $begin; $i <= $end; $i->modify('+1 day')){
        //     return $i->format("Y-m-d");
        // }

        for($i = 0; $i <= $days;$i++){
            $begin = new DateTime( "2021-09-25" );
            date_add($begin, date_interval_create_from_date_string($i.' days'));
            array_push($dates, date_format($begin, "d-m-Y"));
        }
        // dd($date);
        
        $data = DB::table('project_locations')
        ->join('projects','projects.project_code','=','project_locations.project_code')
        // ->join('user_project_locations','user_project_locations.project_location_code','=','project_locations.project_location_code')
        ->paginate();

        return view('timesheet.index', compact ('dates','data'));
    }

    public function create($location) 
    {   
        $data = DB::table('user_project_locations')
                ->join('users','users.namecode','=','user_project_locations.namecode')
                ->select('user_project_locations.id','users.namecode','name_employee','project_location_code')
                ->where('project_location_code', $location)
                ->paginate(100);        

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
