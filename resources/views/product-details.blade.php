@extends('layouts/structure')
@section('title')
    {{ $title }}
@endsection
@section('description')
    {{ $description }}
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row">
                @include('inc.category')
                <div class="col-sm-9 padding-right">
                    <div class="product-details">
                        <div class="col-sm-5">
                            <div class="view-product" style="background-image: url({{ $product->getImgSrc() }});">
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information">
                                <h2>{{ $product->getTitle() }}</h2>
                                <div>
                                    <span>{{ $product->getPrice() }} &#8381;</span>
                                </div>
                                <p><b>Производитель: </b> {{ $product->getMaker()->getName() }}</p>
                                {{-- <p><b>Артикуль: </b> {{ $product->getId() }}</p> --}}
                                <button type="button" id="{{ $product->getId() }}" class="btn cart btn-cart-p-d">
                                    <i class="fa fa-shopping-cart"></i>
                                    Добавить в корзину
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="category-tab shop-details-tab">
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#dcp" data-toggle="tab">Описание</a></li>
                                <li><a href="#property" data-toggle="tab">Ещё</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="dcp">
                                <div class="col-sm-12">
                                    {{-- <ul>
                                        <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                    </ul> --}}
                                    <p>{!! html_entity_decode(str_replace(array("\r\n", "\n"), '<br>', $product->getDescription())) !!}</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="property">
                                <div class="popular-products-wrapper-details">
                                    <div class="popular-products-details col-sm-12">
                                        @foreach ($popular as $item)
                                            <div class="popular-products__card-details">
                                                @include('inc.product-card')
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
