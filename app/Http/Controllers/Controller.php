<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function index()
    {
        $blog = \App\blog::latest()->paginate(3);
        $project = \App\Models\Project::latest()->paginate(3);
        $team = \App\Team::latest()->paginate(3);
        return view('home.content', compact('project','blog','team'));      
    }
}
