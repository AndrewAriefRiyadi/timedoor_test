<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', [BooksController::class,'index'])->name('books');
Route::get('/authors', [AuthorController::class,'index'])->name('authors');
Route::get('/rating', [RatingController::class,'index'])->name('rating');
Route::post('/rating', [RatingController::class,'insert'])->name('rating_insert');
Route::get('/books-by-author/{author}',[RatingController::class,'booksByAuthor'])->name('booksByAuthor');