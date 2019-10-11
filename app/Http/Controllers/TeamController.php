<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamController extends Controller
{
    // View Team Member
    public function index()
    {
        $data = Team::all();
        return \View::make('team/team')->with(array('data'=>$data));
    }

    // Find Team Member
    public function teammember($id)
    {
        $data = \App\Team::where('teams.id', $id)->get();
        return view('team.teammember', compact('data'));
    }

    // Insert Team Member
    public function teaminsert(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'designation' => 'required|max:255',
            'description' => 'required|max:1000'
        ]);

        $team = new Team;
        $team->name = $request->name;

        $image = $request->file('image');
        $path = public_path(). '/images/team_image/';
        $extension = $image->getClientOriginalExtension();
        $imagename = time() . '_' . $team->name . '.' . $extension;
        $image->move($path, $imagename);

        $team->image = $imagename;
        $team->designation = $request->input('designation');
        $team->description = request('description');
        $team->save();
        return redirect('team');
    
    }
}
