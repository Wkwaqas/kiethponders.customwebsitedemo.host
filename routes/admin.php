<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ApplicationController;

/*
|---------------------------------------R-----------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group([
    'namespace' => 'Admin\Auth',
], function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login_page');
//    Route::get('register', 'RegisterController@showRegistrationForm')->name('register_page');
    Route::post('login', 'LoginController@login')->name('login');
//    Route::post('register', 'RegisterController@register')->name('register');
    Route::get('logout', 'LoginController@logout')->name('logout');
});

Route::group([
    'middleware' => [
        'auth:admin'
    ],
], function () {
    Route::group(['prefix' => 'api'], function () {
        Route::resource('menus', MenuController::class);
        Route::resource('users',Admin\AdminController::class);
        Route::get('/get_roles',[\App\Http\Controllers\PermissionController::class,'get_roles']);
        Route::post('/assign_user_role',[\App\Http\Controllers\PermissionController::class,'update_admin_roles']);

        Route::resource('role_permission', PermissionController::class);

    });
    Route::namespace('Admin')->group(function () {
        Route::get('{vue?}', [ApplicationController::class, 'index'])->where('vue', '[\/\w\.-]*')->name('dashboard');
    });
});

