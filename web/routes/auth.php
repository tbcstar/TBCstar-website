<?php

use Illuminate\Support\Facades\Route;

Route::get('/shadowlands', function () {
    return view('shadowlands');
})->name('shadowlands');
