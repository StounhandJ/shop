<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="description"
        content="@yield('description') в интернет-магазине bel-volk.ru, продажа товаров для животных с большим ассортиментом, гибкий фильтр подбора за низкую цену">
    <meta name="keywords" content="животные, крым, игрушки, севастополь, доставка, заказать">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/prettyPhoto.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/price-range.css" rel="stylesheet">

    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"
        charset="utf-8"></script>
</head>

<body>
    <div class="wrapper">
        <header id="header">
            <div class="header_top">
                <div class="container">
                    <div class="row header-top-row">
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
                                    <li>
                                        <a href="https://wapp.click/79788500420" class="soc-whatsapp" title="Белый волк в вотсаппе">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.9547 2.03529C11.3099 1.38751 10.5421 0.873942 9.69602 0.524521C8.8499 0.1751 7.94239 -0.00318873 7.02637 4.31641e-05C3.18797 4.31641e-05 0.0597689 3.11328 0.0562531 6.93527C0.0562531 8.15939 0.377951 9.35026 0.985309 10.4046L0 14L3.69513 13.0358C4.71736 13.5896 5.86257 13.8798 7.02637 13.8801H7.02988C10.8692 13.8801 13.9965 10.7669 14 6.9414C14.0009 6.02969 13.8205 5.12682 13.4693 4.2848C13.1182 3.44278 12.6031 2.67826 11.9538 2.03529H11.9547ZM7.02637 12.7059C5.98832 12.7062 4.96935 12.4281 4.07659 11.9009L3.86564 11.7749L1.67353 12.3471L2.25891 10.2183L2.1218 9.99864C1.54152 9.08018 1.23462 8.01679 1.23669 6.93177C1.23669 3.75903 3.83576 1.17079 7.02988 1.17079C7.79083 1.16943 8.54452 1.31803 9.2475 1.60802C9.95049 1.89801 10.5889 2.32365 11.1258 2.86041C11.6646 3.39508 12.0918 4.03065 12.3827 4.73048C12.6735 5.43031 12.8223 6.18054 12.8204 6.9379C12.8169 10.122 10.2179 12.7059 7.02637 12.7059V12.7059ZM10.2038 8.38864C10.0306 8.30202 9.17541 7.88289 9.01456 7.82339C8.85459 7.76652 8.73769 7.73677 8.62343 7.91002C8.50653 8.08239 8.17252 8.47527 8.07232 8.58814C7.97212 8.70452 7.86841 8.71764 7.69437 8.63189C7.52122 8.54439 6.95957 8.36239 6.29508 7.77002C5.77649 7.31065 5.42931 6.7419 5.32559 6.56952C5.22539 6.39627 5.31592 6.30352 5.40294 6.2169C5.47941 6.1399 5.57609 6.0139 5.66311 5.91415C5.751 5.8144 5.78001 5.7409 5.83714 5.6254C5.89427 5.50815 5.86703 5.4084 5.82396 5.32178C5.78001 5.23515 5.43282 4.38028 5.28604 4.03553C5.1454 3.69516 5.00213 3.74241 4.8949 3.73803C4.7947 3.73191 4.6778 3.73191 4.5609 3.73191C4.47262 3.73409 4.38575 3.75442 4.30573 3.79161C4.22572 3.8288 4.15429 3.88206 4.09593 3.94803C3.93596 4.12128 3.48857 4.5404 3.48857 5.39528C3.48857 6.25015 4.11263 7.07177 4.20053 7.18815C4.28666 7.30452 5.42579 9.05364 7.17403 9.80614C7.58714 9.98551 7.91235 10.0914 8.16637 10.1719C8.58388 10.3049 8.96095 10.2848 9.26155 10.2419C9.59555 10.1911 10.2908 9.82189 10.4376 9.41676C10.5817 9.01077 10.5817 8.66427 10.5378 8.59164C10.4947 8.51814 10.3778 8.47527 10.2038 8.38864V8.38864Z"
                                                    fill="black" />
                                            </svg>

                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://viber.click/79788500420" class="soc-viber" title="Белый волк в вайбере">
                                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12.6109 1.40097C12.2447 1.08109 10.7628 0.061295 7.45859 0.0476249C7.45859 0.0476249 3.56336 -0.173832 1.6662 1.47752C0.610947 2.47818 0.239011 3.94635 0.198646 5.76448C0.158281 7.58262 0.109266 10.9892 3.57201 11.9133H3.5749L3.57201 13.3241C3.57201 13.3241 3.54895 13.8955 3.94683 14.0103C4.42545 14.1525 4.708 13.7178 5.16643 13.2503C5.41727 12.9933 5.76326 12.616 6.02563 12.3289C8.39564 12.5175 10.215 12.0856 10.4225 12.0227C10.9012 11.875 13.6085 11.547 14.0467 8.14036C14.5023 4.62439 13.8276 2.40436 12.6109 1.40097V1.40097ZM13.0117 7.88336C12.6397 10.7268 10.4456 10.9072 10.042 11.0302C9.86896 11.0822 8.26878 11.4595 6.25917 11.3364C6.25917 11.3364 4.7599 13.0507 4.29282 13.4963C4.14001 13.6412 3.97278 13.6276 3.97566 13.3405C3.97566 13.1518 3.9872 10.9974 3.9872 10.9974C3.98431 10.9974 3.98431 10.9974 3.9872 10.9974C1.05208 10.2264 1.22507 7.32562 1.25679 5.80823C1.2885 4.29084 1.59124 3.04686 2.48504 2.21024C4.09099 0.829558 7.39805 1.03461 7.39805 1.03461C10.1919 1.04555 11.5297 1.84388 11.8411 2.11182C12.8704 2.94843 13.3951 4.94974 13.0117 7.88336V7.88336ZM9.004 5.67426C9.01553 5.90939 8.6436 5.92579 8.63206 5.69067C8.60035 5.08918 8.30338 4.79664 7.69213 4.76383C7.44418 4.75016 7.46724 4.39747 7.71232 4.41114C8.51673 4.45215 8.96363 4.88959 9.004 5.67426ZM9.58929 5.98321C9.61812 4.82398 8.85407 3.91628 7.40381 3.81512C7.15874 3.79872 7.18469 3.44603 7.42976 3.46243C9.10203 3.57726 9.99294 4.66814 9.96123 5.99141C9.95834 6.22654 9.58353 6.2156 9.58929 5.98321V5.98321ZM10.9444 6.34957C10.9473 6.58469 10.5725 6.58743 10.5725 6.3523C10.5552 4.12407 8.98958 2.91016 7.08954 2.89649C6.84447 2.89375 6.84447 2.5438 7.08954 2.5438C9.21447 2.55747 10.9242 3.94909 10.9444 6.34957V6.34957ZM10.6186 9.03165V9.03712C10.3072 9.55659 9.7248 10.1307 9.12509 9.94755L9.11933 9.93935C8.51097 9.77804 7.07801 9.07813 6.17268 8.39462C5.7056 8.04467 5.27888 7.63183 4.95019 7.23539C4.65322 6.8827 4.35337 6.4644 4.06216 5.96134C3.44803 4.90873 3.31252 4.43848 3.31252 4.43848C3.11935 3.8698 3.72194 3.31753 4.27264 3.02225H4.2784C4.54366 2.89102 4.79738 2.93476 4.96749 3.12888C4.96749 3.12888 5.32501 3.53352 5.47782 3.7331C5.62198 3.91901 5.81516 4.21702 5.91607 4.3838C6.09195 4.68181 5.98238 4.98529 5.80939 5.11105L5.4634 5.37352C5.28753 5.50749 5.31059 5.75628 5.31059 5.75628C5.31059 5.75628 5.82381 7.59629 7.74115 8.06107C7.74115 8.06107 8.00352 8.08294 8.1448 7.91617L8.42159 7.58808C8.55422 7.42404 8.87425 7.32015 9.18852 7.48692C9.61236 7.71385 10.1515 8.06654 10.509 8.38642C10.7109 8.54226 10.757 8.78012 10.6186 9.03165Z"
                                                    fill="black" />
                                            </svg>

                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://t.me/Bel_Volk_Zoo" class="soc-tg" title="Белый волк в телеграмме">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M14 7C14 10.8657 10.8657 14 7 14C3.13425 14 0 10.8657 0 7C0 3.13425 3.13425 0 7 0C10.8657 0 14 3.13425 14 7ZM7.25083 5.16775C6.57008 5.45067 5.20917 6.03692 3.16867 6.92592C2.83733 7.05775 2.6635 7.18667 2.64775 7.31267C2.62092 7.52617 2.88808 7.61017 3.25092 7.72392C3.3005 7.73967 3.35183 7.75542 3.40433 7.77292C3.76192 7.889 4.24258 8.02492 4.49225 8.03017C4.71917 8.03483 4.97233 7.9415 5.25175 7.75017C7.15808 6.46275 8.14217 5.81233 8.204 5.79833C8.24775 5.78842 8.30842 5.77558 8.34925 5.81233C8.39008 5.8485 8.386 5.91733 8.38192 5.936C8.35508 6.04858 7.30858 7.02217 6.76608 7.52617C6.59692 7.68308 6.47733 7.7945 6.45283 7.82017C6.398 7.87675 6.342 7.931 6.28833 7.98292C5.95583 8.30258 5.70733 8.54292 6.30233 8.93492C6.58817 9.12333 6.81683 9.27908 7.04492 9.43425C7.294 9.604 7.5425 9.77317 7.8645 9.98433C7.94617 10.038 8.02433 10.0934 8.10075 10.1477C8.39067 10.3547 8.65142 10.5402 8.97342 10.5111C9.16008 10.4936 9.35375 10.318 9.45175 9.79358C9.68333 8.55342 10.1395 5.86775 10.2451 4.76058C10.2515 4.66866 10.2476 4.5763 10.2334 4.48525C10.2249 4.41171 10.1891 4.34404 10.1331 4.29567C10.0497 4.22742 9.92017 4.21283 9.86183 4.214C9.59875 4.21867 9.19508 4.35925 7.25083 5.16775V5.16775Z"
                                                    fill="black" />
                                            </svg>

                                        </a>
                                    </li>
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
    <div id="cookieNotification" style="display: none;">
        <div class="container cookie-norification-wrapper">
            <p class="cookie-notification-p">Мы используем файлы куки, чтобы пользоваться сайтом было удобно</p>
            <button id="cookie-accept-btn" class="cookie-notification-btn">Понятно</button>
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
