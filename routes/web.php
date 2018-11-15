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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
<<<<<<< HEAD

Route::post('/group/store', 'GroupController@store');
Route::post('/amoeba/store', 'AmoebaController@store');
Route::post('/amoeba/addFriend', 'AmoebaController@inviteFriend');
=======
Route::get('/verification-group', function () {
    return view('register.group');
});
>>>>>>> ef53c6c2a6fed8cccc5d157e5849cf57c1650b71
