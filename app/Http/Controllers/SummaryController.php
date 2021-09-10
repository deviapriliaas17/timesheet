<?php

namespace App\Http\Controllers;

use DB;
use App\ProjectLocation;
use App\Timesheet;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function index() 
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
                    ->select('users.name_employee')
                    ->groupBy('name_employee')
                    ->orderBy('name_employee','ASC')
                    ->get();

        $times = DB::table('timesheet')
                    // ->join('users','users.namecode','=','timesheet.namecode')
                    ->select(DB::raw('DATE(timesheet.created_at) as date'))
                    ->groupBy('date')
                    ->orderBy('date','ASC')
                    ->get();


        //looping
        foreach($times as $key => $t){
            foreach($employees as $e){
                $data = DB::table('timesheet')
                    ->join('users','users.namecode','=','timesheet.namecode')
                    ->select('users.name_employee', 'work', 'mandays', 'absent')
                    ->where('users.name_employee', $e->name_employee)
                    ->whereDate('timesheet.created_at', $t->date)
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
