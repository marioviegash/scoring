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
Route::get('/event', function(){
    return view('event');
});

Route::get('/profile', function(){
    return view('profile');
});

Route::post('/group/store', 'GroupController@store');

Route::get('/group/{group_id}/approve', 'GroupController@approveGroup');

Route::post('/verify/group', 'VerificationController@verifyGroup');
Route::post('/verify/profile', 'VerificationController@verifyProfile');
Route::post('/verify/friend_one', 'VerificationController@inviteFriendOne');
Route::post('/verify/friend_two', 'VerificationController@inviteFriendTwo');

Route::post('/amoeba/store', 'AmoebaController@store');
Route::post('/amoeba/addFriend', 'AmoebaController@inviteFriend');

Route::get('/verification-group', function () {
    return view('register.group');
});

Route::get('/verification-profile', function () {
    return view('register.profile');
});
Route::get('/verification-one', function () {
    return view('register.friend-one');
});

Route::get('/verification-two', function () {
    return view('register.friend-two');
});

Route::get('/verification-success', function () {
    return view('register.sucess');
});