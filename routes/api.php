<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Semua endpoint diakses aplikasi Flutter via http://<ip-lokal>:8000/api
Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::get('/tasks/{id}', [TaskController::class, 'show']);
Route::put('/tasks/{id}', [TaskController::class, 'update']);
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
