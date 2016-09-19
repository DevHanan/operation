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
    return View::make('pages.login');
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


//************ Product ****************//
Route::get ( '/welcome/{id}', function($id){

       $data=DB::table('catogeries')
		      ->join('products','catogeries.id','=','products.cat_id')
		      ->where('catogeries.id',$id)
		      ->get();
		return view ( 'welcome' )->withData ( $data );
});
Route::post ( '/addItem', 'IndexController@addItem' );
Route::post ( '/editItem', 'IndexController@editItem' );
Route::post ( '/deleteItem', 'IndexController@deleteItem' );



//************ catogery ********************//
Route::get ( 'home', 'homeController@readItems' );
Route::post ( '/addCat', 'homeController@addItem' );
Route::post ( '/editCat', 'homeController@editItem' );
Route::post ( '/deleteCat', 'homeController@deleteItem' );

