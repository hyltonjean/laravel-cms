@if ($paginator->hasPages())
<nav>
  <ul class="pagination">
    <div class="container d-flex justify-content-between">
      {{-- Previous Page Link --}}
      @if ($paginator->onFirstPage())
      <li class="page-item disabled" aria-disabled="true">
        <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 ml-4"></i> Previous</a>
      </li>
      @else
      <li class="page-item">
        <a class="btn btn-white" href="{{ $paginator->previousPageUrl() }}"><i class="ti-arrow-left fs-9 ml-4"></i>
          Previous</a>
      </li>
      @endif

      {{-- Next Page Link --}}
      @if ($paginator->hasMorePages())
      <li class="page-item">
        <a class="btn btn-white" href="{{ $paginator->nextPageUrl() }}">
          Next <i class="ti-arrow-right fs-9 mr-4"></i></a>
      </li>
      @else
      <li class="page-item disabled" aria-disabled="true">
        <a class="btn btn-white disabled">Next <i class="ti-arrow-right fs-9 mr-4"></i></a>
      </li>
      @endif
    </div>
  </ul>
</nav>
@endif