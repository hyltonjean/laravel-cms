@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row d-flex justify-content-between align-items-center">

    <div class="col-lg-3">
      <div class="card border-info">
        <div class="card-header bg-info text-light text-center" style="font-size:12px;">
          PUBLISHED POSTS
        </div>
        <div class="card-body">
          <h1 class="text-center">{{ $posts_count }}</h1>
        </div>
      </div>
    </div>

    <div class="col-lg-3">
      <div class="card border-danger">
        <div class="card-header bg-danger text-light text-center" style="font-size:12px;">
          TRASHED POSTS
        </div>
        <div class="card-body">
          <h1 class="text-center">{{ $trashed_count }}</h1>
        </div>
      </div>
    </div>

    <div class="col-lg-3">
      <div class="card border-dark">
        <div class="card-header bg-dark text-light text-center" style="font-size:12px;">
          USERS
        </div>
        <div class="card-body">
          <h1 class="text-center">{{ $users_count }}</h1>
        </div>
      </div>
    </div>

    <div class="col-lg-3">
      <div class="card border-success">
        <div class="card-header bg-success text-light text-center" style="font-size:12px;">
          CATEGORIES
        </div>
        <div class="card-body">
          <h1 class="text-center">{{ $categories_count }}</h1>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection