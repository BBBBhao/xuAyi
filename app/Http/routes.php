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

// 后台商品管理
Route::resource('/admin/goods','Admin\GoodsController');

// 后台商品管理列表删除
Route::controller('/admin/goods/del','Admin\GoodsController');

// 后台商品详情
Route::resource('/admin/goodsdetails','Admin\GoodsDetailsController');

// 后台商品图片表
Route::resource('/admin/goodsimages','Admin\GoodsImagesController');






























































































































































































Route::resource('/','Home\HomepageController');
Route::get('/register','Home\HomepageController@register');
Route::get('/personalcenter','Home\HomepageController@personalcenter');








