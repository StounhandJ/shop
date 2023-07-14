@extends('layouts/structure')
@section('title')
    Корзина
@endsection
@section('content')
    <section id="do_action">
        <div id="custom" class="content">
            <div class="container">
                <div class="row align-items-stretch no-gutters contact-wrap custom-form-wrapper">
                    <div class="col-md-8">
                        <div class="form h-100">
                            <h3>
                                Заполните форму для связи со специалистом.<br>Ответим в ближайшее время!
                            </h3>
                            <form class="mb-5" id="consultation">
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
                                    <div class="col-md-12 form-group mb-5">
                                        <input class="form-control" name="comment" id="message"
                                            placeholder="Напишите свой вопрос..." />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>ВНИМАНИЕ! Консультация является платной. Стоимость рассчитывается иднивидуально в
                                            зависимости от сложности вопроса в переписке с ветеринаром.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-check col-md-12">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault1" required>
                                        <label class="form-check-label" for="flexCheckDefault1">
                                            С текстом выше ознакомлен и согласен
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-check col-md-12">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault2" required>
                                        <label class="form-check-label" for="flexCheckDefault2">
                                            Согласие на обработку персональных данных
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="submit" value="Отправить" class="btn btn-primary form-button">
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
    <script>
        document.querySelector("form#consultation").onsubmit = (e) => {
            e.preventDefault();
            let fd = new FormData(consultation);
            let text =
                `Добрый день, меня зовут ${fd.get("name")}, пишу вам с сайта Белый Волк; мой контактный номер телефона: ${fd.get("phone")}, мой вопрос: ${fd.get("comment")}`;
            window.open(`https://wa.me/79788500420?text=${text}`, '_blank');
        }
    </script>
@endsection
