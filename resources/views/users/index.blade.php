@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header bg-secondary text-white text-center ">
    <h4 class="text-bold mb-0">Users</h4>
  </div>
  <div class="card-body">

    @if($users->count() > 0)

    <table class="table">
      <thead>
        <tr>
          <th>Avatar</th>
          <th>Name</th>
          <th>Email</th>
          <th>Permissions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td>
            <img src="{{ $user->profile->avatar }}" width="45px" height="45px">
          </td>
          <td>
            {{ $user->name }}
          </td>
          <td>
            {{ $user->email }}
          </td>
          <td>
            @if(!$user->isAdmin())
            <form action=" {{ route('users.make-admin', $user->id) }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-outline-primary btn-sm">Make admin</button>
            </form>
            @else
            <form action="{{ route('users.remove-admin', $user->id) }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-outline-danger btn-sm">Remove permissions</button>
            </form>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <h5 class="text-center">No Users</h5>
    @endif
  </div>
</div>
@endsection