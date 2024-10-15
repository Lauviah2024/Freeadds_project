<?php

use App\Http\Controllers\AdsController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::resource('ads', AdsController::class);

    // returning the home page with all categories
    Route::get('/Categories', CategorieController::class . '@index')->name('categorie.index');
    Route::get('/Categories/create', CategorieController::class . '@create')->name('categories.create');
    Route::get('/Categories', CategorieController::class . '@store')->name('categories.store');
    Route::post('/Categories/{categorie}/show', CategorieController::class . '@show')->name('categories.show');
    Route::get('Categories/{categorie}/edit', CategorieController::class . '@edit')->name('categories.edit');
    Route::put('/Categories/{categorie}', CategorieController::class . '@update')->name('categorie.update');
    Route::delete('Categories/{categorie}', CategorieController::class . '@destroy')->name('categories.destroy');

    // Profile
    Route::get('/profile', ProfileController::class . '@edit')->name('profile.edit');
    Route::put('/profile', ProfileController::class . '@updatePersonnal')->name('profile.updatePersonnal');
    Route::put('/profile/password', ProfileController::class . '@updatePassword')->name('profile.updatePassword');
    Route::delete('/profile', ProfileController::class . '@destroy')->name('profile.destroy');
});
