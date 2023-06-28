<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [
    \App\Http\Controllers\HomeController::class,
'home'
]);

Route::get('/reviews', [
    \App\Http\Controllers\ReviewController::class,
'index'
]);

Route::get('/reviews/delete/{id}', [
    \App\Http\Controllers\ReviewController::class,
'delete'
]);

Route::get('/reviews/create', [
    \App\Http\Controllers\ReviewController::class,
'create'
]);

Route::post('/reviews/create', [
    \App\Http\Controllers\ReviewController::class,
'save'
]);

Route::get('/reviews/edit/{id}', [
    \App\Http\Controllers\ReviewController::class,
'edit'
]);

Route::post('/reviews/edit/{id}', [
\App\Http\Controllers\ReviewController::class,
'update'
]);
