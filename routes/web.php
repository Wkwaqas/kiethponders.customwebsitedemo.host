<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;

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

Route::get('/assign_role',function(){
    $user = \App\Models\Admin::findOrFail(2);
    $user->assignRole('Manager');
    echo "Role Assigned";
});

Auth::routes();

//Route::get('/{any}', [ApplicationController::class, 'index'])->where('any', '.*');

Route::get('/', [App\Http\Controllers\PageController::class, 'index']);
Route::get('/politics', [App\Http\Controllers\PageController::class, 'politics']);
Route::get('/sports', [App\Http\Controllers\PageController::class, 'sports']);
Route::get('/business', [App\Http\Controllers\PageController::class, 'business']);
Route::get('/finance', [App\Http\Controllers\PageController::class, 'finance']);
Route::get('/spirituality', [App\Http\Controllers\PageController::class, 'spirituality']);
Route::get('/blackfamily', [App\Http\Controllers\PageController::class, 'blackfamily']);
Route::get('/education', [App\Http\Controllers\PageController::class, 'education']);
Route::get('/entertainment', [App\Http\Controllers\PageController::class, 'entertainment']);
Route::get('/worldpoverty', [App\Http\Controllers\PageController::class, 'worldpoverty']);
Route::get('/farming', [App\Http\Controllers\PageController::class, 'farming']);
Route::get('/crimereport', [App\Http\Controllers\PageController::class, 'crimereport']);
Route::get('/crypto', [App\Http\Controllers\PageController::class, 'crypto']);
Route::get('/news', [App\Http\Controllers\PageController::class, 'getBusinessNews']);
Route::get('/hero-section', [App\Http\Controllers\PageController::class, 'renderHeroSection'])->name('hero.section');


