<?php

/**
 * API V1 Routes File
 * call inside api\v1\ controller file
 */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\BookController;
use App\Http\Controllers\api\v1\UserController;


Route::group(['middleware' => 'verifyAPIKey'], function(){
    Route::get('books', [BookController::class, 'index']);
    Route::post('books/store', [BookController::class, 'store']);
    Route::get('books/{book}', [BookController::class, 'show']);
    Route::post('books/{book}/order', [BookController::class, 'order']);

    // Route::prefix('users', function(){
        Route::post('users/login', [UserController::class, 'login']);
    // });

});