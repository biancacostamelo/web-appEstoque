<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\estoqueFront;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [estoqueFront::class, 'index'])->name('estoque.index');
Route::get('/create', [estoqueFront::class, 'create'])->name('estoque.create');
Route::post('/store', [estoqueFront::class, 'store'])->name('estoque.store');
Route::get('/edit/{id}', [estoqueFront::class, 'edit'])->name('estoque.edit');
Route::post('/update/{id}', [estoqueFront::class, 'update'])->name('estoque.update');
Route::get('/delete/{id}', [estoqueFront::class, 'destroy'])->name('estoque.destroy');
