<?php

use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware('auth');

Route::get('archived-properties', [PropertyController::class, 'archived'])->name('properties.archived');

Route::resource('properties', PropertyController::class);
