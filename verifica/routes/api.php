<?php
use App\Http\Controllers\BookController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\AuthorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//http://localhost:8000/api

//POST http://localhost:8000/api/books
Route::post('/books', [BookController::class, 'create']);
//DELETE http://localhost:8000/api/books/7 
Route::delete('/books/{id}', [BookController::class, 'delete']);
//GET http://localhost:8000/api/books/3
Route::get('/books/{id}', [BookController::class, 'read']);
//GET http://localhost:8000/api/books
Route::get('/books', [BookController::class, 'readAll']);
//PUT http://localhost:8000/api/books/22
Route::put('/books/{id}', [BookController::class, 'update']);


//POST http://localhost:8000/api/editors
Route::post('/editors', [EditorController::class, 'create']);
//DELETE http://localhost:8000/api/editors/7 
Route::delete('/editors/{id}', [EditorController::class, 'delete']);
//GET http://localhost:8000/api/editors/3
Route::get('/editors/{id}', [EditorController::class, 'read']);
//GET http://localhost:8000/api/editors
Route::get('/editors', [EditorController::class, 'readAll']);
//PUT http://localhost:8000/api/editors/22
Route::put('/editors/{id}', [EditorController::class, 'update']);

//POST http://localhost:8000/api/authors
Route::post('/authors', [AuthorController::class, 'create']);
//DELETE http://localhost:8000/api/authors/7 
Route::delete('/authors/{id}', [AuthorController::class, 'delete']);
//GET http://localhost:8000/api/authors/3
Route::get('/authors/{id}', [AuthorController::class, 'read']);
//GET http://localhost:8000/api/authors
Route::get('/authors', [AuthorController::class, 'readAll']);
//PUT http://localhost:8000/api/authors/22
Route::put('/authors/{id}', [AuthorController::class, 'update']);
