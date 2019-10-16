<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blog = \App\blog::paginate(2);
        $project = \App\Models\Project::paginate(2);
        $team = \App\Team::latest()->paginate(3);
        return view('home.content', compact('project','blog','team'));      
    }

    public function blogcreate(){
        $Categorys = \App\Category::all();
 
        return view('blog.create',compact('Categorys'));
    }
   
}
