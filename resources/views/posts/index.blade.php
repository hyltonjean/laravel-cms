@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
  <a href="{{route('posts.create')}}" class="btn btn-success">Add Posts</a>
</div>

<div class="card">
  <div class="card-header">Posts</div>
  <div class="card-body">
    @if($posts->count() > 0)
    <table class="table">
      <thead>
        <tr>
          <th>Image</th>
          <th>Title</th>
          <th>Category</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $post)
        <tr>
          <td><img src="{{ asset("storage/$post->image") }}" alt="{{ $post->title }}" width="60px" height="60px"></td>
          <td>{{ $post->title }}</td>
          <td>
            {{ $post->category->name }}
          </td>
          <td>
            <div class="d-flex justify-content-end">
              @if($post->trashed())
              <form action="{{ route('restore-posts', $post->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-info btn-sm mr-2 text-white">Restore</button>
              </form>
              @else
              <a href="{{ route('posts.edit', $post->id) }}" type="button"
                class="btn btn-info btn-sm mr-2 text-white">Edit</a>
              @endif
              <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm text-right">
                  {{ $post->trashed() ? 'Delete' : 'Trash' }}
                </button>
              </form>
            </div>
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