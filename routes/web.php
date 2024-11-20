<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

route::get('/', [UserController::class, 'index'])->name('ereporthub.index');

route::get('/register', [UserController::class, 'formRegister'])->name('ereporthub.formRegister');