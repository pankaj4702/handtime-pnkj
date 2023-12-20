<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Session;
use App\Models\RegUser;

class CheckSessionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Session::get('username')){
            $user = Session::get('email');
            $de_user = RegUser::where('email',$user)->first();
            if($de_user->status == 0){
              session()->forget('username');
              return redirect('/login');
            }
          }
        
        return $next($request);
        
        
    }
}
