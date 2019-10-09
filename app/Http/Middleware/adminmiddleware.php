<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

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
            return redirect('project_home')->with('alert', "Only admin allowed.....");
            //return redirect()->route('project_home')->with('alert', "Only admin allowed.....");
            //return redirect()->back()->with('alert', 'Only admin allowed to create projects.....');
        }

        return $next($request);
    }
}
