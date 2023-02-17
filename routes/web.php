<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware('auth');

Route::get('archived-properties', [PropertyController::class, 'archived'])->name('properties.archived');

Route::put("properties/{id}/restore", [PropertyController::class, "restore"])->name("properties.restore");

Route::resource("images", ImageController::class);

Route::resource('properties', PropertyController::class);

Route::get("/profile", function () {
    return view("profile");
})->name("users.profile");

Route::put("/users", [UserController::class, "updateUser"])->name("users.update");
