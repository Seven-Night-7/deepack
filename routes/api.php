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

//  登录
Route::post('auths', 'AuthenticationController@store');

Route::middleware([
    'refresh.token',
])->group(function () {
    //  注销登录
    Route::delete('auths', 'AuthenticationController@destroy');
    //  我的登录信息
    Route::get('auths/me', 'AuthenticationController@me');

    //  - 用户
    Route::get('users', 'UserController@index');
    Route::post('users', 'UserController@store');

    //  - 冻结的用户
    Route::post('frozen-users/{user}', 'UserController@freeze');
    Route::delete('frozen-users/{user}', 'UserController@unfreeze');

    //  三级目录列表
    Route::get('manuals/dirs', 'darkos\ManualDirController@index');

    //  - 接口文档
    Route::get('manuals/interfaces', 'darkos\InterfaceManualController@index');
    Route::get('manuals/interfaces/{interfaceManual}', 'darkos\InterfaceManualController@show')
        ->where('interfaceManual', '[0-9]+');
    Route::post('manuals/interfaces', 'darkos\InterfaceManualController@store');
    Route::put('manuals/interfaces/{interfaceManual}', 'darkos\InterfaceManualController@update')
        ->where('interfaceManual', '[0-9]+');
    Route::delete('manuals/interfaces/{interfaceManual}', 'darkos\InterfaceManualController@destroy')
        ->where('interfaceManual', '[0-9]+');

    //  - 接口域名
    Route::get('manuals/interfaces/hosts', 'darkos\InterfaceHostController@index');
    Route::post('manuals/interfaces/hosts', 'darkos\InterfaceHostController@store');
    Route::put('manuals/interfaces/hosts/{interfaceHost}', 'darkos\InterfaceHostController@update');
    Route::delete('manuals/interfaces/hosts/{interfaceHost}', 'darkos\InterfaceHostController@destroy');
});
