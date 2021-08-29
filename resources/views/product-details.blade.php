@extends('layouts/structure')
@section('title'){{$product->getTitle()}}@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row">
                @include('inc.category')
                <div class="col-sm-9 padding-right">
                    <div class="product-details">
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="images/product-details/1.jpg" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information">
                                <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                                <h2>{{$product->getTitle()}}</h2>
                                <span>
                                    <span>{{$product->getPrice()}} &#8381;</span>
                                </span>
                                <p><b>Availability:</b> In Stock</p>
                                <p><b>Condition:</b> New</p>
                                <p><b>Brand:</b> E-SHOPPER</p>
                                <button type="button" id="{{$product->getId()}}" class="btn btn-fefault cart btn-cart-p-d">
                                    <i class="fa fa-shopping-cart"></i>
                                    Добавить в корзину
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="category-tab shop-details-tab">
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li><a href="#property" data-toggle="tab">Характеристики</a></li>
                                <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="reviews">
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
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/gallery1.jpg" alt="" />
                                                <h2>56 &#8381;</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Добавить в корзину</button>
                                            </div>
                                        </div>
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
