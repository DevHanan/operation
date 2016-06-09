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
Route::get('pages/change_password/{token}',function($token){
    return View::make('pages.change_password')->with('token', $token);
});
Route::post('pages/change_password/{token}','UserController@postChangePassword');
Route::get('pages/change_my_password',function(){
    return View::make('pages.change_my_password');
});
Route::post('pages/change_my_password/','UserController@postChangeMyPassword');

//************UserProfile****************//
Route::get('user_profile', array('middleware' => 'auth','uses' => 'UserController@getUserProfile'));

//****************InviteUser******************//
Route::get('pages/invite_user',function(){
    return View::make('pages.invite_user');
});
Route::post('pages/invite_user','UserController@postInviteUser');

//****************getTeamMembers******************//
Route::get('get_teams', array('middleware' => 'auth','uses' =>'UserController@getTeamMembers'));

//****************activate & deactivate User******************//
Route::post('test/testStatus', array('middleware' => 'auth','uses' => 'UserController@userStatues'));

//**************** getTeamsInvitedIn ******************//
Route::get('pending_invitations',array('middleware' => 'auth','uses' => 'UserController@getTeamsInvitedIn'));

//********************Notification Module************************//
Route::get('notifications/subscription-activated', array('uses' =>'NotificationsController@subscriptionActivated'));
Route::get('notifications/subscription-deactivated', array('uses' =>'NotificationsController@subscriptionDeactivated'));
Route::get('notifications/subscription-changed', array('uses' =>'NotificationsController@subscriptionChanged'));
Route::get('notifications/payment-failed', array('uses' =>'NotificationsController@paymentFailed'));
Route::post('notifications/subscription-activated', array('uses' =>'NotificationsController@subscriptionActivated'));
Route::post('notifications/subscription-deactivated', array('uses' =>'NotificationsController@subscriptionDeactivated'));
Route::post('notifications/subscription-changed', array('uses' =>'NotificationsController@subscriptionChanged'));
Route::post('notifications/payment-failed', array('uses' =>'NotificationsController@paymentFailed'));



