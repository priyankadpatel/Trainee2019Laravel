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

    public function display($id)
    {

        $project = \App\Models\Project::with('projectimage')->where('project.id',$id)->get();
        return view('project/project_description', compact('project'));
       
    }

    public function create(Request $request)
    {
        
        $request->validate([
            'project_name' => 'required|min:3',
            'description' => 'required',
            'user_id' => 'required',
            'owner' => 'required',
            'budget' => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $project_name = $request->input('project_name');
        $description = $request->input('description');
        $user_id = $request->input('user_id');
        $owner = $request->input('owner');
        $budget = $request->input('budget');
        $startdate = $request->input('startdate');
        $enddate = $request->input('enddate');
        
       $form= new Project(); 
       
       $form->project_name=$project_name;
       $form->description=$description;
       $form->user_id=$user_id;
       $form->owner=$owner;
       $form->budget=$budget;
       $form->startdate=$startdate;
       $form->enddate=$enddate;
       
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
        
     
       return redirect('project_home');
       
    }

        public function projectdelete($id){

            $project = \App\Models\Project::find($id);

            $project->delete();
            
            return redirect('project_home');

        }
    
        public function edit($id){
 
            $projectimage = \App\Models\Projectimage::all();
            $project = \App\Models\project::with('projectimage')->where('project.id',$id)->get();

             return view('project.edit',compact('project','projectimage'));
         }

        public function projectedit(Request $request, $id){

            $request->validate([
                'project_name' => 'required|min:3',
                'description' => 'required',
                'user_id' => 'required',
                'owner' => 'required',
                'budget' => 'required',
                'startdate' => 'required',
                'enddate' => 'required'
                
            ]);
    
            $project_name = $request->input('project_name');
            $description = $request->input('description');
            $user_id = $request->input('user_id');
            $owner = $request->input('owner');
            $budget = $request->input('budget');
            $startdate = $request->input('startdate');
            $enddate = $request->input('enddate');
            
           $form= new Project(); 
           
           $form->exists = true;
           $form->id=$id;
           $form->project_name=$project_name;
           $form->description=$description;
           $form->user_id=$user_id;
           $form->owner=$owner;
           $form->budget=$budget;
           $form->startdate=$startdate;
           $form->enddate=$enddate;
           
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
            
            $project = \App\Models\Project::with('projectimage')->where('project.id',$id)->get();
            return view('project/project_description', compact('project'));
         

        }
    
}
