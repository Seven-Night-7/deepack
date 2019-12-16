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
Route::post('auths', 'AuthenticationController@store')->name('auths.store');

Route::middleware([
    'refresh.token',
])->group(function () {

    //  测试
//    Route::resource('tests', 'darkos\TestController');

    //  注销登录
    Route::delete('auths', 'AuthenticationController@destroy')->name('auths.destroy');
    //  我的登录信息
    Route::get('auths/me', 'AuthenticationController@me')->name('auths.me');

    //  - 用户
    Route::get('users', 'UserController@index')->name('users.index');
    Route::post('users', 'UserController@store')->name('users.store');

    //  - 冻结的用户
    Route::post('frozen-users/{user}', 'UserController@freeze')->name('frozen-users.store');
    Route::delete('frozen-users/{user}', 'UserController@unfreeze')->name('frozen-users.destroy');

    //  三级目录列表
    Route::get('manuals/dirs', 'darkos\ManualDirController@index')->name('manuals.dirs.index');

    //  - 接口文档
    Route::get('manuals/interfaces', 'darkos\InterfaceManualController@index')->name('manuals.interfaces.index');
    Route::post('manuals/interfaces', 'darkos\InterfaceManualController@store')->name('manuals.interfaces.store');
    Route::get('manuals/interfaces/{interfaceManual}', 'darkos\InterfaceManualController@show')
        ->where('interfaceManual', '[0-9]+')
        ->name('manuals.interfaces.show');
    Route::put('manuals/interfaces/{interfaceManual}', 'darkos\InterfaceManualController@update')
        ->where('interfaceManual', '[0-9]+')
        ->name('manuals.interfaces.update');
    Route::delete('manuals/interfaces/{interfaceManual}', 'darkos\InterfaceManualController@destroy')
        ->where('interfaceManual', '[0-9]+')
        ->name('manuals.interfaces.destroy');

    //  - 接口域名
    Route::get('manuals/interfaces/hosts', 'darkos\InterfaceHostController@index')
        ->name('manuals.interfaces.hosts.index');
    Route::post('manuals/interfaces/hosts', 'darkos\InterfaceHostController@store')
        ->name('manuals.interfaces.hosts.store');
    Route::put('manuals/interfaces/hosts/{interfaceHost}', 'darkos\InterfaceHostController@update')
        ->name('manuals.interfaces.hosts.update');
    Route::delete('manuals/interfaces/hosts/{interfaceHost}', 'darkos\InterfaceHostController@destroy')
        ->name('manuals.interfaces.hosts.destroy');

    //  发送Http请求
    Route::post('manuals/interfaces/https', 'darkos\InterfaceHttpController@store')
        ->name('manuals.interfaces.https.store');
});
