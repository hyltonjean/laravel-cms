@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">Users</div>
  <div class="card-body">
    @if($users->count() > 0)
    <table class="table">
      <thead>
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Email</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td></td>
          <td>{{ $user->name }}</td>
          <td>
            {{ $user->email }}
          </td>
          <td>
            @if(!$user->isAdmin())
            <button type="button" class="btn btn-success btn-sm">Make Admin</button>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <h5 class="text-center">No Posts Yet.</h5>
    @endif
  </div>
</div>
@endsection