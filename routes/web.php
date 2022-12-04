<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\almsController;
use App\Http\Controllers\adminController;


Route::get('/', [almsController::class, 'index'])->name('home');
Route::get('/create', [almsController::class, 'create']);
Route::post('/create', [almsController::class, 'store']);


Route::get('/login', [adminController::class, 'login'])->name('login');
Route::post('/login', [adminController::class, 'logUser']);

Route::get('/register', [adminController::class, 'register'])->name('register');
Route::post('/register', [adminController::class, 'store']);

Route::get('/show/{id}', [almsController::class, 'show']);

Route::delete('/{id}', [almsController::class, 'destroy'])->name('destroy');
