<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('jobs');
});


Route::group(['prefix' => 'api'], function () {

    Route::get('jobs', 'Api\JobsController@index');

    Route::get('jobs/{job}', 'Api\JobsController@show');

    Route::post('jobs','Api\JobsController@store');

    Route::patch('jobs/{jobs}','Api\JobsController@update');

    Route::delete('jobs/{job}', 'Api\JobsController@delete');
});
