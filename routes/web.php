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



//CREATE USER
Route::get('/create-user','UserController@create');
Route::post('/create-user','UserController@store');
//VIEW USER
Route::get('/manage-user','UserController@index');
//UPDATE USER
Route::get('/update-user/{id}','UserController@edit');
Route::post('/update-user/{id}','UserController@update');
//DELETE USER
Route::get('/delete-user/{id}','UserController@destroy');

//CREATE FEEDBACK ON DEVELOPMENT
Route::get('/create-feedback','FeedbackController@create');
Route::post('/create-feedback','FeedbackController@store');

//CREATE FIGURE
Route::get('/create-figure','FigureController@create');
Route::post('/create-figure','FigureController@store');
//VIEW FIGURE
Route::get('/manage-figure','FigureController@index');
//UPDATE FIGURE
Route::get('/update-figure/{id}','FigureController@edit');
Route::post('/update-figure/{id}','FigureController@update');
//DELETE FIGURE
Route::get('/delete-figure/{id}','FigureController@destroy');

//CREATE CATEGORY
Route::get('/create-category','CategoryController@create');
Route::post('/create-category','CategoryController@store');
//VIEW CATEGORY
Route::get('/manage-category','CategoryController@index');
//UPDATE CATEGORY
Route::get('/update-category/{id}','CategoryController@edit');
Route::post('/update-category/{id}','CategoryController@update');
//DELETE CATEGORY
Route::get('/delete-category/{id}','CategoryController@destroy');
