<?php

namespace App\Http\Middleware;

use Closure;

class Role
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
        return $next($request);
    }
}
class Role {

    public function handle($request, Closure $next, String $role) {
      if (!Auth::check()) // This isnt necessary, it should be part of your 'auth' middleware
        return redirect('/home');

      $user = Auth::user();
      if($user->role == $role)
        return $next($request);

      return redirect('/home');
    }
  }
