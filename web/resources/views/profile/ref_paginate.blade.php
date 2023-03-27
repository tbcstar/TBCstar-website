@if ($paginator->hasPages())
    <ul role="menubar" aria-disabled="false" aria-label="Pagination" class="pagination b-pagination pagination-md justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li aria-hidden="true" class="page-item disabled"><span class="page-link">«</span></li>
            <li aria-hidden="true" class="page-item disabled"><span class="page-link">Пред.</span></li>
        @else
            <li class="page-item">
                <a href="{{ $paginator->previousPageUrl() }}" aria-label="@lang('pagination.next')"
                   class="page-link">
                    <span aria-hidden="true">«</span>
                </a>
            </li>
            <li class="page-item">
                <a role="menuitem" tabindex="-1" aria-label="Goto last page" href="{{ $paginator->previousPageUrl() }}" class="page-link">
                    <span aria-hidden="true">Пред.</span>
                </a>
            </li>
        @endif

        <li class="page-item disabled">
            <a class="page-link btn-primary">
                Страница {{ $paginator->firstItem() }}–{{ $paginator->lastItem() }} из {{ $paginator->total() }}
            </a>
        </li>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a href="{{ $paginator->nextPageUrl() }}" aria-label="@lang('pagination.next')"
                    class="page-link">
                    <span aria-hidden="true">Далее</span>
                </a>
            </li>
            <li class="page-item">
                <a role="menuitem" tabindex="-1" aria-label="Goto last page" href="{{ $paginator->nextPageUrl() }}" class="page-link">
                    <span aria-hidden="true">»</span>
                </a>
            </li>
        @else
            <li aria-hidden="true" class="page-item disabled"><span class="page-link">Далее</span></li>
            <li aria-hidden="true" class="page-item disabled"><span class="page-link">»</span></li>
        @endif
    </ul>
@endif
