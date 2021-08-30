<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <img src="/images/home/product1.jpg" alt="product-image" />
                {{-- <h2>{{ $item->getPrice() }} &#8381;</h2> --}}
                <p>{{ $item->getTitle() }}</p>
                <a href="{{ route('cart.add', ['p_id' => $item->getId()]) }}"
                    class="btn btn-default add-to-cart hidden-link">
                    <i class="fa fa-shopping-cart"></i>
                </a>
            </div>
            <div class="product-overlay">
                <div class="overlay-content">
                    <h2>{{ $item->getPrice() }} &#8381;</h2>
                    <p>{{ $item->getTitle() }}</p>
                    <div class="overlay-buttons">
                        <a href="{{ route('product.details', ['product' => $item->getId()]) }}"
                            class="btn btn-default add-to-cart"><i class="fa fa-info-circle"></i>Подробнее</a>
                        <button id="{{$item->getId()}}"
                            class="btn btn-default add-to-cart">
                            <i class="fa fa-shopping-cart"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
