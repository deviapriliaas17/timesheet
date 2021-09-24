<?php

namespace App\Http\Controllers;

use DB;
use App\ProjectLocation;
use App\Projects;
use Illuminate\Http\Request;

class ProjectLocationController extends Controller
{
    public function index()
    {
        $project_locations = ProjectLocation::all();
        $data = DB::table('project_locations')
                ->join('projects','projects.project_code','=','project_locations.project_code')
                ->select('project_locations.project_code','location_name', 'project_location_code', 'projects.project_name','project_locations.id')
                ->get();

        $project = Projects::all();
        $project = Projects::pluck('project_name','project_code');
        $id_project = 2;
        
        return view('ProjectLocation.index', compact('project_locations','data','project','id_project'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'project_location_name' => 'required',
                'project_code' => 'required',
            ]);
            
            $project_location = new ProjectLocation();
    
            $project_location->location_name = $request->input('project_location_name');
            $project_location->project_location_code = str_random(5);
            $project_location->project_code =  $request->input('project_code');
            
            $project_location->save();

            return redirect('/project_location')->with('success', 'Successfully!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'project_location' => 'required',
            'project_code' => 'required',
        ]);
        
        $project_location = ProjectLocation::findOrFail($request->project_location_id);
        $project_location->location_name = $request->input('project_location');
        $project_location->project_code = $request->input('project_code');

        $project_location->update();

        return redirect('/project_location')->with('success','Successfully!');
    }

    public function destroy($id)
    {
        ProjectLocation::destroy($id);
        return redirect('/project_location')->with('success','Project data has been deleted!');
    }
}
