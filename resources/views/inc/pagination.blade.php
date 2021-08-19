@if ($totalPage > 1)
    <ul class="pagination">

        @if ($totalPage > 1 && $page != 1)
            <li><a
                    href="{{ route('catalog.index', ['departmentEName' => $department->getEName(), 'categoryEName' => $category->getEName(), 'p' => $page - 1]) }}">&laquo;</a>
            </li>
        @endif

        @if ($page > 4)
            <li><a
                    href="{{ route('catalog.index', ['departmentEName' => $department->getEName(), 'categoryEName' => $category->getEName(), 'p' => 1]) }}">1</a>
            </li>
            <li><a style="background: none; color: #FE980F; cursor: default">...</a></li>
        @endif

        @for ($i = $page > 4 ? $page - 2 : 1; $i <= ($page < $totalPage - 3 ? $page + 2 : $totalPage); $i++)
            <li class="{{ $i == $page ? 'active' : '' }}"><a
                    href="{{ route('catalog.index', ['departmentEName' => $department->getEName(), 'categoryEName' => $category->getEName(), 'p' => $i]) }}">{{ $i }}</a>
            </li>
        @endfor

        @if ($page < $totalPage - 3)
            <li><a style="background: none; color: #FE980F; cursor: default">...</a></li>
            <li><a
                    href="{{ route('catalog.index', ['departmentEName' => $department->getEName(), 'categoryEName' => $category->getEName(), 'p' => $totalPage]) }}">{{ $totalPage }}</a>
            </li>
        @endif

        @if ($totalPage > 1 && $page != $totalPage)
            <li><a
                    href="{{ route('catalog.index', ['departmentEName' => $department->getEName(), 'categoryEName' => $category->getEName(), 'p' => $page + 1]) }}">&raquo;</a>
            </li>
        @endif
        
    </ul>

@endif
