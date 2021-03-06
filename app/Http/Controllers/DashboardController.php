<?php

namespace App\Http\Controllers;

use DB;
use App\ProjectLocation;
use App\Timesheet;
use Illuminate\Http\Request;
use Auth;


class DashboardController extends Controller
{
   public function index(Request $request)
    {
       
        $employees = DB::table('timesheet')
                    ->join('users','users.namecode','=','timesheet.namecode')
                    ->join('project_locations','project_locations.project_location_code','=','timesheet.project_location_code')
                    ->select('users.name_employee','project_locations.location_name')
                    ->groupBy('name_employee','location_name')
                    ->orderBy('name_employee','location_name','ASC')
                    ->get();
       
       $employees = $employees->where('name_employee', Auth::user()['name_employee']);
        
       // timesheet for date
        $times = DB::table('timesheet')
                    ->select(DB::raw('(timesheet.processed_datetime) as date'))
                    ->groupBy('date')
                    ->orderBy('date','ASC')
                    ->get();

        // times for filter
        if($request->input('fromDate') && $request->input('toDate')){
        $times = DB::table('timesheet')
                ->select('timesheet.processed_datetime as date')
                ->whereDate('processed_datetime','>=', $request->input('fromDate'))
                ->whereDate('processed_datetime','<=', $request->input('toDate'))
                ->groupBy('date')
                ->orderBy('date','ASC')
                ->get();
            }
            
        // for filter
        if($request->input('fromDate') && $request->input('toDate')){
            foreach($employees as $key => $e){
                $data = DB::table('timesheet')
                    ->join('users','users.namecode','=','timesheet.namecode')
                    ->join('project_locations','project_locations.project_location_code','=','timesheet.project_location_code')
                    ->select(DB::raw('count(mandays) as mandays, count(work) as work, count(absent) as absent'))
                    ->where('users.name_employee', $e->name_employee)
                    ->whereDate('processed_datetime','>=', $request->input('fromDate'))
                    ->whereDate('processed_datetime','<=', $request->input('toDate'))
                    ->first();
            $employees[$key]->mandaysCount = $data->mandays;
            $employees[$key]->workCount = $data->work;
            $employees[$key]->absentCount = $data->absent;
            }
        } else { // menampilkan semua
            foreach($employees as $key => $e){
                $data = DB::table('timesheet')
                    ->join('users','users.namecode','=','timesheet.namecode')
                    ->join('project_locations','project_locations.project_location_code','=','timesheet.project_location_code')
                    ->select(DB::raw('count(mandays) as mandays, count(work) as work, count(absent) as absent'))
                    ->where('users.name_employee', $e->name_employee)
                    ->first();
            $employees[$key]->mandaysCount = $data->mandays;
            $employees[$key]->workCount = $data->work;
            $employees[$key]->absentCount = $data->absent;
            }   
        }


        //looping
        foreach($times as $key => $t){
            if(!empty($employees)){
                foreach($employees as $e){
                    $data = DB::table('timesheet')
                        ->join('users','users.namecode','=','timesheet.namecode')
                        ->join('project_locations','project_locations.project_location_code','=','timesheet.project_location_code')
                        ->select('users.name_employee', 'work', 'mandays', 'absent','timesheet.processed_datetime','project_locations.location_name')
                        ->where('users.name_employee', $e->name_employee)
                        ->where('timesheet.processed_datetime', $t->date)
                        ->first();
                        $times[$key]->data[] = isset($data) ? $data : [] ;
                    }
                }else{
                    $times[$key]->data[] = [] ;
            }   
        }

        return view('dashboard', compact('employees','times'));
    }

    // public function search(Request $request)
    // {
        
    //     $firstDate   = $request->input('fromDate');      
    //     $lastDate    = $request->input('toDate');

    //     return view('dashboard', compact('employees','times','location_project','id'));
    // }
}
