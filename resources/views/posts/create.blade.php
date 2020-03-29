@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">Add Post</div>
  <div class="card-body">
    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="@error('title') is-invalid @enderror form-control">
        @error('title')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" name="description" id="description"
          class="@error('description') is-invalid @enderror form-control">
        @error('description')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" cols="5" rows="5"
          class="@error('content') is-invalid @enderror form-control"></textarea>
        @error('content')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="published_at">Published_At</label>
        <input type="text" name="published_at" id="published_at"
          class="@error('published_at') is-invalid @enderror form-control">
        @error('published_at')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="@error('image') is-invalid @enderror form-control"
          style="padding-top: 0.2rem !important;">
        @error('image')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-success">Create Post</button>
      </div>
    </form>
  </div>
</div>
@endsection