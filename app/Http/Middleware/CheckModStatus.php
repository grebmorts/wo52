<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class CheckModStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

public $attributes;

    public function handle($request, Closure $next)
    {
      if (
        Auth::user()->roles->pluck('name')->contains('moderator')||
        Auth::user()->roles->pluck('name')->contains('admin')||
        Auth::user()->id == \App\Post::find($request->id)->user_id
        )
      {
        return $next($request);
      }
        session()->flash('error', 'Sinulla ei ole oikeutta tähän toimintoon.');
        return redirect('/');
    }
}
