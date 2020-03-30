@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">{{isset($tag) ? 'Edit Tag' : 'Add Tag'}}</div>
  <div class="card-body">
    <form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" method="POST">
      @if(isset($tag))
      @method('PUT')
      @endif
      @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="@error('name') is-invalid @enderror form-control"
          value="{{ isset($tag) ? $tag->name : ""}}">
        @error('name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-success">{{ isset($tag) ? "Edit Tag" : "Add Tag" }}</button>
      </div>
    </form>
  </div>
</div>
@endsection