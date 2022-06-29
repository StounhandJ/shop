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
                                <div class="col-sm-12">
                                    <h1>Белый волк</h1>
                                    <h2>Россия, р. Крым, Белогорский район, пгт. Зуя, ул. Кулявина, 3</h2>
                                    <p>Работаем для Вас и Ваших домашних животных. На рынке с 2012 года. Растём и
                                        развиваемся вместе и для наших клиентов, уже целое десятилетие! И это только начало
                                        пути.
                                        <br>
                                        <br>
                                        Широкий выбор товаров для собак, кошек, птицы, грызунов, сельскохозяйственных
                                        животных. Большой ассортимент ветеринарных препаратов!
                                        <br>
                                        <br>
                                        Консультации и просто приятное общение! Поможем сделать выбор!
                                        <br>
                                        <br>
                                        Всегда Вам рады!
                                    </p>
                                    {{-- <button type="button" class="btn btn-default get">Подробнее</button> --}}
                                </div>
                                {{-- <div class="col-sm-6">
                                    <img src="/images/home/girl1.jpg" class="girl img-responsive" alt="" />
                                    <img src="/images/home/pricing.png" class="pricing" alt="" />
                                </div> --}}
                            </div>
                            <div class="item">
                                <div class="col-sm-12">
                                    <h1>Белый волк</h1>
                                    <h2>Россия, р. Крым, Белогорский район, пгт. Зуя, ул. Кулявина, 3</h2>
                                    <p>ОГРНИП 315910200227614
                                        ИНН 910700681395
                                        ИП Завгородний А.С.
                                        <br>
                                        <br>
                                        Лицензия N° 82-19-3-000079
                                        <br>
                                        <br>
                                        +7(978)8500420
                                        Viber
                                        WhatsApp
                                        Telegram
                                        <br>
                                        <br>
                                        bel.volk.zoo@gmail.com
                                        <br>
                                        <br>
                                        Или просто в чат на сайте!
                                    </p>
                                    {{-- <button type="button" class="btn btn-default get">Подробнее</button> --}}
                                </div>
                                {{-- <div class="col-sm-6">
                                    <img src="/images/home/girl2.jpg" class="girl img-responsive" alt="" />
                                    <img src="/images/home/pricing.png" class="pricing" alt="" />
                                </div> --}}
                            </div>

                            <div class="item">
                                <div class="col-sm-12">
                                    <h1>Белый волк</h1>
                                    <h2>Россия, р. Крым, Белогорский район, пгт. Зуя, ул. Кулявина, 3</h2>
                                    <p>Как нас найти? Просто нажмите на кнопку ниже!</p>
                                    <a class="btn btn-default get" href="https://goo.gl/maps/amLBLsUsYZN7tC4m8">Мы на карте
                                    </a>
                                </div>
                                {{-- <div class="col-sm-6">
                                    <img src="/images/home/girl3.jpg" class="girl img-responsive" alt="" />
                                    <img src="/images/home/pricing.png" class="pricing" alt="" />
                                </div> --}}
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
                                <p class="card-text">Полнорационные корма для собак и щенков всех пород. Большой
                                    ассортимент! Делайте покупки с удовольствием, для ваших хвостатых любимцев!</p>
                                <a href="https://bel-volk.ru/c/sobaki/korma" class="btn btn-primary">Перейти</a>
                            </div>
                        </div>
                        <div class="popular-categories-card">
                            <img class="card-img-top" src="/images/popular-categories/02.png" alt="Сухие корма для кошек">
                            <div class="card-body">
                                <h5 class="card-title">Сухие корма для кошек</h5>
                                <p class="card-text">В разделе Вы можете приобрести сухие корма для кошек и котят.
                                    Полнорационные корма в широком ассортименте! Покупайте с удовольствием, не выходя из
                                    дома!</p>
                                <a href="https://bel-volk.ru/c/koshki/korma_suhie_koshki"
                                    class="btn btn-primary">Перейти</a>
                            </div>
                        </div>
                        <div class="popular-categories-card">
                            <img class="card-img-top" src="/images/popular-categories/03.png" alt="Наполнители">
                            <div class="card-body">
                                <h5 class="card-title">Наполнители</h5>
                                <p class="card-text">Качественные наполнители для ваших домашних питомцев. Впитывающие,
                                    силикагелевые, впитывающие... Разнообразные и ожидающие Ваш выбор.</p>
                                <a href="https://bel-volk.ru/c/gryzyn/napolniteli_gryz" class="btn btn-primary">Перейти</a>
                            </div>
                        </div>
                        <div class="popular-categories-card">
                            <img class="card-img-top" src="/images/popular-categories/04.png"
                                alt="Средства от блох и клещей">
                            <div class="card-body">
                                <h5 class="card-title">Средства от блох и клещей</h5>
                                <p class="card-text">Защитите любимцев от накожных паразитов! Выбирайте и покупайте с
                                    заботой и любовью о Ваших четырехлапых друзьях!</p>
                                <a href="https://bel-volk.ru/c/vetapteka/insektoakaricidnye"
                                    class="btn btn-primary">Перейти</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
