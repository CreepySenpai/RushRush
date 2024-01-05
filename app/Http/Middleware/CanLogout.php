<?php

namespace App\Http\Middleware;

use App\Enums\UserType;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CanLogout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->role_type == UserType::CUSTOMER){
                return redirect('/')->with(['already_loggin' => "Bạn đã đăng nhập rồi!!!"]);
            }
            else{
                return redirect('/admin/home')->with(['already_loggin' => "Bạn đã đăng nhập rồi!!!"]);
            }
        }
        return $next($request);
    }
}
