<?php

namespace App\Http\Middleware;

use App\Models\Apartment;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserApartment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        if($request->route()->uri != 'dashboard/apartment' and $request->route()->uri != 'dashboard/apartment/create'){

            
            
            if ($request->user()->id != $request->route('apartment')->user_id) {
                return redirect()->route('dashboard.index')->with('message', "You cannot access this area")->with('alert-type', 'warning');
            }
            
            
        }
        
        return $next($request); 
        


    }
}
