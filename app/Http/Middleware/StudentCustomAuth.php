<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StudentCustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('session_student_email'))
        {
            return redirect('/student_login');
        }
        
        return $next($request);
    }
}
