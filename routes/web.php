<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', \App\Livewire\Login::class)
    ->name('login')
    ->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::redirect('/dashboard', '/deployments')->name('home');
    Route::get('/deployments', \App\Livewire\Deployments::class)->name('deployments');
});
