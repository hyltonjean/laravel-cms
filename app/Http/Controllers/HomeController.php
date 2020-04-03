<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Category;
use App\Post;
use App\User;

// use Illuminate\Http\Request;
=======
use Illuminate\Http\Request;
>>>>>>> dd48afd87a284789a22ab3f77c35d800b0f91e7a

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    return view('dashboard')->with('posts_count', Post::all()->count())
      ->with('trashed_count', Post::onlyTrashed()->count())
      ->with('users_count', User::all()->count())
      ->with('categories_count', Category::all()->count());
  }
}
