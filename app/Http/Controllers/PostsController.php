<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
// use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostsRequest;

class PostsController extends Controller
{

  public function __construct()
  {
    $this->middleware('VerifyCategoriesCount')->only(['create', 'store']);
    $this->middleware('admin')->only(['edit', 'update', 'destroy']);
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('posts.index')->with('posts', Post::all());
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('posts.create')->with('categories', Category::all())->with('tags', Tag::all());
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CreatePostsRequest $request)
  {
    $image = $request->image->store('posts');

    $user = auth()->user();

    $post = Post::create([
      'user_id' => $user->id,
      'title' => $request->title,
      'slug' => Str::slug($request->title, '-'),
      'description' => $request->description,
      'content' => $request->content,
      'image' => $image,
      'published_at' => $request->published_at,
      'category_id' => $request->category
    ]);

    if ($request->tags) {
      $post->tags()->attach($request->tags);
    }

    session()->flash('success', 'Post created successfully.');

    return redirect(route('posts.index'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Post $post)
  {
    return view('posts.create')->with('post', $post)->with('categories', Category::all())->with('tags', Tag::all());
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpdatePostsRequest $request, Post $post)
  {
    // check if new image
    if ($request->hasFile('image')) {
      // upload it
      $image = $request->image->store('posts');
      // delete old one
      $post->deleteImage();
      // update attributes
      $post->update([
        'title' => $request->title,
        'slug' => Str::slug($request->title, '-'),
        'description' => $request->description,
        'content' => $request->content,
        'image' => $image,
        'published_at' => $request->published_at,
        'category_id' => $request->category
      ]);
    }

    // else update attributes without image
    $post->update([
      'title' => $request->title,
      'slug' => Str::slug($request->title, '-'),
      'description' => $request->description,
      'content' => $request->content,
      'published_at' => $request->published_at,
      'category_id' => $request->category
    ]);

    if ($request->tags) {
      $post->tags()->sync($request->tags);
    }

    // flash message
    session()->flash('success', 'Post updated successfully.');
    //redirect user
    return redirect(route('posts.index'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($slug)
  {
    $post = Post::withTrashed()->where('slug', $slug)->firstOrFail();

    if ($post->trashed()) {
      $post->deleteImage();
      $post->forceDelete();
    } else {
      $post->delete();
    }

    session()->flash('success', 'Post deleted successfully.');

    return redirect(route('posts.index'));
  }

  /**
   * Remove trashed posts from storage
   *
   * @return \Illuminate\Http\Response
   */
  public function trashed()
  {
    $trashed = Post::onlyTrashed()->get();

    return view('posts.index')->withPosts($trashed);
  }

  /**
   * Restore trashed posts from storage
   *
   * @return \Illuminate\Http\Response
   */
  public function restore($slug)
  {
    $post = Post::withTrashed()->where('slug', $slug)->firstOrFail();

    $post->restore();

    session()->flash('success', 'Post restored successfully.');

    return redirect(route('posts.index'));
  }
}
