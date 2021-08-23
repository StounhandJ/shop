@extends('layouts/structure')
@section('title')Главная@endsection
@section('content')
    <section id="slider">
        <!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1>Название магазина</h1>
                                    <h2>Подзаголовок</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Подробнее</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="/images/home/girl1.jpg" class="girl img-responsive" alt="" />
                                    <img src="/images/home/pricing.png" class="pricing" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1>Название магазина</h1>
                                    <h2>Подзаголовок</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Подробнее</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="/images/home/girl2.jpg" class="girl img-responsive" alt="" />
                                    <img src="/images/home/pricing.png" class="pricing" alt="" />
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-sm-6">
                                    <h1>Название магазина</h1>
                                    <h2>Подзаголовок</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Подробнее</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="/images/home/girl3.jpg" class="girl img-responsive" alt="" />
                                    <img src="/images/home/pricing.png" class="pricing" alt="" />
                                </div>
                            </div>

                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--/slider-->

    <section class="index-content">
        <div class="container">
            <div class="row">
                {{-- <div class="col-sm-12">
                    <div class="category-tab">
                        <!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#toogle-list-1" data-toggle="tab">toogle-list-1</a></li>
                                <li><a href="#toogle-list-2" data-toggle="tab">toogle-list-2</a></li>
                                <li><a href="#toogle-list-3" data-toggle="tab">toogle-list-3</a></li>
                                <li><a href="#toogle-list-4" data-toggle="tab">toogle-list-4</a></li>
                                <li><a href="#toogle-list-5" data-toggle="tab">toogle-list-5</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="toogle-list-1">
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/images/home/gallery1.jpg" alt="" />
                                                <h2>56 &#8381;</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Добавить в корзину</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="toogle-list-2">
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/images/home/gallery4.jpg" alt="" />
                                                <h2>56 &#8381;</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Добавить в корзину</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="toogle-list-3">
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/images/home/gallery3.jpg" alt="" />
                                                <h2>56 &#8381;</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Добавить в корзину</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="toogle-list-4">
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/images/home/gallery1.jpg" alt="" />
                                                <h2>56 &#8381;</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Добавить в корзину</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="toogle-list-5">
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/images/home/gallery2.jpg" alt="" />
                                                <h2>56 &#8381;</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Добавить в корзину</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/category-tab-->


                    <div class="recommended_items">
                        <!--recommended_items-->
                        <h2 class="title text-center">Рекомендуем</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="/images/home/recommend1.jpg" alt="" />
                                                    <h2>56 &#8381;</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Добавить в корзину</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="/images/home/recommend1.jpg" alt="" />
                                                    <h2>56 &#8381;</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Добавить в корзину</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!--/recommended_items-->
                </div> --}}

                <h3>Акции</h3>
                <div class="sales">
                    <div class="col-sm-6">
                        <div class="sales__self sales__self-1">
                            Акция 1 (картинка)
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="sales__self sales__self-2">
                            Акция 2 (картинка)
                        </div>
                        <div class="sales-34-wrapper">
                            <div class="col-sm-6 sales__self-3">
                                <div class="sales__self">
                                    Акция 3 (картинка)
                                </div>
                            </div>
                            <div class="col-sm-6 sales__self-4">
                                <div class="sales__self">
                                    Акция 4 (картинка)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h3>Популярные категории</h3>
                <div class="popular-categories">
                    <div class="card">
                        <img src="http://placehold.it/286x180/" class="card-img-top" alt="#">
                        <div class="card-body">
                            <h5 class="card-title">Категория</h5>
                            <p class="card-text">Описание категроии</p>
                            <a href="#" class="btn btn-primary">Перейти</a>
                        </div>
                    </div>
                    <div class="card">
                        <img src="http://placehold.it/286x180/" class="card-img-top" alt="#">
                        <div class="card-body">
                            <h5 class="card-title">Категория</h5>
                            <p class="card-text">Описание категроии</p>
                            <a href="#" class="btn btn-primary">Перейти</a>
                        </div>
                    </div>
                    <div class="card">
                        <img src="http://placehold.it/286x180/" class="card-img-top" alt="#">
                        <div class="card-body">
                            <h5 class="card-title">Категория</h5>
                            <p class="card-text">Описание категроии</p>
                            <a href="#" class="btn btn-primary">Перейти</a>
                        </div>
                    </div>
                    <div class="card">
                        <img src="http://placehold.it/286x180/" class="card-img-top" alt="#">
                        <div class="card-body">
                            <h5 class="card-title">Категория</h5>
                            <p class="card-text">Описание категроии</p>
                            <a href="#" class="btn btn-primary">Перейти</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
