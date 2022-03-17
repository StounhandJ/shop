<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="description"
        content="@yield('description') в интернет-магазине feeldom.ru, продажа мебели в Москве и Московской области, гибкий фильтр подбора за низкую цену">
    <meta name="keywords" content="мебель, москва, купить, доставка, заказать">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/prettyPhoto.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/price-range.css" rel="stylesheet">

    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" />

    <link rel="icon" href="/images/favicon.svg" sizes="48x48" type="image/x-icon">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"
        charset="utf-8"></script>
</head>

<body>
    <div class="wrapper">
        <header id="header">
            <div class="header_top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="tel:+79788500420"><i class="fa fa-phone header-contact-icon"></i>+7
                                            (978) 850-04-20 </a></li>
                                    <li><a href="mailto:bel.volk.zoo@gmail.com"><i
                                                class="fa fa-envelope header-contact-icon"></i>bel.volk.zoo@gmail.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="#" title=""><i class="fa fa-vk"></i></a></li>
                                    <li><a href="#" title=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="#" title=""><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle">
                <div class="container">
                    <div class="row logo-row">
                        <div class="logo">
                            <a href="{{ route('index') }}"><img src="/images/logo.png" alt="logo"></a>
                        </div>
                        <div class="search-content">
                            {{-- <div class="btn-group">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                        USA
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Canada</a></li>
                                        <li><a href="#">UK</a></li>
                                    </ul>
                                </div>
                                
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                        DOLLAR
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Canadian Dollar</a></li>
                                        <li><a href="#">Pound</a></li>
                                    </ul>
                                </div>
                            </div> --}}
                            <div class="search-content-inner">
                                <div class="search-icons">
                                    <input type="search" placeholder="Поиск..." id="search" autocomplete="off">
                                    <button><i class="fa fa-times-circle" aria-hidden="true"
                                            style="margin-top: 2px; font-size: 18px;"></i></button>
                                </div>
                            </div>
                            <div class="search-dropdown-content"></div>
                        </div>
                        <div class="shop-menu">
                            <ul class="nav navbar-nav carts-icons">
                                <li class="count-products-in-cart">?</li>
                                <li><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart"></i>Корзина</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    {{-- <li>
                                        <div class="price-slider-mobile">
                                            <p class="price-slider-mobile-title">Цена</p>
                                            @include('inc.price-slider')
                                        </div>
                                    </li> --}}
                                    <li><a href="{{ route('index') }}"
                                            class="{{ Request::url() == route('index') ? 'active' : '' }}">Главная</a>
                                    </li>
                                    @foreach ($departments as $item)
                                        <li><a href="{{ route('catalog.index', ['department' => $item->getEName()]) }}"
                                                class={{ isset($current_department) && $item->getId() == $current_department->getId() ? 'active' : '' }}>{{ $item->getName() }}</a>
                                        </li>
                                    @endforeach
                                    {{-- <li><a href="{{ route('custom') }}"
                                            class="{{ Request::url() == route('custom') ? 'active' : '' }}">На заказ</a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main id="main">
            @yield('content')
        </main>
        <footer id="footer">
            {{-- <div class="footer-widget">
                <div class="container">
                    <div class="row footer-row">
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>О нас</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">Акции</a></li>
                                    <li><a href="https://api.whatsapp.com/send/?phone=79261775858">Партнёрам</a></li>
                                    <li><a href="{{ route('info') }}#contacts">Контакты</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Услуги</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="{{ route('custom') }}">Под размер</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Покупателям</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="{{ route('info') }}#pay">Оплата</a></li>
                                    <li><a href="{{ route('info') }}#delivery">Доставка и самовывоз</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Наши соц. сети</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="https://vk.com/public208011201">ВКонтакте</a></li>
                                    <li><a href="https://www.instagram.com/_feel_dom_/">Инстаграм</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3 col-sm-offset-1">
                            <div class="single-widget">
                                <h2>Связаться с нами</h2>
                                <form action="#" class="searchform">
                                    <input type="tel" id="footer-callback-input" placeholder="Номер телефона" />
                                    <button class="btn btn-default"><i
                                            class="fa fa-arrow-circle-o-right" id="footer-callback"></i></button>
                                    <p>Введите номер телефона и в ближайшее время мы перезвоним вам!</p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p class="text-center">&copy; Белый волк, 2012 - {{ now()->year }}</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <div class="popup">
        <div class="popup__block">
            <i class="fa fa-times popup__close" aria-hidden="true"></i>
            <div>
                <p class="popup__text">Успешно!
                    {{-- <br> Скоро мы вам позвоним --}}
                </p>
            </div>
            <i class="fa fa-check-square-o" aria-hidden="true"></i>
        </div>
    </div>
    <div id="cookieNotification"> 
        <div class="container" 
            style="display: flex; align-items: center; justify-content: space-between;  
                    z-index: 1000; padding: 12px 0px; position: fixed; bottom: 0; width: 100%; background: #75c5f0;"> 
            <p style="font-size: 20px; color: white; margin: 0;">Мы используем файлы куки, чтобы пользоваться сайтом было удобно</p> 
            <button id="cookie-accept-btn" style="background: none; color: white; border: none; outline: none; font-size: 18px; background: #ffcf46; border-radius: 5px; padding: 5px 10px;">Понятно</button> 
        </div> 
    </div>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="/js/cut-title.js"></script>
    <script src="/js/add-to-cart.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.scrollUp.min.js"></script>
    <script src="/js/shit.js"></script>
    <script src="/js/jquery.prettyPhoto.js"></script>
    <script src="/js/search.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/cart.js"></script>
</body>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function(m, e, t, r, i, k, a) {
        m[i] = m[i] || function() {
            (m[i].a = m[i].a || []).push(arguments)
        };
        m[i].l = 1 * new Date();
        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(
            k, a)
    })
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(85838985, "init", {
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true
    });
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/85838985" style="position:absolute; left:-9999px;" alt="" /></div>
</noscript>
<!-- /Yandex.Metrika counter -->

</html>
