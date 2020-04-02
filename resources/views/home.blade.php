@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header bg-secondary text-white text-center ">
          <h4 class="text-bold mb-0">Dashboard</h4>
        </div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          <h5 class="text-center text-bold">You are currently logged in!</h5>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection