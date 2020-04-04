<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Setting;
use App\Category;

class WelcomeController extends Controller
{
  public function index()
  {
    return view('welcome')->with('categories', Category::all())
      ->with('tags', Tag::all())
      ->with('posts', Post::published()->searched()->simplePaginate(2))
      ->with('settings', Setting::first());
  }
}
