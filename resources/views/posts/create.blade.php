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
        <textarea id="content" name="content" cols="5" rows="5"
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

      <div class="form-group mt-4">
        <label for="image">Image</label>
        @if(isset($post))
        <div class="container text-center">
          <img src="{{ asset("storage/$post->image") }}" alt="{{ $post->title }}" class="" width="100%">
        </div>
        @endif
        <input type="file" name="image" id="image" class="@error('image') is-invalid @enderror form-control mt-4"
          style="padding-top: 0.2rem !important;">
        @error('image')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group mt-4">
        <label for="category">Category</label>
        <select class="form-control tags-selector" name="category" id="category">
          @foreach($categories as $category)
          <option value="{{ $category->id }}" @if(isset($post)) @if($category->id === $post->category_id)
            selected
            @endif
            @endif
            >{{ $category->name }}</option>
          @endforeach
        </select>
      </div>

      @if($tags->count() > 0)
      <div class="form-group">
        <label for="tags">Tags</label>
        <select type="text" name="tags[]" id="tags" class="tags-selector form-control" multiple>
          @foreach($tags as $tag)
          <option value="{{ $tag->id }}" @if(isset($post)) @if($post->hasTag($tag->id)))
            selected
            @endif
            @endif
            >
            {{ $tag->name }}
          </option>
          @endforeach
        </select>
      </div>
      @endif

      <div class="form-group">
        <button type="submit" class="btn btn-outline-success">{{ isset($post) ? 'Update Post' : 'Add Post' }}</button>
      </div>
    </form>
  </div>
</div>
@endsection

@section('scripts')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
<script>
  flatpickr('#published_at', {
    enableTime: true
  });

  $( "document" ).ready(function() {
    $(".tags-selector").select2();
  });

  $( "document" ).ready(function() {
    $("#content").summernote();
  });
</script>
@endsection

@section('css')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css"> --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@endsection