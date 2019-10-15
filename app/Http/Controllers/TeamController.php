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
    public function teammember(Request $request)
    {
        $data = \App\Team::where('teams.id', $request->team_id)->get();

        if ($request->path() === "team/teammember/$request->team_id"){
            return view('team.teammember', compact('data'));
        }
        elseif ($request->path() === "team/teamedit/$request->team_id") {
            return view('team.teamedit', compact('data'));
        }
    }

    // Insert/Edit Team Member
    public function teaminsert(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'designation' => 'required|max:255',
            'descriptions' => 'required',
        ]);
        $team = new Team;

        if($request->path() === "team/teamedit"){
            $team = \App\Team::find($request->team_id);
        }

        $team->name = $request->name;
        $team->designation = $request->input('designation');
        $team->description = request('descriptions');

        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = public_path(). '/images/team_image/';
            $extension = $image->getClientOriginalExtension();
            $imagename = time() . '_' . $team->name . '.' . $extension;
            $image->move($path, $imagename);
            $team->image = $imagename;
        }
        
        $team->save();
        return redirect('team');
    }

    // Remove Team Member
    public function teamremove(Request $request)
    {   
        echo $team = \App\Team::find($request->team_id);
        $team->delete();
        // \App\Team::destroy($request->team_id);
        return redirect('team');
    }

    // Edit Team Member
    // public function teamedit($id)
    // {
    //     $team = \App\Team::where('teams.id', $id)->get();
    //     return view('team.teamedit', compact('team'));
    // }

    // public function teamedit(Request $request)
    // {   
    //     $team = \App\Team::where('teams.id', $request->id)->update(['name'=>$request->name]);
    //     return redirect('team');
    // }

}
