<h2>Бренды</h2>
<div class="panel panel-default">
    <div class="panel-heading">
        <ul class="filters-checkbox-ul">
            @foreach ($makers as $item)
                <li class="filters-checkbox-li">
                    <h4 class="panel-title">
                        <input type="checkbox" class="filter-checkbox-self" name="{{ $item->getName() }}" id="{{ $item->getId() }}">
                        <span>{{ $item->getName() }}</span>
                    </h4>
                </li>
            @endforeach
        </ul>
        @if ($makers->count() > 3)
            <span class="filters-checkbox-more"><span class="filters-checkbox-more-text">Ещё</span><i
                    class="fa fa-checkbox-arrow fa-arrow-down"></i></span>
        @endif
    </div>
</div>
