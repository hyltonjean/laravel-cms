<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Support\Str;
use App\Http\Requests\tags\CreateTagRequest;
use App\Http\Requests\tags\UpdateTagRequest;

class TagsController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin')->except('index');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('tags.index')->withTags(Tag::all());
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('tags.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CreateTagRequest $request)
  {

    // $tag = new tag();

    // $tag->name = $request['name'];

    // $tag->save();

    Tag::create([
      'name' => $request->name,
      'slug' => Str::slug($request->name, '-'),
    ]);

    session()->flash('success', 'Tag created successfully');

    return redirect(route('tags.index'));
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
  public function edit(Tag $tag)
  {
    return view('tags.create')->withTag($tag);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateTagRequest $request, Tag $tag)
  {
    $tag->update([
      'name' => $request->name,
      'slug' => Str::slug($request->name, '-'),
    ]);

    session()->flash('success', 'Updated tag successfully.');

    return redirect(route('tags.index'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Tag $tag)
  {
    if ($tag->posts->count() > 0) {

      session()->flash('error', 'Tag cannot be deleted, because it is associated with some posts.');

      return redirect()->back();
    }

    $tag->delete();

    session()->flash('success', 'Tag deleted successfully.');

    return redirect(route('tags.index'));
  }
}
