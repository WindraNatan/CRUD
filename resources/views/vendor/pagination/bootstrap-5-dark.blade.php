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
    /* --- CSS Minimal Pagination --- */

    /* Reset Container */
    .minimal-pagination .page-item {
        margin: 0 2px; /* Jarak antar angka */
    }

    /* Style Link Dasar (Angka & Teks) */
    .minimal-pagination .minimal-link {
        background-color: transparent !important; /* Hapus background kotak */
        border: none !important; /* Hapus border kotak */
        color: #6c757d; /* Warna teks abu-abu (muted) */
        font-size: 0.85rem;
        font-weight: 500;
        padding: 8px 12px;
        transition: all 0.3s ease;
        border-radius: 4px; /* Sedikit rounded jika di-hover */
    }

    /* Efek Hover (Saat mouse di atas angka) */
    .minimal-pagination .minimal-link:hover {
        color: #fff; /* Teks jadi putih */
        background-color: rgba(255, 255, 255, 0.05) !important; /* Background muncul sangat tipis */
        text-decoration: none;
    }

    /* Style Halaman Aktif (Halaman yang sedang dibuka) */
    .minimal-pagination .page-item.active .minimal-link {
        color: #198754 !important; /* Warna Hijau (sesuai tema kita) */
        background-color: transparent !important;
        font-weight: bold;
        border-bottom: 1px solid #198754 !important; /* Garis bawah tipis sebagai penanda */
        border-radius: 0; /* Hapus radius untuk style garis bawah */
    }

    /* Menghilangkan fokus biru bawaan browser */
    .minimal-pagination .minimal-link:focus {
        box-shadow: none !important;
    }

    /* Style khusus untuk tombol PREV dan NEXT */
    .minimal-pagination .page-item:first-child .minimal-link,
    .minimal-pagination .page-item:last-child .minimal-link {
        font-size: 0.75rem; /* Lebih kecil sedikit */
        letter-spacing: 1px;
        font-weight: 600;
        text-transform: uppercase;
    }
</style>