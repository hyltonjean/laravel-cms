@extends('layouts.app')

@section('content')

<div class="card">
  <div class="card-header bg-secondary text-white text-center ">
    <h4 class="text-bold mb-0">Categories</h4>
  </div>
  <div class="card-body">
    @if($categories->count() > 0)
    <table class="table">
      <thead>
        <th>Name</th>
        <th>Posts Count</th>
        <th></th>
      </thead>
      <tbody>
        @foreach($categories as $category)
        <tr>
          <td>
            {{$category->name}}
          </td>
          <td>
            {{ $category->posts->count() }}
          </td>
          <td>
            <div class="d-flex justify-content-end">
              <a href="{{route('categories.edit', $category->slug)}}" class="btn btn-info text-white btn-sm mr-2">
                Edit
              </a>
              <form action="{{route('categories.destroy', $category->slug)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <h5 class="text-center">No Categories Yet</h5>
    @endif
  </div>
</div>
@endsection

@section('scripts')

@endsection