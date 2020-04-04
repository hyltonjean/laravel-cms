<?php

namespace App\Http\Controllers\Blog;

use App\Tag;
use App\Post;
use App\Setting;
use App\Category;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
  public function show(Post $post)
  {
    return view('blog.show')->with('post', $post)
      ->with('settings', Setting::first());
  }

  public function category(Category $category)
  {
    return view('blog.category')->with('category', $category)
      ->with('posts', $category->posts()->published()->searched()->simplePaginate(2))
      ->with('categories', Category::all())
      ->with('tags', Tag::all())
      ->with('settings', Setting::first());
  }

  public function tag(Tag $tag)
  {
    return view('blog.tag')->with('tag', $tag)
      ->with('posts', $tag->posts()->published()->searched()->simplePaginate(2))
      ->with('categories', Category::all())
      ->with('tags', Tag::all())
      ->with('settings', Setting::first());
  }
}
