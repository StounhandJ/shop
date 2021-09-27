@component('mail::panel')
    Телефон:  {{ $order->getPhone() }}<br>
    Почта:  {{ $order->getEmail() }}<br>
    Комментарий:  {{ $order->getComment() }}
@endcomponent