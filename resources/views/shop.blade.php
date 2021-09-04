@extends('layouts/structure')
@section('title'){{ $current_category->getName() }}@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row">
                @include('inc.category')
                <div class="col-sm-9 padding-right">
                    <h1 class="title text-center">{{ $current_category->getName() }}</h1>
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
