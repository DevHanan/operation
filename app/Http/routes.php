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
/*
Route::get('pages/change_password',function(){
    return View::make('pages.change_password')->with('token','a5890802dded926bbdc9feb032a6ae5f');
});*/
//**************ChangePassword**************//
Route::get('pages/change_password/{token}',function($token){
    return View::make('pages.change_password')->with('token', $token);
});
Route::post('pages/change_password/{token}','UserController@postChangePassword');
/*
Route::get('pages/change_password',function(){
    return View::make('pages.change_password');
});
Route::post('pages/change_password/','UserController@postChangePassword');
*/
//************UserProfile****************//
//Route::get('pages/user_profile',function(){
//    return View::make('pages.user_profile');
//});
//Route::post('pages/user_profile','UserController@getUserProfile');
Route::get('user_profile', array('uses' => 'UserController@getUserProfile'));

//****************InviteUser******************//
Route::get('pages/invite_user',function(){
    return View::make('pages.invite_user');
});
Route::post('pages/invite_user','UserController@postInviteUser');

//****************getTeamMembers******************//
//Route::get('pages/get_teams',function(){
//    return View::make('pages.get_teams');
//});
Route::get('get_teams', array('uses' =>'UserController@getTeamMembers'));

//****************activate & deactivate User******************//
Route::post('get_teams', array('uses' => 'UserController@userStatues'));
//Route::post('get_teams', array('uses' => 'UserController@deactivateUser'));

//**************** getTeamsInvitedIn ******************//
Route::get('pending_invitations',array('uses' => 'UserController@getTeamsInvitedIn'));

//********************Notification Module************************//
Route::get('notifications/subscription-activated', array('uses' =>'NotificationsController@subscriptionActivated'));
Route::get('notifications/subscription-deactivated', array('uses' =>'NotificationsController@subscriptionDeactivated'));
Route::get('notifications/subscription-changed', array('uses' =>'NotificationsController@subscriptionChanged'));
Route::get('notifications/payment-failed', array('uses' =>'NotificationsController@paymentFailed'));




