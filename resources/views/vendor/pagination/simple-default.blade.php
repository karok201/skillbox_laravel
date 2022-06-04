@if ($paginator->hasPages())
    <nav>
        <nav class="blog-pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="disabled btn btn-outline-primary" aria-disabled="true"><span>@lang('pagination.previous')</span></a>
            @else
                <a class="btn btn-outline-primary" href="{{ $paginator->previousPageUrl() }}"><span>@lang('pagination.previous')</span></a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="btn btn-outline-primary" href="{{ $paginator->nextPageUrl() }}" rel="next"><span>@lang('pagination.next')</span></a>
            @else
                <a class="disabled btn btn-outline-primary" aria-disabled="true"><span>@lang('pagination.next')</span></a>
            @endif
        </nav>
    </nav>
@endif
