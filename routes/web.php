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
    Route::group(['middleware'=> 'roles:Admin Amoeba'], function(){
        Route::post('/group/{group_id}/approve', 'GroupController@approveGroup');
    });

    Route::group(['middleware'=> 'role:Amoeba'], function(){
        Route::post('/verify/group', 'VerificationController@verifyGroup');
        Route::post('/verify/profile', 'VerificationController@verifyProfile');
        Route::post('/verify/friend', 'VerificationController@inviteFriend');
        
        Route::post('/amoeba/store', 'AmoebaController@store');
        Route::post('/amoeba/addFriend', 'AmoebaController@inviteFriend');
        
        Route::get('/verification-group', 'VerificationController@viewGroup');
        
        Route::get('/verification-profile', 'VerificationController@viewProfile');
        Route::get('/verification-friend', 'VerificationController@viewFriend');
        
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
    return view('event.index');
});

Route::get('/add-event', function(){
    return view('event.add');
});

Route::get('/friend', function(){
    return view('register.friend');
});




