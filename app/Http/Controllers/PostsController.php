<?php

namespace App\Http\Controllers;

use App\Post;
// use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostsRequest;

class PostsController extends Controller
{
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
    return view('posts.create');
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

    Post::create([
      'title' => $request->title,
      'description' => $request->description,
      'content' => $request->content,
      'image' => $image,
      'published_at' => $request->published_at
    ]);

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
    return view('posts.create')->withPost($post);
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
    // Updating Posts with new image

    // Updating only these values from the request object
    $data = $request->only(['title', 'description', 'content', 'published_at']);

    // check if new image
    if ($request->hasFile('image')) {
      // upload it
      $image = $request->image->store('posts');
      // delete old one
      $post->deleteImage();
      // set image to $data variable to be updated below
      $data['image'] = $image;
    }

    // update attributes
    $post->update($data);

    // flash message
    session()->flash('success', 'Post updated successfully.');
    //redirect user
    return redirect(route('posts.index'));

    // Updating Posts normally

    // $image = $request->image->store('posts');

    // $post->update([
    //   'title' => $request->title,
    //   'description' => $request->description,
    //   'content' => $request->content,
    //   'image' => $image
    // ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $post = Post::withTrashed()->where('id', $id)->firstOrFail();

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
  public function restore($id)
  {
    $post = Post::withTrashed()->where('id', $id)->firstOrFail();

    $post->restore();

    session()->flash('success', 'Post restored successfully.');

    return redirect(route('posts.index'));
  }
}
