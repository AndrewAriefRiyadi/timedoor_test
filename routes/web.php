<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', [BooksController::class,'index'])->name('books');
Route::get('/authors', [AuthorController::class,'index'])->name('authors');
