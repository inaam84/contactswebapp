<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return redirect('/contacts');
})->name('home');




Route::resource('contacts', ContactController::class);
