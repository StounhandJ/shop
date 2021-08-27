@extends('layouts/admin-structure')
@section('title')Производители @endsection
@section('content')
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Производители</h1>
        </div>
        <div class="col-auto">
            <button class="btn app-btn-primary add-btn" href="#"><i class="fa fa-plus"
                    style="margin-right:5px;"></i>Создать</button>
        </div>
    </div>
    <div class="row g-4 all-cards">
        @foreach ($paginate as $item)
            <div class="col-6 col-md-4 col-xl-3 col-xxl-3">
                <div class="app-card app-card-doc shadow-sm h-100">
                    <div class="app-card-body p-3">
                        <h4 class="app-doc-title truncate mb-0" title="{{$item->getName()}}"><span>{{$item->getName()}}</span></h4>
                        <input type="text" class="change-input" placeholder="Название производителя">
                        <div class="app-doc-meta">
                            <ul class="list-unstyled mb-0">
                                <li><span class="text-muted">Id:</span> {{$item->getId()}}</li>
                                <li><span class="text-muted">Товаров:</span> {{$item->getProductCount()}}</li>
                            </ul>
                        </div>
                        <button class="change-btn btn btn-primary">Изменить</button>
                        <button class="save-btn btn btn-primary" id="{{$item->getId()}}">Сохранить</button>
                        <button class="delete-btn btn btn-primary"><i class="far fa-trash-alt" style="color: white;"></i></button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @include('inc.pagination')
@endsection
