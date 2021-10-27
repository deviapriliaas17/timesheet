<?php

namespace App\Http\Controllers;

use App\Positions;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Positions::all();
        return view('position.index', compact('positions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'position_name' => 'required',
        ]);

        $positions = new Positions();

        $positions->position_code = str_random(3);
        $positions->name_position = $request->input('position_name');

        $positions->save();

        return redirect('/position')->with('success','Position data has been sucessfully added!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'position' => 'required',
        ]);
        
        $positions = Positions::findOrFail($request->position_id);
        $positions->name_position = $request->input('position');

        $positions->update();

        return redirect('/position')->with('success','Position data has been successfully updated!');
    }

    public function destroy($id)
    {
        Positions::destroy($id);
        return redirect('/position')->with('success','Position data has been deleted!');
    }
}
