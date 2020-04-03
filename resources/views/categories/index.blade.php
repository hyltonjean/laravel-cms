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
              <a href="{{route('categories.edit', $category->id)}}" class="btn btn-outline-info btn-sm mr-2">
                Edit
              </a>
              <button type="submit" class="btn btn-outline-danger btn-sm text-right"
                onclick="handleDelete({{ $category->id }})">Delete</button>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <h5 class="text-center">No Categories Yet</h5>
    @endif

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form action="" method="POST" id="deleteCategoryForm">
          @csrf
          @method("DELETE")
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">
                Delete Category
              </h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                  aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p class="text-center text-bold">
                Are you sure you want to delete this category?
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go back!</button>
              <button type="submit" class="btn btn-danger">Are you sure?</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  function handleDelete(id) {
    let form = document.getElementById('deleteCategoryForm');
    form.action = '/categories/' + id;
    $('#deleteModal').modal('show');
  };
</script>

@endsection