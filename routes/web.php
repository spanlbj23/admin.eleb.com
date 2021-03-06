<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('about',function (){
    return 'about';
});
Route::get('/', function () {
    return view('welcome');
});
//商户
Route::resource('user','User\UserController');

//Route::get('user/register','User\UserController@create')->name('register');
//Route::post('user/store','User\UserController@store')->name('store');
//商品分类
Route::resource('shopcategory','Shopcategory\ShopCategoryController');
//商家信息表
Route::get('audit/list','AuditController@index')->name('audit.list');
Route::get('audit/{user}/update','AuditController@update')->name('audit.update');
Route::get('audit/{user}/ban','AuditController@ban')->name('audit.ban');
//管理员
Route::resource('admin','AdminController');
//修改密码
Route::post('admin/{admin}/updatepwd','AdminController@updatepwd')->name('admin.updatepwd');
//文件上传
Route::post('upload','Shopcategory\ShopCategoryController@upload')->name('upload');
//登录
Route::get('login','SessionController@create')->name('login');
Route::post('login','SessionController@store')->name('login');
//管理员主页
//Route::get('admin/indexm','AdminController@indexm')->name('admin.indexm');
Route::get('indexm','AdminController@indexm')->name('admin.indexm');
//注销
Route::get('logout','SessionController@destroy')->name('logout');
//活动
Route::resource('activity','ActivityController');

Route::get('user/login','User\UserController@login');
//会员
Route::resource('member','MemberController');
//解禁
Route::get('member/{member}/jiejin','MemberController@jiejin')->name('member.jiejin');
//统计
//最近一周订单统计
Route::get('order/week','shop\TongJiController@order_week')->name('order.week');
//最近一周菜品销量统计
Route::get('menu/week','shop\TongJiController@menu_week')->name('menu.week');
//最近三个月订单统计
Route::get('order/month','shop\TongJiController@order_month')->name('order.month');
//最近三个月菜品销量统计
Route::get('menu/month','shop\TongJiController@menu_month')->name('menu.month');
//Rbac
Route::get('rbac','Admin\RbacController@index')->name('inedx');
Route::get('rbac/test','Admin\RbacController@test')->name('rbac/test');
//权限路由
Route::resource('permission','PermissionController');
//角色路由
Route::resource('role','RoleController');
//菜单
Route::resource('navs','NavController');
//发送邮件
