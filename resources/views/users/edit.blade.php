@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">Profile</div>

  <div class="card-body">
    @include('partials.errors')
    <form action="{{ route('users.update-profile') }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
          value="{{ $user->name }}">
        @error('name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="about">About me</label>
        <textarea name="about" id="about" cols="5" rows="5"
          class="form-control @error('about') is-invalid @enderror">{{ $user->about }}</textarea>
        @error('about')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>
      <button type="submit" class="btn btn-outline-success">Update Profile</button>
    </form>
  </div>
</div>
@endsection