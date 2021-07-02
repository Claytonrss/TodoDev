<?php

use Illuminate\Support\Facades\Route;

Route::apiResource('todos', 'App\Http\Controllers\API\TodoController');