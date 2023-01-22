<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthorsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Books routes
Route::get('/books', [BooksController::class, 'showAllBooks']);
Route::get('/books/{id}', [BooksController::class, 'showAUniqueBook']);
Route::post('/books', [BooksController::class, 'createBook']);
Route::put('/books/{id}', [BooksController::class, 'updateBook']);
Route::delete('/books/{id}', [BooksController::class, 'deleteBook']);

// Authors routes
Route::get('/authors', [AuthorsController::class, 'showAllAuthors']);
Route::get('/authors/{id}', [AuthorsController::class, 'showAUniqueAuthor']);
Route::post('/authors', [AuthorsController::class, 'createAuthor']);
Route::put('/authors/{id}', [AuthorsController::class, 'updateAuthor']);
Route::delete('/authors/{id}', [AuthorsController::class, 'deleteAuthor']);
