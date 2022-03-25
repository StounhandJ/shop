@extends('layouts/structure')
@section('title')
    Корзина
@endsection
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="cart_info">
                <table class="table table-condensed">
                    @if (count($cart_products_in) == 0)
                        <h3 class="zero-items-cart">Корзина пуста</h3>
                    @else
                        <thead>
                            <tr class="cart_menu">
                                <td class="product" colspan="3">Товар</td>
                                {{-- <td class="quantity"></td> --}}
                                <td class="total">Цена</td>
                                <td class="delete"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart_products_in as $product)
                                <tr>
                                    <td class="cart_product">
                                        <img src="{{ $product->getImgSrc() }}" alt="Картинка товара">
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="{{ route('product.details', ['product' => $product->getId()]) }}"
                                                class="cut-title">{{ $product->getTitle() }}</a></h4>
                                        <p>ID товара: {{ $product->getId() }}</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_wrapper">
                                            <input class="cart_quantity_input" type="number" name="quantity"
                                                id="quantity_input" min="1" max="100" autocomplete="off" value="1" data-normal-price="{{ $product->getPrice() }}">
                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price"><span
                                                class="price">{{ $product->getPrice() }}</span> &#8381;</p>
                                    </td>
                                    <td class="cart_delete">
                                        <a class="cart_quantity_delete" id="{{ $product->getId() }}"><i
                                                class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @endif
                </table>
            </div>
            @if (count($cart_products_in) > 0)
                <div class="final-price">
                    <p>Итого к оплате: </p>
                    <div class="int">
                        <span>0</span> &#8381;
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!--/#cart_items-->
    @if (count($cart_products_in) > 0)
        <section id="do_action">
            <div id="custom" class="content">
                <div class="container">
                    <div class="row align-items-stretch no-gutters contact-wrap custom-form-wrapper">
                        <div class="col-md-8">
                            <div class="form h-100">
                                <h3>
                                    Для оформления заказа заполните форму
                                </h3>
                                <form class="mb-5" id="cartId" name="contactForm">
                                    <div class="row">
                                        <div class="col-md-6 form-group mb-5">
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Имя*" required>
                                        </div>
                                        <div class="col-md-6 form-group mb-5">
                                            <input type="tel" class="form-control" name="phone" id="phone"
                                                placeholder="Контактный телефон*" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 form-group mb-5">
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="Почта">
                                        </div>
                                        <div class="col-md-6 form-group mb-5 promocode-wrapper">
                                            <input type="text" class="form-control" name="promo_code" id="promocode"
                                                placeholder="Промокод (если есть)">
                                            <button class="promocode-btn" id="promocode-btn"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 form-group mb-5">
                                            <textarea class="form-control" name="comment" id="message" cols="30" rows="4" placeholder="Комментарий..."></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 form-group cart-delivery">
                                            <label><input type="radio" name="delivery" id="delivery_pickup" required
                                                    checked> Самовывоз</label>
                                            <label><input type="radio" name="delivery" id="delivery_delivery" required>
                                                Доставка</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <input type="submit" value="Заказать" class="btn btn-primary form-button">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="contact-info h-100">
                                <h3>Белый волк</h3>
                                <p class="mb-5">Работаем на рынке товаров для животных и ветеринарной фармацевтики
                                    с 2012 года.
                                    Всегда рады нашим клиентам, с заботой о любимых питомцах!</p>
                                <ul class="list-unstyled">
                                    <li class="d-flex">
                                        <span class="wrap-icon icon-phone mr-3"></span>
                                        <span class="text"><a href="tel:+79788500420 " style="color:white">+7
                                                (978) 850-04-20 </a></span>
                                    </li>
                                    <li class="d-flex">
                                        <span class="wrap-icon icon-envelope mr-3"></span>
                                        <span class="text"><a href="mailto:bel.volk.zoo@gmail.com"
                                                style="color:white">bel.volk.zoo@gmail.com</a></span>
                                    </li>
                                    <li class="d-flex">
                                        <span class="wrap-icon icon-envelope mr-3"></span>
                                        <span class="text">Россия, р. Крым, Белогорский район, пгт. Зуя, ул.
                                            Кулявина, 3</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    @endif
@endsection
