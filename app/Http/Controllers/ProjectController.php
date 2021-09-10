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
            'client' => 'required'
        ]);
        
        $projects = new Projects();

        $projects->project_code = str_random(3);
        $projects->name_project = $request->input('project');
        $projects->client = $request->input('client');
        $projects->status = '2';

        $projects->save();

        return redirect('/project')->with('success','Project data has been successfully added!');
    }
}
