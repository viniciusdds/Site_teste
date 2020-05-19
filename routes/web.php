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
    return view('welcome');
});

Route::get('/admin', function () {
    return view('backend/layouts/main');
});

Auth::routes(['register'=>false]);

Route::get('/home', 'Home\HomeController@index')->name('home');

Route::resource('/admin/personalcontact', 'PersonalContactController');

Route::resource('/admin/users', 'UserController');

Route::resource('/admin/product', 'ProductController');

Route::get('image/upload','ImageUploadController@fileCreate')->name('image/upload');
Route::post('image/upload/store','ImageUploadController@fileStore')->name('image/upload/store');
Route::post('image/delete','ImageUploadController@fileDestroy')->name('image/delete');
Route::get('image/modal/{id}','ImageUploadController@fileModal')->name('image/modal');

Route::get('graph/index', 'GraphController@index')->name('graph.index');


