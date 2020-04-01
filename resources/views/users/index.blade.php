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
          <td>
            <img src="{{ Gravatar::src($user->email, 40) }}" style="border-radius:50%;">
          </td>
          <td>
            {{ $user->name }}
          </td>
          <td>
            {{ $user->email }}
          </td>
          <td>
            @if(!$user->isAdmin())
            <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-outline-primary btn-sm">Make Admin</button>
            </form>
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