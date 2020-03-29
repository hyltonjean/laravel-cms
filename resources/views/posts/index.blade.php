@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
  <a href="{{route('posts.create')}}" class="btn btn-success">Add Posts</a>
</div>

<div class="card">
  <div class="card-header">Posts</div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th>Image</th>
          <th>Title</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $post)
        <tr>
          <td><img src="storage/{{ $post->image }}" alt="{{ $post->title }}" width="60px" height="60px"></td>
          <td>{{ $post->title }}</td>
          <td>
            <div class="d-flex justify-content-end">
              <button type="button" class="btn btn-info btn-sm mr-2 text-white">Edit</button>
              <button type="button" class="btn btn-danger btn-sm text-right">Trash</button>
            </div>
        </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection