<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return View::make('pages.home');
});
//*************SignUp***************//
Route::get('pages/signup',function(){
    return View::make('pages.register');
});
Route::post('pages/signup','UserController@postRegister');
Route::get('logout', array('uses' => 'UserController@logout'));

//*************Login***************//
Route::get('pages/login',function(){
    return View::make('pages.login');
});
Route::post('pages/login','UserController@postLogin');

//**************ForgetPassword**************//
Route::get('pages/forget_password',function(){
    return View::make('pages.forget_password');
});
Route::post('pages/forget_password','UserController@postForgetPassword');

//**************ChangePassword**************//
Route::get('pages/change_password',function(){
    return View::make('pages.change_password');
});
Route::post('pages/change_password','UserController@postChangePassword');

//************UserProfile****************//
Route::get('pages/user_profile',function(){
    return View::make('pages.user_profile');
});
Route::post('pages/user_profile','UserController@getUserProfile');

//****************InviteUser******************//
Route::get('pages/invite_user',function(){
    return View::make('pages.invite_user');
});
Route::post('pages/invite_user','UserController@postInviteUser');