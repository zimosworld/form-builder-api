<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'v1', 'namespace' => '\App\Api\V1\Controllers'], function () {
    Route::resource('form', 'FormController');

    Route::prefix('form/{form}')->group(function () {
       Route::resource('field', 'FormFieldController');
    });
});
