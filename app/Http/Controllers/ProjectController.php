<?php

namespace App\Http\Controllers;

use App\Projects;
use App\Positions;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Projects::all();
        $positionEmployee = Positions::all();
        $positionEmployee = Positions::pluck('name_position', 'id');
        $id = 1;

        return view('Project.index', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project' => 'required',
        ]);
        
        $projects = new Projects();

        $projects->project_code = str_random(3);
        $projects->project_name = $request->input('project');

        $projects->save();

        return redirect('/project')->with('success','Project data has been successfully added!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'project' => 'required',
        ]);
        
        $projects = Projects::findOrFail($request->project_id);
        $projects->project_name = $request->input('project');

        $projects->update();

        return redirect('/project')->with('success','Project data has been successfully added!');
    }

    public function destroy($id)
    {
        Projects::destroy($id);
        return redirect('/project')->with('success','Project data has been deleted!');
    }
}
