<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminStatus
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
      if(!Auth::user()->roles->pluck('name')->contains('admin')) {
        session()->flash('error', 'Sinulla ei ole oikeutta tähän toimintoon.');
        return redirect('/');
        }

        return $next($request);
    }
}
