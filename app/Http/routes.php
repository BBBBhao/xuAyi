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


























































// 后台登陆路由
Route::resource('/admin/login','Admin\LoginController');
// 后台登录验证
Route::post('/admin/dologin','Admin\LoginController@dologin');
// 后台用户注册
Route::resource('/admin/register','Admin\LoginController');

// Route::group(['middleware'=>'admin.login'], function(){

// 后台首页路由
Route::get('/admin','Admin\IndexController@index');
// 后台用户信息
Route::resource('/admin/user','Admin\UserController');
// 修改用户信息页
Route::get('/admin/info','Admin\IndexController@info');
// 保存用户修改信息
Route::post('/admin/doinfo','Admin\IndexController@doinfo');
// 修改密码
Route::get('/admin/pass','Admin\IndexController@pass');
// 修改密码
Route::post('/admin/dopass','Admin\IndexController@dopass');
// 退出登录
Route::get('/admin/quit','Admin\IndexController@quit');

// });

// 前台用户登录
Route::get('/home/login','Home\LoginController@login');
// 前台登录验证
Route::post('/home/dologin','Home\LoginController@dologin');
// 前台用户退出
Route::get('/home/loginout','Home\LoginController@loginout');

// 前台用户注册
Route::get('/home/register','Home\LoginController@register');
// 前台注册验证
Route::post('/home/doregister','Home\LoginController@doregister');

// 前台用户个人管理中心
Route::get('/home/center','Home\CenterController@index');
// 前台个人信息页
Route::get('/home/user','Home\UserController@index');

// 前台用户收货地址
Route::get('/home/adress','Home\AdressController@adress');
// 前台用户添加收货地址
Route::post('/home/doaddr','Home\AdressController@doaddr');
// 前台用户添加收货地址页
Route::get('/home/addadress','Home\AdressController@addadress');

// 前台用户修改地址页
Route::get('/home/doadress/{id}','Home\AdressController@doadress');
// 前台用户修改地址
Route::post('/home/addrupdate/{id}','Home\AdressController@addrupdate');
// 前台用户删除地址
Route::get('/home/addrdel/{id}','Home\AdressController@addrdel');

// 前台用户修改默认地址
Route::get('/home/addrdefault/{id}','Home\AdressController@addrdefault');


// 前台账户安全显示
Route::get('/home/safe','Home\UserController@safe');




















































































































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
























































































// 后台友情链接
Route::resource('/admin/link','Admin\LinkController');
// 后台订单管理
Route::resource('/admin/order','Admin\OrderController');
// 后台广告管理
Route::resource('/admin/advertising','Admin\AdvertisingController');
//前台购物车
Route::get('/shopcart','Home\ShopcartController@index');