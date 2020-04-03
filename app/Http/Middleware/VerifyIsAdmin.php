<?php

namespace App\Http\Middleware;

use Closure;

class VerifyIsAdmin
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
    if (!auth()->user()->isAdmin()) {
      session()->flash('error', "You don't have the appropriate access rights to action this");
      return redirect(route('dashboard'));
    }

    return $next($request);
  }
}
