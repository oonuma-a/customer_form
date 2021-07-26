<?php

use Illuminate\Support\Facades\Route;

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
    return view('/form/index');
});
// Route::prefix('countinuous_transition')->group(function(){
    Route::get('/',                                     'App\Http\Controllers\HomeController@index')        ->name('index');
    Route::match(['get', 'post'],   '/form/conf',       'App\Http\Controllers\HomeController@conf')         ->name('conf');
    Route::match(['get','post'],    '/form/password',   'App\Http\Controllers\HomeController@password')     ->name('password');
    Route::post('/form/complete',                       'App\Http\Controllers\HomeController@complete_post')->name('complete');
// });