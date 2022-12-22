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
    });
    Route::post('test', 'AuthController@test');
});

Route::prefix('establishments')->group(function () {
    Route::middleware(['verify.password', 'identify.user'])->group(function () {

        Route::prefix('contact-tracing')->group(function () {
            Route::post('/', 'EstablishmentController@contactTracing');
            Route::post('report', 'EstablishmentController@generateContactTracingReport');
        });

        Route::prefix('visitor')->group(function () {
            Route::post('scan', 'EstablishmentController@scan');
        });
    
    });
});

Route::prefix('admin')->group(function () {
    Route::middleware(['verify.password', 'identify.user'])->group(function () {

        Route::prefix('establishment')->group(function () {
            Route::get('/', 'AdminController@getEstablishment');
            Route::post('/', 'AdminController@registrationEstablishment');

            Route::post('search', 'AdminController@searchEstablishment');

            Route::put('{id}', 'AdminController@updateEstablishment');
            Route::delete('{id}', 'AdminController@destroyEstablishment');
        });
        
        Route::prefix('contact-tracing')->group(function () {
            Route::post('/', 'AdminController@contactTracing');
            Route::post('report', 'AdminController@generateContactTracingReport');
        });

        Route::prefix('visitor')->group(function () {
            Route::post('search', 'VisitorController@search');

            Route::post('/', 'AdminController@createVisitor');
            Route::post('/qrcode', 'AdminController@createVisitorByQrCode');

            Route::put('{id}', 'AdminController@updateVisitor');
            Route::delete('{id}', 'AdminController@destroyVisitor');
        });

        
    });
});

Route::apiResource('contact', 'ContactController');
