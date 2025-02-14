<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/contacts');
})->name('home');

Route::resource('contacts', ContactController::class);
