<?php

namespace App\Http\Controllers;

use DB;
use App\ProjectLocation;
use App\Timesheet;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function index(Request $request) 
    {
        // $data = DB::table('timesheet')
        //             ->join('users','users.namecode','=','timesheet.namecode')
        //             ->select('timesheet.id','users.namecode','users.name_employee', 'work', 'mandays', 'absent','timesheet.created_at')
        //             ->get();
        $location_project = ProjectLocation::all();
        $location_project = ProjectLocation::pluck('location_name','id');
        $id = 2; 

        $employees = DB::table('timesheet')
                    ->join('users','users.namecode','=','timesheet.namecode')
                    ->join('project_locations','project_locations.project_location_code','=','timesheet.project_location_code')
                    ->select('users.name_employee','project_locations.location_name')
                    ->groupBy('name_employee','location_name')
                    ->orderBy('name_employee','location_name','ASC')
                    ->get();

        $times = DB::table('timesheet')
                    // ->join('users','users.namecode','=','timesheet.namecode')
                    // ->select(DB::raw('DATE(timesheet.created_at) as date'))
                    ->select(DB::raw('(timesheet.processed_datetime) as date'))
                    ->groupBy('date')
                    ->orderBy('date','ASC')
                    ->get();
        //looping
        foreach($times as $key => $t){
            foreach($employees as $e){
                $data = DB::table('timesheet')
                    ->join('users','users.namecode','=','timesheet.namecode')
                    ->join('project_locations','project_locations.project_location_code','=','timesheet.project_location_code')
                    ->select('users.name_employee', 'work', 'mandays', 'absent','timesheet.processed_datetime','project_locations.location_name')
                    ->where('users.name_employee', $e->name_employee)
                    ->where('timesheet.processed_datetime', $t->date)
                    ->first();
                    $times[$key]->data[] = $data;
                }
        }

        // foreach($employees as $key => $e){
        //     $data = DB::table('timesheet')
        //             ->select('id','work', 'mandays', 'absent','timesheet.created_at')
        //             ->where('namecode', $e->namecode)
        //             ->get();
        //     $employees[$key]->data = $data;
        // }

        // dd($employees);
        // return view('summary.index', compact('data', 'location_project', 'id'));
        // dd($times);
        return view('summary.index', compact('employees','times','location_project','id'));
    }

}
