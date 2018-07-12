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
























































































// 后台登陆路由
Route::resource('/admin/login','Admin\LoginController');
// 后台登录验证
Route::post('admin/dologin','Admin\LoginController@dologin');
// 后台用户注册
Route::resource('/admin/register','Admin\LoginController');

Route::group(['middleware'=>'admin.login'], function(){

// 后台首页路由
Route::get('/admin','Admin\IndexController@index');
// 后台用户信息
Route::resource('/admin/user','Admin\UserController');
// 修改用户信息页
Route::get('/admin/info','Admin\IndexController@info');
// 保存用户修改信息
Route::post('/admin/doinfo','Admin\IndexController@doinfo');
//修改密码
Route::get('/admin/pass','Admin\IndexController@pass');
//修改密码
Route::post('/admin/dopass','Admin\IndexController@dopass');
//退出登录
Route::get('/admin/quit','Admin\IndexController@quit');

});
























































































































