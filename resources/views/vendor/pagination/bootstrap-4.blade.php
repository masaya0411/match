@if ($paginator->hasPages())
    <ul class="c-pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if (!$paginator->onFirstPage())
            <li class="c-pagination__item">
                <a class="c-pagination__link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true"><span class="c-pagination__link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="c-pagination__item active" aria-current="page"><span class="c-pagination__link">{{ $page }}</span></li>
                    @else
                        <li class="c-pagination__item"><a class="c-pagination__link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="c-pagination__item">
                <a class="c-pagination__link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
        @endif
    </ul>
@endif
