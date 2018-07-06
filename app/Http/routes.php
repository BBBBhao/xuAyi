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
<<<<<<< HEAD
=======
Route::get('/', function () {
	echo 'BBBBhao';
    return view('welcome');
});
>>>>>>> origin/dwz



















































































<<<<<<< HEAD









































































































Route::resource('/','Home\HomepageController');
Route::get('/register','Home\HomepageController@register');
Route::get('/personalcenter','Home\HomepageController@personalcenter');







=======
Route::resource('/admin','Admin\IndexController');
>>>>>>> origin/dwz

