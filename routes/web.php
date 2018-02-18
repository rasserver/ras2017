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

//RAS2017 ROUTES
Route::get('/',
  function () {

  $status = App\Http\Controllers\APIController::getSensorData();

  return view('home')->with('status', $status);
  }
)->name('homepage');

Auth::routes();

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('sensors', 'SensorController');

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

//WMS ROUTES
//SUMMARY

Route::get('wms', 'WMSController@summary')->name('wms.summary');

//CHARTS

Route::get('wms/charts', 'WMSController@chart')->name('wms.charts');

//TABLES

Route::get('wms/tables', 'WMSController@tables')->name('wms.tables');

//DMS ROUTES
Route::get('dms', function () {return view('dms.home');} )->name('dms.home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
