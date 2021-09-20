<?php

namespace App\Http\Controllers;

use DB;
use DateTime;
use App\Timesheet;
use App\TimesheetAction;
use App\ProjectLocation;
use Auth;

use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    public function index(Request $request) 
    {
        $location_project = ProjectLocation::pluck('project_location_code');
        // dd($location_project);

        $begin = new DateTime( "25-09-2021" );
        $end   = new DateTime( "25-10-2021" );
        $dates = [];

        $interval = $begin->diff($end);
        $days = $interval->days;
        
        // looping for dates
        for($i = 0; $i <= $days;$i++){
            $begin = new DateTime( "25-09-2021" );
            date_add($begin, date_interval_create_from_date_string($i.' days'));
            array_push($dates, date_format($begin, "Y-m-d"));
        }
        
        // project_location
        $data = DB::table('project_locations')
                ->join('projects','projects.project_code','=','project_locations.project_code')
                // ->join('user_project_locations','user_project_locations.project_location_code','=','project_locations.project_location_code')
                ->paginate();
                
        
        $checkProject = ProjectLocation::pluck('project_location_code');
        $res=[];
        foreach($checkProject as $check){
            $timesheet_action = DB::table('timesheet_action')
                            ->where('project_location_code', $check )
                            ->pluck('processed_datetime')
                            ->all(); 
            $res[$check] = $timesheet_action;
        }
        // $timesheet_action = DB::table('timesheet_action')
        //                     ->where('project_location_code', 'Asd' )
        //                     ->pluck('processed_datetime')
        //                     ->all();                            
        // $timesheet_action['date'] = $timesheet_action;
        // $timesheet_action['project'] = $location_project->toArray();
                            // dd($timesheet_action);
                            // dd(count((array)$timesheet_action));
        // timesheet
        $timesheet = DB::table('timesheet')
                    ->select('work','mandays','absent','processed_datetime')
                    ->get();


        return view('timesheet.index', compact ('dates','data','timesheet','res'));
    }
    public function create($location, $day) 
    {  
        $dates=[$day];

        $data = DB::table('user_project_locations')
                ->join('users','users.namecode','=','user_project_locations.namecode')
                ->select('user_project_locations.id','users.namecode','name_employee','project_location_code')
                ->where('project_location_code', $location)
                ->paginate(10);        

        return view('timesheet.create',compact('data','dates'));
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
            $timesheet->processed_datetime = $request->day[$i];
            $timesheet->save();
            
        };
        
        for ($i=0; $i < count((array)$request->id); $i++) {
            $timesheet_action = new TimesheetAction();
            $timesheet_action->project_location_code = $request->project_location_code[$i];
            $timesheet_action->processed_by = Auth::user()->name_employee;
            $timesheet_action->processed_datetime = $request->day[$i];
            $timesheet_action->save();
        };


            return redirect('/timesheet')->with('success','Saved!');
    }

    public function edit($location, $day)
    {
        $data = DB::table('timesheet')
                ->join('users','users.namecode','=','timesheet.namecode')
                ->select('timesheet.id','timesheet.namecode','name_employee','project_location_code','work','mandays','absent','processed_datetime')
                ->where('project_location_code', $location)
                ->where('processed_datetime', $day)
                ->get();

                
        return view('timesheet.edit',compact('data'));
    }

    public function update(Request $request)
    {
        for ($i=0; $i < count($request->id); $i++) {
            $id = (int) $request->id[$i];
            $timesheet = Timesheet::find($id);   
            $timesheet->work = isset($request->work[$id]) ? $request->work[$id] : null;
            $timesheet->mandays = isset($request->mandays[$id]) ? $request->mandays[$id] : null;
            $timesheet->absent = isset($request->absent[$id]) ? $request->absent[$id] : null;
            $timesheet->notes = $request->noteTimesheet[$i];
            $timesheet->update();            
        };



        // Timesheet::find($request->id)
        // ->update([
        //     ''
        // ]);
        

            return redirect('/timesheet')->with('success','Saved!');
    }
}
