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
Route::get('/students', 'StudentController@index')->middleware('auth');//->middleware(['lang','timezone']);

Route::get('/students/create', 'StudentController@create')->middleware('lang');
Route::post('/students/store', 'StudentController@store');

Route::get('/students/edit/{id}', 'StudentController@edit');
Route::put('/students/update', 'StudentController@update');

// Route::group(['middleware' => ['lang', 'timezone'] ], function(){
Route::get('/students/drop/{id}', 'StudentController@drop');
Route::get('/students/restore/{id}', 'StudentController@restore');

Route::get('/courses', 'CourseController@index');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
