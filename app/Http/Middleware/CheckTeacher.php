<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckTeacher
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
        if (Auth::user() == null) {
            return redirect()->route('login')->with('error', 'Bạn phải đăng nhập vào hệ thống.');
        }
        if (Auth::user()->role == LOGIN_TEACHER) {
            return $next($request);
        } else {
            return redirect()->route('login')->with('error', 'Bạn vui lòng đăng nhập bằng tài khoản của Giáo viên để thực hiện chức năng này.');
        }
    }
}
