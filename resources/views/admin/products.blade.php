@extends('layouts/admin-structure')
@section('title')Продукты @endsection
@section('content')
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Продукты</h1>
        </div>
        <div class="col-auto">
            <div class="page-utilities">
                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                    <div class="col-auto filter">
                        <select class="form-select w-auto">
                            <option selected disabled hidden>Сортировать по</option>
                            <option value="price">Цене</option>
                            <option value="makers">Производителю</option>
                            <option value="category">Категории</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <button class="btn app-btn-primary"><i class="fa fa-plus"
                                style="margin-right:5px;"></i>Создать</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-4">
        @foreach ($paginate as $item)
            <div class="col-6 col-md-4 col-xl-3 col-xxl-3">
                <div class="app-card app-card-doc shadow-sm h-100">
                    <img src="/images/cart/one.png" alt="Изображение продукта">
                    <input type="file" class="add-img-btn">
                    <div class="app-card-body p-3">
                        <h4 class="app-doc-title truncate mb-0"><span>Название товара</span></h4>
                        <div class="app-doc-meta">
                            <ul class="list-unstyled mb-0">
                                <li><span class="text-muted">Категория:</span> <input type="text" class="change-input"></li>
                                <li><span class="text-muted">Производитель:</span> <input type="text" class="change-input">
                                </li>
                                <li><span class="text-muted">Цена:</span> <input type="text" class="change-input"></li>
                            </ul>
                        </div>
                        <button class="change-btn btn btn-primary">Изменить</button>
                        <button class="save-btn btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @include('inc.pagination')
@endsection
