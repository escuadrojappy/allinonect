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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function () {
    Route::post('login', 'AuthController@login');
    
    // Verify Password Grant Token
    Route::middleware(['verify.password', 'identify.user'])->group(function () {
        Route::get('/', 'AuthController@index'); 
        Route::get('logout', 'AuthController@logout'); 
        Route::post('registration', 'AuthController@registration');
    });
    Route::post('test', 'AuthController@test');
});

Route::prefix('establishments')->group(function () {
    Route::middleware(['verify.password', 'identify.user'])->group(function () {
        Route::get('/', 'EstablishmentController@index');
        Route::post('search', 'EstablishmentController@search');
        Route::put('{id}', 'EstablishmentController@update');
        Route::delete('{id}', 'EstablishmentController@destroy');

        Route::prefix('visitor')->group(function () {
            Route::post('scan', 'EstablishmentController@scan');
        });
    });
});
Route::apiResource('contact', 'ContactController');
