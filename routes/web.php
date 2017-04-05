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
    return view('TitulPageAngular');
});

Route::post('/find', 'TitulController@find');

Auth::routes();

Route::get('/api/supplier/{id?}', 'SupplierController@index');
Route::post('/api/supplier', 'SupplierController@store');
Route::post('/api/supplier/{id}', 'SupplierController@update');
Route::delete('/api/supplier/{id}', 'SupplierController@destroy');


Route::get('/goods', function () {
    return view('homeAng');
});

////
//Route::get('/home', 'HomeController@index');
////
//Route::get('/add', 'HomeController@add');
////
//Route::post('/home', 'HomeController@find');
//
//Route::post('/add', 'HomeController@create');
//
//Route::post('/update', 'HomeController@update');
//
//Route::post('/delete', 'HomeController@delete');
//
