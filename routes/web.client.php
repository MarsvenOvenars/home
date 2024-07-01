<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('', [IndexController::class, 'index'])->name('home');

Route::controller(HomeController::class)
    ->prefix('homes')
    ->name('homes.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show')->where('id', '[0-9]+');
    });
