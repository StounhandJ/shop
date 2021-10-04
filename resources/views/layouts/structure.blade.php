<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/prettyPhoto.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/price-range.css" rel="stylesheet">
    <link rel="icon" href="/images/ico/favicon.ico" sizes="48x48" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"
        charset="utf-8"></script>
</head>
<!--/head-->

<body>
    <div class="wrapper">
        <header id="header">
            <!--header-->
            <div class="header_top">
                <!--header_top-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="tel:84955325529"><i class="fa fa-phone header-contact-icon"></i>8 (495)
                                            532-55-29</a></li>
                                    <li><a href="mailto:feeldom@bk.ru"><i
                                                class="fa fa-envelope header-contact-icon"></i>feeldom@bk.ru</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="#" title="Филдом ВКонтакте"><i class="fa fa-vk"></i></a></li>
                                    <li><a href="#" title="Филдом Инстаграм"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/header_top-->
            <div class="header-middle">
                <!--header-middle-->
                <div class="container">
                    <div class="row logo-row">
                        <div class="col-sm-6">
                            <div class="logo pull-left">
                                <a href="{{ route('index') }}"><img src="/images/logo-lg.svg" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav carts-icons">
                                    <li class="count-products-in-cart">?</li>
                                    <li><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart"></i>Корзина</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/header-middle-->
            <div class="header-bottom">
                <!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
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
                                    {{-- <li><a href="{{ route('index') }}"
                                            class="{{ Request::url() == route('index') ? 'active' : '' }}">Главная</a>
                                    </li> --}}
                                    @foreach ($departments as $item)
                                        <li><a href="{{ route('catalog.index', ['department' => $item->getEName()]) }}"
                                                class={{ isset($current_department) && $item->getId() == $current_department->getId() ? 'active' : '' }}>{{ $item->getName() }}</a>
                                        </li>
                                    @endforeach
                                    <li><a href="{{ route('custom') }}"
                                            class="{{ Request::url() == route('custom') ? 'active' : '' }}">На заказ</a>
                                    </li>
        
        
        
                                    {{-- <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="shop.html">Products</a></li>
                                            <li><a href="product-details.html">Product Details</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="cart.html">Cart</a></li>
                                        </ul>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="search-content pull-right">
                                <div class="search-icons">
                                    <input type="search" placeholder="Поиск..." id="search" autocomplete="off">
                                    <button><i class="fa fa-times-circle" aria-hidden="true"
                                            style="margin-top: 2px; font-size: 18px;"></i></button>
                                </div>
                                <div class="search-dropdown-content"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/header-bottom-->
        </header>
        <!--/header-->
        <main id="main">
            @yield('content')
        </main>
        <footer id="footer">
            <!--Footer-->
            <div class="footer-widget">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>О нас</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">Акции</a></li>
                                    <li><a href="#">Партнёрам</a></li>
                                    <li><a href="#">Контакты</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Услуги</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">Под размер</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Покупателям</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">Оплата</a></li>
                                    <li><a href="#">Доставка и самовывоз</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Наши соц. сети</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">ВКонтакте</a></li>
                                    <li><a href="#">Инстаграм</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3 col-sm-offset-1">
                            <div class="single-widget">
                                <h2>Связаться с нами</h2>
                                <form action="#" class="searchform">
                                    <input type="tel" placeholder="Номер телефона" />
                                    <button type="submit" class="btn btn-default"><i
                                            class="fa fa-arrow-circle-o-right"></i></button>
                                    <p>Введите номер телефона и в ближайшее время мы перезвоним вам!</p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p class="text-center">&copy; Feeldom.ru, {{ now()->year }}</p>
                    </div>
                </div>
            </div>
        </footer>
        <!--/Footer-->
    </div>
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

</html>
