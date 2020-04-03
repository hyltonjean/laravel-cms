@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">Profile</div>

  <div class="card-body">

    <form action="{{ route('users.profile.update') }}" method="POST" enctype="multipart/form-data">
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
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
          value="{{ $user->email }}">
        @error('email')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="password">New Password</label>
        <input type="password" name="password" id="password"
          class="form-control @error('password') is-invalid @enderror">
        @error('password')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="avatar">Upload new avatar</label>
        <input type="file" name="avatar" id="avatar" class="form-control @error('avatar') is-invalid @enderror"
          style="padding-top: 0.2rem !important;">
        @error('avatar')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="facebook">Facebook Url</label>
        <input type="text" name="facebook" id="facebook" class="form-control @error('facebook') is-invalid @enderror"
          value="{{ $user->profile->facebook }}">
        @error('facebook')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="twitter">Twitter Url</label>
        <input type="text" name="twitter" id="twitter" class="form-control @error('twitter') is-invalid @enderror"
          value="{{ $user->profile->twitter }}">
        @error('twitter')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="youtube">Youtube Url</label>
        <input type="text" name="youtube" id="youtube" class="form-control @error('youtube') is-invalid @enderror"
          value="{{ $user->profile->youtube }}">
        @error('youtube')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="about">About me</label>
        <textarea name="about" id="about" cols="6" rows="6"
          class="form-control @error('about') is-invalid @enderror">{{ $user->profile->about }}</textarea>
        @error('about')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>
      <button type="submit" class="btn btn-outline-success">Update Profile</button>
    </form>
  </div>
</div>
@endsection