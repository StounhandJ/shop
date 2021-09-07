<div>
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <img src="{{$item->getImgSrc()}}" alt="Картинка товара" />
                <h2>{{ $item->getPrice() }} &#8381;</h2>
                <p class="product-title cut-title">{{ $item->getTitle() }}</p>
                <a href="{{ route('cart.add', ['p_id' => $item->getId()]) }}"
                    class="btn btn-default add-to-cart hidden-link">
                    <i class="fa fa-shopping-cart"></i>
                </a>
            </div>
            <div class="product-overlay">
                <div class="overlay-content">
                    <h2>{{ $item->getPrice() }} &#8381;</h2>
                    <p class="product-title cut-title">{{ $item->getTitle() }}</p>
                    <div class="overlay-buttons">
                        <button id="{{$item->getId()}}"
                            class="btn btn-default add-to-cart">
                            <i class="fa fa-shopping-cart"></i>
                        </button>
                        <a href="{{ route('product.details', ['product' => $item->getId()]) }}"
                            class="btn btn-default add-to-cart"><i class="fa fa-info-circle"></i>Подробнее</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
