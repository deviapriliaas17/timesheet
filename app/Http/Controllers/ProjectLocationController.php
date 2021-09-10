<?php

namespace App\Http\Controllers;

use DB;
use App\ProjectLocation;
use Illuminate\Http\Request;

class ProjectLocationController extends Controller
{
    public function index()
    {
        $project_locations = ProjectLocation::all();
        $data = DB::table('project_locations')
                ->join('projects','projects.project_code','=','project_locations.project_code')
                ->select('project_locations.project_code','location_name', 'project_location_code', 'projects.project_name')
                ->get();
        return view('ProjectLocation.index', compact('project_locations','data'));
    }
}
