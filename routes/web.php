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
//
//Route::get('/', function () {
//    return view('welcome');
//});


Route::any('/', ['uses' => 'PortalController@index', 'name' => 'home']);
Route::any('/wow', ['uses' => 'WoWController@index', 'name' => 'home']);
Route::any('/wow/register', ['uses' => 'WoWController@register', 'name' => 'wow-register']);