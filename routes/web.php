<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Api\BookApiController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\BookReturnController;
use App\Http\Controllers\DashboardController;

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

Route::resource('book-conditions', \App\Http\Controllers\BookConditionController::class);
Route::resource('members', MemberController::class);
Route::resource('categories', CategoryController::class);
Route::resource('borrowings', BorrowingController::class);
Route::resource('returns', BookReturnController::class)->parameters(['returns' => 'bookReturn']);

Route::get('/api/books', [BookApiController::class, 'index'])->name('api.books');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::redirect('/', '/dashboard');
