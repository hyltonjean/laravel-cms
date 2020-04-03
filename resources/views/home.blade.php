@extends('layouts.app')

@section('content')
<div class="container">
<<<<<<< HEAD
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header bg-secondary text-white text-center ">
          <h4 class="text-bold mb-0">Dashboard</h4>
        </div>
=======
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
>>>>>>> parent of e438b22... Completed with TheCmS app...

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection