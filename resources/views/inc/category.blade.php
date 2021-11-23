<div class="col-sm-3">
    <div class="left-sidebar">
        @if (Request::url() == route('catalog.index', ['department' => $current_department->getEName(), 'category' => $current_category->getEName()]) || Request::url() == route('catalog.index', ['department' => $current_department->getEName()]))
            <div class="price-slider-main">
                <h2 class="filters-all-title">Цена</h2>
                <div class="panel-group category-products">
                    <div class="price-range">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div id="filters-all-input-wrapper">
                                        @include('inc.price-slider')                                     
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filters-checkbox">
                @include('inc.filters-checkbox')
            </div>
            @include('inc.price-range-btn')
        @endif
        <h2 class="main-category-title category-mobile category-open">Категории <span
                class="badge category-plus-button"><i class="fa fa-minus"></i></span></h2>
        <ul class="panel-group category-products" id="accordian">
            @foreach ($categories as $item)
                <li>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="{{ $item->getId() == $current_category->getId() ? 'active' : '' }}"
                                    {{-- data-toggle="collapse" --}} data-parent="#accordian"
                                    href="{{ route('catalog.index', ['department' => $current_department->getEName(), 'category' => $item->getEName()]) }}">
                                    {{-- <span class="badge pull-right"><i class="fa fa-plus"></i></span> --}}
                                    {{ $item->getName() }}
                                </a>
                            </h4>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

        {{-- <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="#mens">
                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                        Категории
                    </a>
                </h2>
            </div>
            <div id="mens" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul>
                        <li><a href="">Fendi</a></li>
                        <li><a href="">Guess</a></li>
                        <li><a href="">Valentino</a></li>
                        <li><a href="">Dior</a></li>
                        <li><a href="">Versace</a></li>
                        <li><a href="">Armani</a></li>
                        <li><a href="">Prada</a></li>
                        <li><a href="">Dolce and Gabbana</a></li>
                        <li><a href="">Chanel</a></li>
                        <li><a href="">Gucci</a></li>
                    </ul>
                </div>
            </div>
        </div> --}}

    </div>
</div>
