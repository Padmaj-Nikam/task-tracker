<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teams;

class TeamBuilderController extends Controller
{
    public function index() {
        $teams = Teams::all();
        return view('MyTeam', compact('teams'));
    }

    public function create() {
        return view('TeamBuilderForm');
    }

    public function store(Request $request) {

        $request->validate([
            'team_name'=>'required|string|max:50',
            'team_strength'=>'required|integer',

        ]);

        Teams::create([
            'team_name'=>$request->input('team_name'),
            'team_strength'=> $request->input('team_strength'),
        ]);

        return redirect()->route('team.index')->with('success', 'Team created successfully');

    }

    public function show() {

    }

    public function edit($id) {

    }

    public function update(Request $request) {

    }

    public function destroy($id) {

    }

}
