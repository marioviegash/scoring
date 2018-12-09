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
        Route::get('/home', 'HomeController@index')->name('home');

        Route::group(['prefix' => '/admin'], function(){
            Route::group(['prefix'=> '/user'], function(){
                Route::get('/', 'UserController@showAll');
                Route::get('/add', 'UserController@showInsert');
                Route::post('/add', 'UserController@insert');
                
                Route::get('/{id}/update', 'UserController@showUpdate');
                Route::post('/{id}/update', 'UserController@update');
            });
        });
    
        Route::group(['prefix' => '/admin'], function(){
            Route::group(['prefix'=> '/event'], function(){
                Route::get('/', 'EventController@showAll');
                Route::get('/add', 'EventController@showInsert');
                Route::post('/add', 'EventController@insert');

                Route::get('/{id}/update', 'EventController@showUpdate');
                Route::post('/{id}/update', 'EventController@update');
                Route::post('/{id}/delete', 'EventController@delete');
            });
        });

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
    });

    
    Route::group(['middleware' => 'amoebaverified'], function(){
        Route::get('/', 'HomeController@index');
        Route::get('/home', 'HomeController@index')->name('home');
    });

    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Route::post('/group/store', 'GroupController@store');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');




