@if ($paginator->hasPages())
    <div class="dataTables_wrapper text-lg-right">
        <div class="dataTables_paginate paging_simple_numbers" id="data-table-custom_paginate">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="paginate_button previous disabled mr-2" aria-label="@lang('pagination.previous')">Previous</a>
            @else
                <a class="paginate_button previous mr-2" href="{{ $paginator->previousPageUrl() }}"
                   aria-label="@lang('pagination.previous')">Previous</a>
            @endif
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @php
                        $left = false;
                        $right = false;
                    @endphp
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="paginate_button current mr-2">{{ $page }}</a>
                        @elseif (($page === 1 || $page === 2 || ($paginator->currentPage() === 1 && $page === 3) || $page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() - 1)
             || (($paginator->currentPage() === $paginator->lastPage() && $page === $paginator->lastPage() - 2) || $page === $paginator->lastPage() || $page === $paginator->lastPage() - 1))
                            <a href="{{ $url }}" class="paginate_button mr-2">{{ $page }}</a>
                        @elseif (!$left && $paginator->currentPage() - 2 > 2 && $page < $paginator->currentPage())
                            @php
                                $left = true;
                            @endphp
                            <a class="paginate_button mr-2"><span>…</span></a>
                        @elseif (!$right && $paginator->currentPage() + 2 < $paginator->lastPage() - 1 && $page > $paginator->currentPage())
                            @php
                                $right = true;
                            @endphp
                            <a class="paginate_button mr-2"><span>…</span></a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="paginate_button next mr-2" href="{{ $paginator->nextPageUrl() }}"
                   aria-label="@lang('pagination.next')">Next</a>
            @else
                <a class="paginate_button next disabled mr-2" onclick="javascript:void(0);"
                   aria-label="@lang('pagination.next')">Next</a>
            @endif
        </div>
    </div>
@endif
