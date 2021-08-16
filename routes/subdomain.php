<?php


use App\Http\Controllers\SubdomainController;
use Illuminate\Support\Facades\Route;

Route::get('/subdomain/create', [SubdomainController::class, 'create'])
    ->middleware('auth')
    ->name('verification.notice');
