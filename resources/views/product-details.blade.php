@extends('layouts/structure')
@section('title'){{ $product->getTitle() }}@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row">
                @include('inc.category')
                <div class="col-sm-9 padding-right">
                    <div class="product-details">
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="{{$product->getImgSrc()}}" alt="Картинка товара" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information">
                                <h2>{{ $product->getTitle() }}</h2>
                                <div>
                                    <span>{{ $product->getPrice() }} &#8381;</span>
                                </div>
                                <p><b>Производитель: </b><span></span> {{$product->getMaker()->getName()}}</p>
                                <p><b>ID товара: </b><span></span> {{$product->getId()}}</p>
                                {{-- <p><b>Длина: </b><span></span> см</p>
                                <p><b>Ширина: </b><span></span> см</p>
                                <p><b>Высота: </b><span></span> см</p> --}}
                                <button type="button" id="{{ $product->getId() }}"
                                    class="btn cart btn-cart-p-d">
                                    <i class="fa fa-shopping-cart"></i>
                                    Добавить в корзину
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="category-tab shop-details-tab">
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#dcp" data-toggle="tab">Описание</a></li>
                                <li><a href="#property" data-toggle="tab">Характеристики</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="dcp">
                                <div class="col-sm-12">
                                    <ul>
                                        <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure
                                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                        pariatur.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="property">
                                <div class="col-sm-12">
                                    <ul>
                                        <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure
                                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                        pariatur.</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
