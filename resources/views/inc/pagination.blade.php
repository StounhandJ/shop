@if ($paginate->lastPage() > 1)
    <ul class="pagination">

        @if ($paginate->lastPage() > 1 && $paginate->currentPage() != 1)
            <li><a
                    href="{{ $paginate->url($paginate->currentPage() - 1) }}">&laquo;</a>
            </li>
        @endif

        @if ($paginate->currentPage() > 4)
            <li><a
                    href="{{ $paginate->url(1) }}">1</a>
            </li>
            <li><a style="background: none; color: #FE980F; cursor: default">...</a></li>
        @endif

        @for ($i = $paginate->currentPage() > 4 ? $paginate->currentPage() - 2 : 1; $i <= ($paginate->currentPage() < $paginate->lastPage() - 3 ? $paginate->currentPage() + 2 : $paginate->lastPage()); $i++)
            <li class="{{ $i == $paginate->currentPage() ? 'active' : '' }}"><a
                    href="{{ $paginate->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        @if ($paginate->currentPage() < $paginate->lastPage() - 3)
            <li><a style="background: none; color: #FE980F; cursor: default">...</a></li>
            <li><a
                    href="{{ $paginate->url($paginate->lastPage()) }}">{{ $paginate->lastPage() }}</a>
            </li>
        @endif

        @if ($paginate->lastPage() > 1 && $paginate->currentPage() != $paginate->lastPage())
            <li><a
                    href="{{ $paginate->url($paginate->currentPage() + 1) }}">&raquo;</a>
            </li>
        @endif

    </ul>

@endif
