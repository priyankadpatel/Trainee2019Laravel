<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Admin;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    { 
        $userRoles = Auth::user()->roles->pluck('name');

        if(!$userRoles->contains('Admin'))
        {
            if($request->path() === 'project/project_edit'){
            return redirect('project_home')->with('alert', "Only admin allowed.....");
            }
            elseif ($request->path() === 'team/teaminsert') {
            return redirect('team')->with('alert', "Only admin allowed.....");
            }
        }
        return $next($request);
    }
}

