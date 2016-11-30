<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


// Auth::loginUsingId(30);

// Auth::routes();

Route::get('/','WelcomeController@index');

Route::post('/','WelcomeController@contact');



Route::get('/profile_admin','ProfileController@profile_admin');

//個人資料更新

Route::get('/profile_admin/update_admin', 'ProfileController@Update_admin');

Route::post('/profile_admin/update_admin', 'ProfileController@store_admin');

//密碼更新
Route::get('/profile_admin/reset_admin', 'ProfileController@password_admin');

Route::post('/profile_admin/reset_admin', 'ProfileController@passwordupdate_admin');



Route::get('/home', 'HomeController@index');

// Route::get('/dashboard', 'DashboardController@index');
Route::get('/anno', ['middleware'=>'auth', 'uses'=>'AnnouncementController@api']);


Route::post('/home', 'MessageController@create');

Route::get('/announcement', 'AnnouncementController@index');

Route::post('/announcement', 'AnnouncementController@create');

Route::get('/announcement/delect/{id}','AnnouncementController@destroy');

Route::get('/announcement/{id}','AnnouncementController@edit');

Route::post('/announcement/{id}','AnnouncementController@AnnoUpdate');


// Route::get('/dashboard', 'HomeController@index');

// // Route::get('/auth/facebook', 'LoginController@loginWithFacebook');
// Route::get('/auth/facebook', 'FacebookController@redirectToProvider');
//
// Route::post('/auth/facebook', 'FacebookController@handleProviderCallback');
Route::get('/profile', 'ProfileController@index');

Route::get('/profile/user/{id}', 'ProfileController@content');

// Route::get('/facebook/link', function() {
//  return Socialite::driver('facebook')
//             ->scopes(['email'])->redirect();
// });

//新增管理者
Route::get('/user', 'UserController@index');
Route::post('/user', 'UserController@create');

//刪除使用者
Route::get('/user/delect/{id}', 'UserController@destroy');

Route::get('/profile/delect/{id}', 'ProfileController@destroy');

Route::get('/profile/update/{id}', 'ProfileController@update');

//文章編輯
Route::get('/profile/edit/{id}', 'ProfileController@edit');

Route::post('/profile/edit/{id}', 'ProfileController@MessageUpdate');

//個人資料更新

Route::get('/profile/update', 'ProfileController@ProfileUpdate');

Route::post('/profile/update', 'ProfileController@store');

//密碼更新
Route::get('/profile/reset', 'ProfileController@password');

Route::post('/profile/reset', 'ProfileController@passwordupdate');

//公告欄
// Route::post('/password/reset','Auth/ResetPasswordController@reset');

// //取消授權回要返回的網址
// Route::get('/facebook/callback', function() {
//  $user = Socialite::driver('facebook')->user();
//  var_dump($user);
// });
