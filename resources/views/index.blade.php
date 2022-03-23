@extends('layouts/structure')
@section('title')
    Главная
@endsection
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

                <div class="col-sm-12">
                    <div class="popular-products-wrapper popular-products-wrapper-slider">
                        <h2 class="title text-center">Популярные товары</h2>
                        <div class="popular-products popular-products-slider">
                            @foreach ($popular as $item)
                                <div class="popular-products__card">
                                    @include('inc.product-card')
                                </div>
                            @endforeach
                        </div>
                        <a class="popular-products-prev left control-carousel hidden-xs">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="popular-products-next right control-carousel hidden-xs">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>




                <div class="col-sm-12">
                    <h2 class="title text-center">Популярные категории</h2>
                    <div class="popular-categories">
                        <div class="popular-categories-card">
                            <img class="card-img-top" src="/images/popular-categories/01.png" alt="Сухие корма для собак">
                            <div class="card-body">
                                <h5 class="card-title">Сухие корма для собак</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Перейти</a>
                            </div>
                        </div>
                        <div class="popular-categories-card">
                            <img class="card-img-top" src="/images/popular-categories/02.png" alt="Сухие корма для кошек">
                            <div class="card-body">
                                <h5 class="card-title">Сухие корма для кошек</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Перейти</a>
                            </div>
                        </div>
                        <div class="popular-categories-card">
                            <img class="card-img-top" src="/images/popular-categories/03.png" alt="Наполнители">
                            <div class="card-body">
                                <h5 class="card-title">Наполнители</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Перейти</a>
                            </div>
                        </div>
                        <div class="popular-categories-card">
                            <img class="card-img-top" src="/images/popular-categories/04.png" alt="Средства от блох и клещей">
                            <div class="card-body">
                                <h5 class="card-title">Средства от блох и клещей</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Перейти</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
