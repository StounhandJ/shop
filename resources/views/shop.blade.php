@extends('layouts/structure')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                @include('inc.category')
                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <!--features_items-->
                        <h1 class="title text-center">{{$current_category->getName()}}</h1>
                        @foreach ($paginate as $item)
                            @include('inc.product-card')
                        @endforeach
                    </div>
                    <!--features_items-->
                </div>
            </div>
            @include('inc.pagination')
        </div>
    </section>
@endsection
