<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

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
        if (Auth::guard('web')->check()) {
            return $next($request);
        } elseif (Auth::guard('merchant')->check()) {
            return back()->with('loginfail', 'ท่านไม่สามารถไปยังหน้าที่ต้องการได้กรุณาเข้าสู่ระบบด้วยรหัสลูกค้า');
        } else {
            return redirect(url('/'));
        }
    }
}
