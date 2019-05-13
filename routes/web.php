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
    return view('dashboard.index');
});

Route::get('griddemo', function() {
    return view('grid');
});

Route::get('estimates', 'EstimateController@index');
Route::get('estimates/create', 'EstimateController@create');
Route::get('estimates/{estimate}/edit', 'EstimateController@edit');
Route::get('estimates/{estimate}', 'EstimateController@show');
Route::post('estimates', 'EstimateController@store');
Route::put('estimates/{estimate}', 'EstimateController@update');

Auth::routes();
Route::get('logout', function() {
    Auth::logout();
    return redirect('login');
});

Route::get('/home', 'HomeController@index')->name('home');
