<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProductController;


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::group([
    'middleware' => ["auth:api"],
    'prefix' => 'auth'
], function() {  
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
    Route::post('/add-category', [CategoryController::class, 'addCategory']);    
    Route::get('/all-categories', [CategoryController::class, 'allCategories']);    
    Route::post('/add-sub-category', [CategoryController::class, 'addSubCategories']);    
    Route::post('/add-location', [LocationController::class, 'addLocation']);    
    Route::post('/add-item', [ItemController::class, 'addItem']);    
    Route::get('/all-item', [ItemController::class, 'allItem']);    
    Route::post('/add-file', [FileController::class, 'addFile']);    
    Route::post('/add-product', [ProductController::class, 'addProduct']);    
});
