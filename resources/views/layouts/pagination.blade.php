@if ($paginator->hasPages())
    <div class="card-footer d-flex align-items-center d-print-none">
        <p class="m-0 text-muted">
            {{ __('Showing') }}
            <span class="font-weight-medium">{{ $paginator->firstItem() ?: 0 }}</span>
            {{ __('to') }}
            <span class="font-weight-medium">{{ $paginator->lastItem() ?: 0 }}</span>
            {{ __('of') }}
            <span class="font-weight-medium">{{ $paginator->total() }}</span>
            {{ __('entries') }}
        </p>
        <ul class="pagination m-0 ms-auto">
            <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" tabindex="-1">
                    {{ __('Prev') }}
                </a>
            </li>

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <span class="page-link" aria-current="page">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Link --}}
            <li class="page-item {{ $paginator->hasMorePages() ?: 'disabled' }}">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" tabindex="-1">
                    {{ __('Next') }}
                </a>
            </li>
        </ul>
    </div>
@endif
