<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class hakAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,)
    {
        // if(in_array($request->user()->role,$roles)){
        //     return $next($request);
        // }
        // return redirect('/karyawan');
        if(auth()->user()->role == 'admin'){
           return $next($request);
       }
        return redirect('/login');
    //     if(auth()->user()->role == 'admin'){
    //        return $next($request);
    //    }else{
    //     return redirect('/tambahData');
    //    }
    //    return redirect('/dashbord');
    }
}
