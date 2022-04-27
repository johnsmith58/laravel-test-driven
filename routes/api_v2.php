<?php

/**
 * API V1 Routes File
 * call inside api\v2\ controller file
 */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v2\BookController;

Route::get('books', [BookController::class, 'index']);