@component('mail::table')
    | Название | Цена          | Производитель  |
    | ---------|:-------------:| --------------:|
    @foreach ($order->products()->get() as $item)
        | <a href="{{ $item->getUrlAttribute() }}">{{ $item->getTitle() }}</a> | {{ $item->getPrice() }}р. | {{ $item->getMaker()->getName() }} |
    @endforeach
@endcomponent

@component('mail::panel')
    Телефон:  {{ $order->getPhone() }}<br>
    Почта:  {{ $order->getEmail() }}<br>
    Комментарий:  {{ $order->getComment() }}
@endcomponent