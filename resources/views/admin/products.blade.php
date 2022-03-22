@extends('layouts/admin-structure')
@section('title')
    Продукты
@endsection
@section('content')
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Продукты</h1>
        </div>
        <div class="col-auto">
            <div class="page-utilities">
                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                    {{-- <div class="col-auto filter">
                        <select class="form-select w-auto">
                            <option selected disabled hidden>Сортировать по</option>
                            <option value="price">Цене</option>
                            <option value="makers">Производителю</option>
                            <option value="category">Категории</option>
                            <option value="department">Отделу</option>
                        </select>
                    </div> --}}
                    <div class="col-auto">
                        <button class="btn app-btn-primary add-btn add-btn-products"><i class="fa fa-plus"
                                style="margin-right:5px;"></i>Создать</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-4 all-cards">
        @foreach ($paginate as $item)
            <div class="col-6 col-md-4 col-xl-3 col-xxl-3">
                <div class="app-card app-card-doc shadow-sm h-100">
                    <img src="{{ $item->getImgSrc() }}" class="admin-product-img">
                    <div class="app-card-body p-3">
                        <input type="file" class="add-img-btn">
                        <h4 class="app-doc-title truncate mb-0" title="{{ $item->getTitle() }}">
                            <span>{{ $item->getTitle() }}</span>
                        </h4>
                        <input type="text" name="name" class="change-input" placeholder="Название товара"
                            value="{{ $item->getTitle() }}">
                        <div class="app-doc-meta">
                            <ul class="list-unstyled mb-0">
                                <li><span class="text-muted">Id:</span> {{ $item->getId() }}</li>
                                <li><span class="text-muted department-name">Отдел:</span>
                                    {{ $item->getCategory()->getDepartment()->getName() }}</li>
                                <li class="category-text"><span class="text-muted">Категория:
                                    </span>{{ $item->getCategory()->getName() }}</li>
                                <select class="change-list-category" id="{{ $item->getCategory()->getId() }}"></select>
                                <li class="maker-text"><span class="text-muted">Производитель:</span>
                                    {{ $item->getMaker()->getName() }}
                                </li>
                                <select class="change-list-maker" id="{{ $item->getMaker()->getId() }}"></select>
                                <li class="product-price"><span class="text-muted">Цена:
                                    </span>{{ $item->getPrice() }} руб.</li>
                                <input type="text" name="price" class="change-input-price" placeholder="Цена товара"
                                    value="{{ $item->getPrice() }}">
                                <li class="product-dcp-text"><span class="text-muted">Описание:</span>
                                    {{ $item->getDescription() }}
                                </li>
                                <textarea name="product-dcp" class="product-dcp">{{ $item->getDescription() }}</textarea>
                            </ul>
                        </div>
                        <button class="change-btn change-btn-products btn btn-primary">Изменить</button>
                        <button class="save-btn save-btn-products btn btn-primary"
                            id="{{ $item->getId() }}">Сохранить</button>
                        <button class="delete-btn btn btn-primary" path="product"><i class="far fa-trash-alt"
                                style="color: white;"></i></button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @include('inc.pagination')
@endsection
