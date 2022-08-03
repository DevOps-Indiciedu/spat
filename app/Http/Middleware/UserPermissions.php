<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Http\Middleware\Session;
class UserPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next , $code)
    {
        // dd(userStatus(Auth::user()->id));
        if(userStatus(Auth::user()->id) == '1' || Auth::user()->system_admin == '1'):
            if(userRightGranted($code)):
                // dd("Permission grant");
                // redirect(route('user_role'));
                return $next($request);
            else:
                return redirect()->route('permission-denied');
            endif;    
        else:
            // Session::flush(); 
            Auth::logout();
            return redirect('login')->with('error', 'Your Account Is Blocked');
        endif;
    }
}