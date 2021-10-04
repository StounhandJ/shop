<div id="custom" class="content">
    <div class="container">
        <div class="row align-items-stretch no-gutters contact-wrap custom-form-wrapper">
            <div class="col-md-8">
                <div class="form h-100">
                    <h3>
                        @if (Request::url() == route('custom'))
                            Заявка для оформления особого заказа
                        @else
                            Для оформления заказа заполните форму
                        @endif
                    </h3>
                    <form class="mb-5" id="{{Request::url() == route('custom') ? "customId" : "cartId"}}" name="contactForm">
                        <div class="row">
                            <div class="col-md-6 form-group mb-5">
                                <label for="" class="col-form-label">Имя *</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Как мы можем к вам обращаться?" required>
                            </div>
                            <div class="col-md-6 form-group mb-5">
                                <label for="" class="col-form-label">Email *</label>
                                <input type="text" class="form-control" name="email" id="email"
                                    placeholder="Ваша почта для связи..." required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group mb-5">
                                <label for="" class="col-form-label">Телефон *</label>
                                <input type="tel" class="form-control" name="phone" id="phone"
                                    placeholder="Контактный телефон для связи..." required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group mb-5">
                                <label for="comment" class="col-form-label">Комментарий</label>
                                <textarea class="form-control" name="comment" id="message" cols="30" rows="4"
                                    placeholder="Опишите ваши пожелания..."></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="submit" value="{{ Request::url() == route('custom') ? 'Отправить' : 'Заказать' }}" class="btn btn-primary form-button">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-info h-100">
                    <h3>Feeldom</h3>
                    <p class="mb-5">Сделаем для вас особый заказ, учитывая все ваши пожелания, даже самые
                        сложные!</p>
                    <ul class="list-unstyled">
                        <li class="d-flex">
                            <span class="wrap-icon icon-phone mr-3"></span>
                            <span class="text"><a href="tel:84955325529" style="color:white">8 (495) 532-55-29</a></span>
                        </li>
                        <li class="d-flex">
                            <span class="wrap-icon icon-envelope mr-3"></span>
                            <span class="text"><a href="mailto:feeldom@bk.ru" style="color:white">feeldom@bk.ru</a></span>
                        </li>
                        <li class="d-flex">
                            <span class="wrap-icon icon-envelope mr-3"></span>
                            <span class="text"><a href="mailto:feeldom@bk.ru" style="color:white">Москва, Ленинский проспект, дом 4, строение 1А, квартира 10</a></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="popup">
        <div class="popup__block">
            <i class="fa fa-times popup__close" aria-hidden="true"></i>
            <div><p class="popup__text">Успешно!<br> Скоро мы вам позвоним</p></div>
            <i class="fa fa-check-square-o" aria-hidden="true"></i>
        </div>
    </div>
</div>
