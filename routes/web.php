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

Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
    Route::post('/group/store', 'GroupController@store');

    Route::post('/group/{group_id}/approve', 'GroupController@approveGroup');
    
    Route::post('/verify/group', 'VerificationController@verifyGroup');
    Route::post('/verify/profile', 'VerificationController@verifyProfile');
    Route::post('/verify/friend_one', 'VerificationController@inviteFriendOne');
    Route::post('/verify/friend_two', 'VerificationController@inviteFriendTwo');
    
    Route::post('/amoeba/store', 'AmoebaController@store');
    Route::post('/amoeba/addFriend', 'AmoebaController@inviteFriend');
    
    Route::get('/verification-group', 'VerificationController@viewGroup');
    
    Route::get('/verification-profile', 'VerificationController@viewProfile');
    Route::get('/verification-one', 'VerificationController@viewFriendOne');
    
    Route::get('/verification-two', 'VerificationController@viewFriendTwo');
    
    Route::get('/verification-success', function () {
        return view('register.success');
    });
    // Route::get('/', function () {
    //     return view('home');
    // });
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    
});

// Route::post('/login', '\App\Http\Controllers\Auth\LoginController@login');
// Route::get('/login', '\App\Http\Controllers\Auth\LoginController@showLoginForm');
Auth::routes();


