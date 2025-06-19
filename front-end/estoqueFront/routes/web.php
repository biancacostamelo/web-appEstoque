<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\estoqueFront;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [AuthController::class, 'showLogin'])->name('estoque.login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware(['firebase'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/home', [estoqueFront::class, 'index'])->name('estoque.index');
Route::get('/create', [estoqueFront::class, 'create'])->name('estoque.create');
Route::post('/store', [estoqueFront::class, 'store'])->name('estoque.store');
Route::get('/edit/{id}', [estoqueFront::class, 'edit'])->name('estoque.edit');
Route::post('/update/{id}', [estoqueFront::class, 'update'])->name('estoque.update');
Route::get('/delete/{id}', [estoqueFront::class, 'destroy'])->name('estoque.destroy');
