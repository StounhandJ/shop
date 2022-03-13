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
                    <div class="recommended_items">
                        <!--recommended_items-->
                        <h2 class="title text-center">Рекомендуем</h2>
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                {{-- @foreach ($paginate as $item)
                                    @include('inc.product-card')
                                @endforeach --}}
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
                </div>

                <h2 class="title text-center">Популярные категории</h2>
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
