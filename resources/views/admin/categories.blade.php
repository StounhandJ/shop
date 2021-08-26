@extends('layouts/admin-structure')
@section('title')Категории @endsection
@section('content')
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Категории</h1>
        </div>
    </div>
    <div class="row g-4">
        @foreach ($paginate as $item)
            <div class="col-6 col-md-4 col-xl-3 col-xxl-3">
                <div class="app-card app-card-doc shadow-sm h-100">
                    <div class="app-card-body p-3">
                        <h4 class="app-doc-title truncate mb-0"><span>Название категории</span></h4>
                        <input type="text" class="change-input" placeholder="Название категории">
                        <div class="app-doc-meta">
                            <ul class="list-unstyled mb-0">
                                <li><span class="text-muted">Товаров:</span></li>
                            </ul>
                        </div>
                        <span class="change-btn btn btn-primary">Изменить</span>
                        <span class="save-btn btn btn-primary">Сохранить</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @include('inc.pagination')
@endsection
