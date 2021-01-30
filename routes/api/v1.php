<?php

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
 */

Route::group(['namespace' => 'Api'], function () {
    Route::group(['prefix' => 'flights', 'namespace' => 'Flights'], function () {
        Route::group(['namespace' => 'Flight'], function () {
            Route::get('/', [\App\Http\Controllers\V1\Api\Flights\Flight\FlightController::class, 'find'])->name('api.flights.flight.find');
        });
    });
});
