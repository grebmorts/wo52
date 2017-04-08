<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckEdit
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

      $user = Auth::user();
        if ($user->id == \App\Post::find($request->id)->user_id) {
          return $next($request);
        }
        return redirect('/')
            ->with('error', 'Sinulla ei ole oikeutta tähän toimintoon.');
    }
}
