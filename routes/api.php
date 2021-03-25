<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('products', 'ProductController')
    ->middleware('auth:sanctum');

Route::resource('categories', 'CategoryController')
    ->middleware('auth:sanctum');

Route::post('sanctum/token', 'UserTokenController');

Route::post('/newsletter', 'NewsletterController@send');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('products/{product}/rate', 'ProductRatingController@rate');
    Route::post('products/{product}/unrate', 'ProductRatingController@unrate');
});

Route::get('/server-error', function () {
    abort(500, 'Error 500');
});