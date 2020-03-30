@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">{{isset($category) ? 'Edit Category' : 'Add Category'}}</div>
  <div class="card-body">
    <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}"
      method="POST">
      @if(isset($category))
      @method('PUT')
      @endif
      @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="@error('name') is-invalid @enderror form-control"
          value="{{ isset($category) ? $category->name : ""}}">
        @error('name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>
      <div class="form-group">
        <button type="submit"
          class="btn btn-success">{{ isset($category) ? "Update Category" : "Add Category" }}</button>
      </div>
    </form>
  </div>
</div>
@endsection