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




// 后台首页路由
Route::get('/admin','Admin\IndexController@index');

// 后台用户管理路由
Route::resource('/admin/user','Admin\UserController');

// 后台分类管理路由
Route::resource('/admin/cates','Admin\CatesController');





























































































































































































// 前台首页路由
Route::resource('/','Home\HomepageController');

// 轮播图主页路由
Route::resource('/shuffling','Admin\ShufflingController');
// 轮播回收站页面
Route::controller('/shuffling/delete','Admin\ShufflingController');

// 推荐位路由
Route::resource('/recom','Admin\RecomController');
// 推荐位回收站页面
Route::controller('/recom/delete','Admin\RecomController');
// 推荐位彻底删除路由
Route::get('/recom/cheshan/{id}','Admin\RecomController@cheshan');

//网站配置路由
Route::resource('/config','Admin\ConfigController');
// 网站配置回收站页面
Route::controller('/config/delete','Admin\ConfigController');










