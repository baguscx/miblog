<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', [PostController::class, 'index']);
Route::get('/post/new', [PostController::class, 'create']);
Route::post('/post/new', [PostController::class, 'store']);
Route::get('/post/{id}/edit', [PostController::class, 'edit']);
Route::patch('/post/{id}/edit', [PostController::class, 'update']);
Route::get('/post/{id}', [PostController::class, 'show']);
Route::delete('/post/{id}', [PostController::class, 'destroy']);
