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
        Route::post('/group/{group_id}/reject', 'GroupController@rejectGroup');
        Route::post('/group/{group_id}/delete', 'GroupController@deleteGroup');
        Route::get('/home', 'HomeController@index')->name('home');

        Route::group(['prefix' => '/admin'], function(){

            Route::post('/ama/add', 'AdminAmoebaController@add');
            Route::post('/jury/add', 'JuryController@add');
            

            Route::group(['prefix'=> '/user'], function(){
                Route::get('/', 'UserController@showAll')->name('admin_user');
                Route::get('/{role}/add', 'UserController@showInsert');
                Route::post('/add', 'UserController@insert');

                Route::post('/{id}/delete', 'UserController@update');
            });
        });
    
        Route::group(['prefix' => '/admin'], function(){
            Route::group(['prefix'=> '/event'], function(){
                Route::get('/', 'EventController@showAll')->name('event');
                Route::get('/add', 'EventController@showInsert')->name('event');
                Route::post('/add', 'EventController@insert');

                Route::post('/jury/delete', 'EventController@deleteJury');
                Route::post('/jury/add', 'EventController@addJuries');
                Route::get('/{id}/group', 'EventController@showGroup')->name('event');
                Route::get('/{id}/detail', 'EventController@showDetail')->name('event');
                Route::get('/{id}/update', 'EventController@showUpdate')->name('event');
                Route::post('/{id}/update', 'EventController@update');
                Route::get('/{id}/delete', 'EventController@delete');
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
      

    });
    
    Route::get('/profile', 'AmoebaController@showProfile');
    Route::post('/profile', 'AmoebaController@saveProfile');  
    Route::post('/profile/admin_amoeba', 'AdminAmoebaController@saveProfile');  
    Route::post('/profile/jury', 'JuryController@saveProfile');  

    Route::get('/admin/document', 'DocumentController@showAll')->name('admin_document');

    Route::get('/admin/document/{id}/detail', 'DocumentController@showDetail')->name('admin_document');
    Route::post('/admin/document/review/{id}', 'DocumentController@reveiwDocument');
    Route::post('/admin/document/approve/{id}', 'DocumentController@approveDocument');

    Route::get('/admin/document/{id}/forum', 'ForumController@index')->name('admin_document');
    
    Route::group(['middleware' => ['amoebaverified', 'juryverified', 'amaverified']]   , function(){
        Route::get('/', 'HomeController@index');
        Route::get('/home', 'HomeController@index')->name('home');
    });

    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Route::get('/group', 'GroupController@index')->name('group');
    Route::post('/group/store', 'GroupController@store');

    Route::get('/document', 'DocumentController@index')->name('document');
    Route::get('/forum/{id}', 'ForumController@index');
    Route::post('forum/post', 'ForumController@post');

    Route::post('file/upload', 'FileController@upload');
    Route::get('file/download', 'FileController@download');

    Route::get('/judgement', 'JudgementController@index');
    Route::get('/judgement/team', function(){
        return view('pages.judgement.detail');
    });
});

Auth::routes();
Route::get('/admin/result', 'EventController@showEventRun')->name('result');

Route::get('/admin/result/{id}/detail', 'EventController@showResultDetail')->name('result');

Route::get('/myevent', 'AmoebaController@myEvent')->name('event');

Route::get('/setting', 'SettingController@index')->name('setting');
Route::post('/setting/profile/update', 'SettingController@updateProfile');
Route::post('/setting/group/update', 'SettingController@updateGroup');
Route::post('/setting/member/add', 'SettingController@addMember');

Route::get('/result', 'ScoreController@showResult');

Route::get('/scoring', 'ScoreController@showGroup');

Route::get('/scoring/description', 'ScoreController@showGroupDetail');

Route::get('/scoring/business/{id}', 'ScoreController@bisnis');
Route::post('/scoring/group', 'ScoreController@scoreToGroup');
Route::post('/scoring', 'ScoreController@scoreToAmoebas');

Route::get('/scoring/people/{id}', 'ScoreController@people');

Route::post('/graph/upload/group', 'GraphController@uploadGroup');
Route::post('/graph/upload', 'GraphController@upload');


