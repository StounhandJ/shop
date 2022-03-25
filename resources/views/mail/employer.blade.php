@component('mail::table')
    | Название | Количество    | Цена          | Производитель |
    | ---------|:-------------:|:-------------:|--------------:|
    @foreach ($order->products_orders()->getResults() as $item)
        | <a href="{{ $item->getProduct()->getUrlAttribute() }}">{{ $item->getProduct()->getTitle() }}</a> | {{ $item->getCount() }} | {{ $item->getProduct()->getPrice() }}р. | {{ $item->getProduct()->getMaker()->getName() }} |
    @endforeach
@endcomponent

@component('mail::panel')
    Телефон:  {{ $order->getPhone() }}<br>
    Почта:  {{ $order->getEmail() }}<br>
    Комментарий:  {{ $order->getComment() }}
    Тип получения:  {{ $order->delivery=="delivery_delivery"?"Доставка":"Самовывоз" }}
@endcomponent
