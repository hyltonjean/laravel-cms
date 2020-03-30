@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
  <a href="{{route('tags.create')}}" class="btn btn-success">Add Tag</a>
</div>

<div class="card">
  <div class="card-header">Tags</div>
  <div class="card-body">
    @if($tags->count() > 0)
    <table class="table">
      <thead>
        <th>Name</th>
        <th></th>
      </thead>
      <tbody>
        @foreach($tags as $tag)
        <tr>
          <td>
            {{$tag->name}}
          </td>
          <td>
            <div class="d-flex justify-content-end">
              <a href="{{route('tags.edit', $tag->id)}}" class="btn btn-info btn-sm mr-2 text-white">
                Edit
              </a>
              <button type="submit" class="btn btn-danger btn-sm text-right"
                onclick="handleDelete({{ $tag->id }})">Delete</button>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <h5 class="text-center">No Tags Yet</h5>
    @endif

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form action="" method="POST" id="deleteTagForm">
          @csrf
          @method("DELETE")
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">
                Delete Tag
              </h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                  aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p class="text-center text-bold">
                Are you sure you want to delete this tag?
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
    let form = document.getElementById('deleteTagForm');
    form.action = '/tags/' + id;
    $('#deleteModal').modal('show');
  };
</script>

@endsection