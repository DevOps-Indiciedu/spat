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
                if(Auth::user()->system_admin == '1'):
                    return $next($request);
                else:
                    if(Auth::user()->usermanagement->two_factor_enabled == 1 && Auth::user()->usermanagement->two_factor_disabled_access == 0):
                        if(Auth::user()->two_factor_secret):
                            return $next($request);
                        else:
                            return redirect()->route('2fa');
                        endif;
                    else:
                        return $next($request);
                    endif;
                endif;
            else:
                return redirect()->route('permission-denied');
            endif;    
        else:
            // Session::flush(); 
            Auth::logout();
            return redirect('login')->with('error', 'Your Account Has Been Blocked Please Contact Administrator');
        endif;
    }
}
