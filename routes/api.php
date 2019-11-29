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

Route::get('manual/dirs', 'darkos\ManualDirController@index');

Route::get('manual/interfaces', 'darkos\InterfaceManualController@index');
Route::get('manual/interfaces/{interfaceManual}', 'darkos\InterfaceManualController@show');
Route::post('manual/interfaces', 'darkos\InterfaceManualController@store');
Route::put('manual/interfaces/{interfaceManual}', 'darkos\InterfaceManualController@update');
Route::delete('manual/interfaces/{interfaceManual}', 'darkos\InterfaceManualController@destroy');

//  登录
Route::post('login', 'AuthenticationController@store');
//  注销登录
Route::delete('logout', 'AuthenticationController@destroy');

Route::middleware('refresh.token')->group(function () {
    //  我的登录信息
    Route::get('users/me', 'UserController@me');
});
