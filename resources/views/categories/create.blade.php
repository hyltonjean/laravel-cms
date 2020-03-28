@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">Categories</div>
  <div class="card-body">
    <form action="{{route('categories.store')}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="@error('name') is-invalid @enderror form-control">
        @error('name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-success">Add Category</button>
      </div>
    </form>
  </div>
</div>
@endsection