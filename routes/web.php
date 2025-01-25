<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/sign-in', \App\Livewire\SignIn::class)
    ->name('sign-in')
    ->middleware('guest');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', \App\Livewire\Dashboard::class)->name('home');
});
