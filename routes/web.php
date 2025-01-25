<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sign-in', \App\Livewire\SignIn::class)
    ->name('sign-in')
    ->middleware('guest');
