@extends('layouts/structure')
@section('title')Корзина@endsection
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
                                <td class="product" colspan="2">Товар</td>
                                <td class="total">Цена</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart_products_in as $product)
                                <tr>
                                    <td class="cart_product">
                                        <img src="{{$product->getImgSrc()}}" alt="Картинка товара">
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="{{ route('product.details', ['product' => $product->getId()]) }}" class="cut-title">{{ $product->getTitle() }}</a></h4>
                                        <p>ID товара: {{ $product->getId() }}</p>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price"><span class="price">{{ $product->getPrice() }}</span> &#8381;</p>
                                    </td>
                                    <td class="cart_delete">
                                        <a class="cart_quantity_delete" id="{{$product->getId()}}"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @endif
                </table>
            </div>
            <div class="final-price">
                <p>Итого к оплате: </p>
                <div class="int">
                    <span>0</span> &#8381;
                </div>
            </div>
        </div>
    </section>
    <!--/#cart_items-->

    <section id="do_action">
        @include('inc.custom')
    </section>
    <!--/#do_action-->
@endsection
