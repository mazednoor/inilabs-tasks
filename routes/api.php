<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('todos', [TodoController::class, 'index']);
Route::post('store-todo', [TodoController::class, 'store']);
Route::post('delete-todo', [TodoController::class, 'delete']);
Route::post('complete-todo', [TodoController::class, 'complete']);
Route::post('uncomplete-todo', [TodoController::class, 'uncomplete']);
Route::post('update-todo', [TodoController::class, 'update']);