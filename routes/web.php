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
Route::get('/admin/result', function(){
    return view('pages.result.index');
});

Route::get('/admin/result/{id}/detail', function(){
    return view('pages.result.detail');
});

Route::get('/myevent', 'AmoebaController@myEvent')->name('event');

Route::get('/setting', 'SettingController@index')->name('setting');
Route::post('/setting/profile/update', 'SettingController@updateProfile');
Route::post('/setting/group/update', 'SettingController@updateGroup');
Route::post('/setting/member/add', 'SettingController@addMember');

Route::get('/result', function(){
    return view('result');
});

Route::get('/scoring', function(){
    return view('pages.scoring.index');
});

Route::get('/scoring/description', function(){
    return view('pages.scoring.description');
});

Route::get('/scoring/business', function(){
    return view('pages.scoring.business');
});

Route::get('/scoring/people', function(){
    return view('pages.scoring.people');
});


