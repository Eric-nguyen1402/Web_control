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
    return view('welcome');
});

Route::get('/eric', 'EricController@index')->name('eric');

Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/maps', 'MapController@index')->name('maps');

Route::get('/controller/camera_up','camera_control@up_camera');
Route::get('/controller/tank','camera_control@tank_control');
Route::get('/controller/update_led','camera_control@update_led');
Route::get('/controller/updatetime','camera_control@updatetime');
Route::get('/controller/updatetime_1s','camera_control@updatetime_1s');
Route::get('/controller/updatestate','camera_control@updatestate');
Route::get('/controller/updatelogin','camera_control@updatelogin');
Route::get('/controller/requests_permisstion','camera_control@requests_permisstion');
Route::get('/controller/request_permission','camera_control@request_permission');
Route::get('/controller/update_gy25','camera_control@update_gy25');


// CHART
Route::get('/controller/update_dataxyz','dataxyz@update_dataxyz');
Route::get('/controller/update_datamap','datamap@update_datamap');
Route::get('/controller/update_level','datamap@update_level');



// map
//Route::get('/map/update_datamap','datamap@update_datamap');
Route::get('/map/findrecord','MapController@findrecord');
Route::get('/map/mylocation','MapController@mylocation');
Route::get('/map/recordcontrol','MapController@recordcontrol');

Auth::routes();

