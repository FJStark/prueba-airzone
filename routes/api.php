<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('categories', CategoryController::class);

Route::get('activityPost/{id}', [PostController::class, 'postActivity']);
