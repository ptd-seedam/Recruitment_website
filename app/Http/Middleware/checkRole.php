<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = $request->session()->get('Role');
        $user = $request->user();
        // Kiểm tra nếu người dùng không đăng nhập hoặc không có vai trò là admin
        if ($user && $role !== '1') {

            abort(403, $role);
        }

        return $next($request);
    }
}
