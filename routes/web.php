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
    Route::group(['middleware'=> 'role:Admin Amoeba'], function(){

        Route::post('/group/{group_id}/approve', 'GroupController@approveGroup');
    });

    Route::group(['prefix' => '/admin'], function(){
        Route::group(['prefix'=> '/user'], function(){
            Route::get('/', 'UserController@showAll');
            Route::get('/add', 'UserController@showInsert');
            Route::post('/add', 'UserController@insert');
            
            Route::get('/{id}/update', 'UserController@showUpdate');
        });
    });
    
    Route::group(['middleware'=> 'role:Amoeba'], function(){
        
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
        
        Route::get('/verification-success', 'VerificationController@viewSuccess');
        
        
        Route::get('/profile', 'AmoebaController@showProfile');
        Route::post('/profile', 'AmoebaController@saveProfile');

        Route::group(['middleware' => 'amoebaverified'], function(){
            // Route::get('/home', 'HomeController@index')->name('home');
            Route::get('/', 'HomeController@index');
        });
        
        
    });

    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
    
    Route::post('/group/store', 'GroupController@store');
});

// Route::post('/login', '\App\Http\Controllers\Auth\LoginController@login');
// Route::get('/login', '\App\Http\Controllers\Auth\LoginController@showLoginForm');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/event', function(){
    return view('event');
});


