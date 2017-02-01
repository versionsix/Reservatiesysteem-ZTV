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


//Frontend Routes

Route::get('/', 'FrontendController@ShowHomepage');
Route::get('/contact', 'FrontendController@ShowContactpage');
Route::get('/handleiding', 'FrontendController@ShowHandleidingpage');

//Backend Routes
Route::get('/beheer', 'BackendController@ShowBeheer');

//Test Routes
Route::get('/test', 'TestController@test');
