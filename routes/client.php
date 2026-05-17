<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ApplicationController;
use App\Http\Controllers\MenuController;

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

Route::group(['namespace' => 'Client'],function(){
    Auth::routes(['verify' => true]);
});

Route::group([
    'namespace' => 'Client\Auth',
], function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login_page');
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register_page');
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('register', 'RegisterController@register')->name('register');
    Route::get('logout', 'LoginController@logout')->name('logout');
});

Route::group([
    'middleware' => [
        'auth:client',
//        'verified:client.verification.notice',
    ],
], function () {
    Route::group(['prefix' => 'api'], function () {
        Route::get('menus', [MenuController::class, 'index']);
    });
    Route::namespace('Client')->group(function () {
        Route::get('{vue?}', [ApplicationController::class, 'index'])->where('vue', '[\/\w\.-]*')->name('dashboard');
    });
});
