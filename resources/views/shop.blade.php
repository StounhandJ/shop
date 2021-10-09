@extends('layouts/structure')
@section('title'){{ $current_category->getName() }}@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row">
                @include('inc.category')
                <div class="col-sm-9" style="position: relative">
                    <h1 class="title text-center">{{ $current_category->getName() }}</h1>
                    <div class="filters-line">

                        <span class="sort-bytext">Сортировать по:</span>

                        <div class="panel-default">
                            <h4 class="panel-title filter-btn">
                                <button id="filter-price">Цене</button>
                                <img src="/images/filters/filter-01.svg" class="filter">
                            </h4>
                        </div>

                        
                        <div class="panel-default">
                            <h4 class="panel-title filter-btn">
                                <button id="filter-Az">Алфавиту</button>
                                <img src="/images/filters/filter-01.svg" class="filter">
                            </h4>
                        </div>
                        
                        <div class="panel-default">
                            <h4 class="panel-title filter-btn">
                                <button id="filter-popular">Популярности</button>
                                {{-- <img src="/images/filters/filter-01.svg" class="filter"> --}}
                            </h4>
                        </div>
                        
                        {{-- <div class="panel-default">
                            <button class="btn btn-primary btn-price-slider" id="filter-clear">Очистить</button>
                        </div> --}}

                    </div>
                    <div class="features_items shop-grid">
                        @if ($paginate->isEmpty())
                            <h3 class="zero-items-shop">Товаров нет</h3>
                        @else
                            @foreach ($paginate as $item)
                                @include('inc.product-card')
                            @endforeach
                        @endif
                    </div>
                    <!--features_items-->
                </div>
            </div>
            @include('inc.pagination')
        </div>
    </section>
@endsection
