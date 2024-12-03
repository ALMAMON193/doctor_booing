<style>
    .pagination .page-item a {
        border-color: #ced3d4;
        color:#0f5b5b;
    }

    .pagination .page-item.active .page-link {
        background-color: #0f5b5b;
        border-color: #0f5b5b;
        color: white;
    }

    .pagination .page-item.disabled .page-link {
        background-color: #d1d1d1;
        border-color: #d1d1d1;
        color: #999;
    }
</style>

@if ($paginator->hasPages())
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center gap-2"> <!-- Added gap-2 -->
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link rounded"> &laquo; Previous</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link rounded" href="{{ $paginator->previousPageUrl() }}"> &laquo; Previous</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link rounded">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <span class="page-link rounded">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link rounded" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link rounded" href="{{ $paginator->nextPageUrl() }}">Next &raquo;</a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link rounded">Next &raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif


