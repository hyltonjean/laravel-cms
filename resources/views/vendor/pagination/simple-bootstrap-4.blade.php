{{-- Custom Pagination via vendor:publish --}}

@if ($paginator->hasPages())
<nav>
  <ul class="pagination flexbox mt-30">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <li class="page-item disabled" aria-disabled="true">
      <span class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Previous</span>
    </li>
    @else
    <li class="page-item">
      <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-white"><i class="ti-arrow-left fs-9 mr-4"></i>
        Previous</a>
    </li>
    @endif

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <li class="page-item">
      <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-white">Next <i class="ti-arrow-right fs-9 ml-4"></i></a>
    </li>
    @else
    <li class="page-item disabled" aria-disabled="true">
      <span class="btn btn-white disabled">Next <i class="ti-arrow-right fs-9 ml-4"></i></span>
    </li>
    @endif
  </ul>
</nav>
@endif