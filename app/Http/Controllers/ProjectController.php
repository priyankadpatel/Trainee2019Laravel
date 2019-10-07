<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Project;
use App\Models\Projectimage;

class ProjectController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $projectimage = DB::select('select * from projectimage');

        // $projectimage = DB::table('projectimage')
        // ->join('project', 'project.id', '=', 'projectimage.project_id')
        // ->select('project.project_name', 'projectimage.image', 'projectimage.project_id')
        // ->get();

        $projectimage = \App\Models\Project::all();
        
        return view('project/project_home', compact('projectimage'));
    }

    public function display()
    {
        //  $projectimage = DB::select('select * from projectimage where id = ?',[$id]);

        // $project = DB::table('project')
        // ->join('projectimage', 'projectimage.project_id', '=', 'project.id')
        // ->select('projectimage.image', 'project.project_name', 'project.description', 'project.owner', 'project.budget')
        // ->where('projectimage.id')->get();        

        $projectimage = \App\Models\Projectimage::all();
        
        return view('project/project_description', compact('projectimage'));
        // return view('project/project_description', ['project'=>$project]);
    }

    public function create(Request $request)
    {
        
        $request->validate([
            'project_name' => 'required|min:3',
            'description' => 'required',
            'user_id' => 'required',
            'owner' => 'required',
            'budget' => 'required',
            // 'image' => 'required',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $project_name = $request->input('project_name');
        $description = $request->input('description');
        $user_id = $request->input('user_id');
        $owner = $request->input('owner');
        $budget = $request->input('budget');
        
       $form= new Project(); 
       
       $form->project_name=$project_name;
       $form->description=$description;
       $form->user_id=$user_id;
       $form->owner=$owner;
       $form->budget=$budget;
       
       $form->save();
       $project_id = $form->id;
        if($request->hasfile('image'))
        {
            
           foreach($request->file('image') as $image)
           {
           
               
               $name=$image->getClientOriginalName(); 
               $image->move(public_path().'/images/project/', $name);  
                 
               $form= new Projectimage(); 
               $form->project_id=$project_id;
               $form->image=$name;
               $form->save();
           
            }
        }
      
       return back()->with('success', 'Your images has been successfully');
       return redirect('/project/project_home');
        
        // $data=array('project_name'=>$project_name,"description"=>$description,"user_id"=>$user_id,"owner"=>$owner, "budget"=>$budget);
        // DB::table('project')->insert($data);

        // $data=array("project_id"=>1, "image"=>$image);
        // DB::table('projectimage')->insert($data);

        //return view('project/project_form');
    }
    
    
}
