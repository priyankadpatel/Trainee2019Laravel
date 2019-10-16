<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:team-create', ['only' => ['create','teaminsert']]);
        $this->middleware('permission:team-edit', ['only' => ['edit','teamedit']]);
        $this->middleware('permission:team-delete', ['only' => ['teamremove']]);
    }

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
            'description' => 'required',
        ]);
        $team = new Team;
        $team->name = $request->name;
        $team->designation = $request->input('designation');
        $team->description = request('description');

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
    public function teamedit(Request $request)
    {   
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'mimes:jpeg,png,jpg,gif,svg',
            'designation' => 'required|max:255',
            'description' => 'required',
        ]);

        $team = \App\Team::find($request->team_id);
        $team->name = $request->name;
        $team->designation = $request->input('designation');
        $team->description = request('description');

        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = public_path(). '/images/team_image/';
            $extension = $image->getClientOriginalExtension();
            $imagename = time() . '_' . $team->name . '_' .'updated' . '.' . $extension;
            $image->move($path, $imagename);
            $team->image = $imagename;
        }
        
        $team->save();
        return redirect('team');
    }

}
