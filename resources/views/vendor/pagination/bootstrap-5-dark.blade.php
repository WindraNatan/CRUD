@if ($paginator->hasPages())
    <nav class="d-flex justify-content-center mt-5">
        <ul class="pagination minimal-pagination mb-0">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link minimal-link text-muted">&larr; PREV</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link minimal-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&larr; PREV</a>
                </li>
            @endif
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link minimal-link">{{ $element }}</span>
                    </li>
                @endif
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span class="page-link minimal-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link minimal-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link minimal-link" href="{{ $paginator->nextPageUrl() }}" rel="next">NEXT &rarr;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link minimal-link text-muted">NEXT &rarr;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif

<style>
    /* --- Pagination --- */
    .minimal-pagination .page-item {
        margin: 0 2px; 
    }

    .minimal-pagination .minimal-link {
        background-color: transparent !important; 
        border: none !important; 
        color: #6c757d; 
        font-size: 0.85rem;
        font-weight: 500;
        padding: 8px 12px;
        transition: all 0.3s ease;
        border-radius: 4px; 
    }

    .minimal-pagination .minimal-link:hover {
        color: #fff; 
        background-color: rgba(255, 255, 255, 0.05) !important;
        text-decoration: none;
    }

    .minimal-pagination .page-item.active .minimal-link {
        color: #198754 !important; 
        background-color: transparent !important;
        font-weight: bold;
        border-bottom: 1px solid #198754 !important; 
        border-radius: 0; 
    }

    .minimal-pagination .minimal-link:focus {
        box-shadow: none !important;
    }

    .minimal-pagination .page-item:first-child .minimal-link,
    .minimal-pagination .page-item:last-child .minimal-link {
        font-size: 0.75rem; 
        letter-spacing: 1px;
        font-weight: 600;
        text-transform: uppercase;
    }
</style>