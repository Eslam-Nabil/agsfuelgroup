<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\FormsApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')->group(function(){

    Route::post('login', [ApiController::class, 'login']);
    Route::post('register', [ApiController::class, 'register']);
    Route::get('logout', [ApiController::class, 'logout']);

    Route::get('get_categories', [FormsApiController::class, 'get_all_categories']);

    Route::get('get_category_forms/{id?}', [FormsApiController::class, 'get_categories_form']);
    Route::get('get_form_fields/{id?}', [FormsApiController::class, 'get_form_fields']);

});
