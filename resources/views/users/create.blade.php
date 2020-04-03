@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">Create User</div>

  <div class="card-body">

    <form action="{{ route('users.store') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="@error('name') is-invalid @enderror form-control"
          value="{{ $user->name }}">
        @error('name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="@error('email') is-invalid @enderror form-control"
          value="{{ $user->email }}">
        @error('email')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-outline-success">Create User</button>
      </div>

    </form>
  </div>
</div>
@endsection