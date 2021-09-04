@extends('layouts/structure')
@section('title')На заказ @endsection
@section('content')
    <div id="custom" class="content">
        <div class="container">
            <div class="row align-items-stretch no-gutters contact-wrap custom-form-wrapper">
                <div class="col-md-8">
                    <div class="form h-100">
                        <h3>Заявка для оформления особого заказа</h3>
                        <form class="mb-5" method="post" id="contactForm" name="contactForm">
                            <div class="row">
                                <div class="col-md-6 form-group mb-5">
                                    <label for="" class="col-form-label">Имя *</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Как мы можем к вам обращаться?">
                                </div>
                                <div class="col-md-6 form-group mb-5">
                                    <label for="" class="col-form-label">Email *</label>
                                    <input type="text" class="form-control" name="email" id="email"
                                        placeholder="Ваша почта для связи...">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group mb-5">
                                    <label for="" class="col-form-label">Телефон</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Контактный телефон для связи...">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 form-group mb-5">
                                    <label for="message" class="col-form-label">Комментарий *</label>
                                    <textarea class="form-control" name="message" id="message" cols="30" rows="4"
                                        placeholder="Опишите ваши пожелания..."></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <input type="submit" value="Отправить" class="btn btn-primary">
                                    <span class="submitting"></span>
                                </div>
                            </div>
                        </form>

                        <div id="form-message-warning mt-4"></div>
                        <div id="form-message-success">
                            Your message was sent, thank you!
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info h-100">
                        <h3>Feeldom</h3>
                        <p class="mb-5">Сделаем для вас особый заказ, учитывая все ваши пожелания, даже самые сложны!</p>
                        <ul class="list-unstyled">
                            <li class="d-flex">
                                <span class="wrap-icon icon-phone mr-3"></span>
                                <span class="text">8 (495) 532-55-29</span>
                            </li>
                            <li class="d-flex">
                                <span class="wrap-icon icon-envelope mr-3"></span>
                                <span class="text">feeldom@bk.ru</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
