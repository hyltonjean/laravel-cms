@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">{{ isset($post) ? 'Edit Post' : 'Add Post' }}</div>
  <div class="card-body">
    <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST"
      enctype="multipart/form-data">
      @csrf
      @if(isset($post))
      @method('PUT')
      @endif
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="@error('title') is-invalid @enderror form-control"
          value="{{ isset($post) ? $post->title : "" }}">
        @error('title')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" name="description" id="description"
          class="@error('description') is-invalid @enderror form-control"
          value="{{ isset($post) ? $post->description : "" }}">
        @error('description')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" cols="5" rows="5"
          class="@error('content') is-invalid @enderror form-control">{{ isset($post) ? $post->content : "" }}</textarea>
        @error('content')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="published_at">Published_At</label>
        <input type="text" name="published_at" id="published_at"
          class="@error('published_at') is-invalid @enderror form-control"
          value="{{ isset($post) ? $post->published_at : "" }}">
        @error('published_at')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="image">Image</label>
        @if(isset($post))
        <div class="container text-center">
          <img src="{{ asset("storage/$post->image") }}" alt="{{ $post->title }}" class="" width="600px" height="400px">
        </div>
        <br>
        <input type="file" name="image" id="image" class="@error('image') is-invalid @enderror form-control"
          style="padding-top: 0.2rem !important;">
        @error('image')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
        @else
        <input type="file" name="image" id="image" class="@error('image') is-invalid @enderror form-control"
          style="padding-top: 0.2rem !important;">
        @error('image')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
        @endif
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-success">{{ isset($post) ? 'Update Post' : 'Add Post' }}</button>
      </div>
    </form>
  </div>
</div>
@endsection