<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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

      if (Auth::check()) {

        $user = Auth::user();

        if ($user->is_admin()) {

          return $next($request);

        }

        return redirect('/');

      }

        return redirect('/');

    }
}
