<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('registration');
})->name('registration');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/auth/google', function () {
})->name('auth.google');
