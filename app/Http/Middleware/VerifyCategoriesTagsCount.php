<?php

namespace App\Http\Middleware;

use App\Tag;
use Closure;
use App\Category;

class VerifyCategoriesTagsCount
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
    if (Category::all()->count() == 0 || Tag::all()->count() == 0) {
      session()->flash('error', 'You need to add categories/tags to be able to create a post.');
      return redirect(route('posts.index'));
    }

    return $next($request);
  }
}
