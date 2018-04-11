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

//前台
Route::get('/', 'Home\IndexController@index');
Route::get('/product/index', 'Home\ProductController@index');
Route::get('/product/detail', 'Home\ProductController@detail');
Route::get('/cart/index', 'Home\CartController@index');
Route::get('/order/index', 'Home\OrderController@index');
Route::get('/order/check', 'Home\OrderController@check');




//后台
Route::get('/admin/index', 'Admin\IndexController@index');
Route::get('/admin/calender', 'Admin\CalendarController@index');
Route::get('/admin/chartshowcase', 'Admin\ChartShowcaseController@index');
Route::get('/admin/formshowcase', 'Admin\FormShowcaseController@index');
Route::get('/admin/formwizard', 'Admin\FormShowcaseController@formwizard');
Route::get('/admin/gallery', 'Admin\GalleryController@index');
Route::get('/admin/login', 'Admin\LoginController@index');
Route::get('/admin/register', 'Admin\RegisterController@index');
Route::get('/admin/manager', 'Admin\ManagerController@index');
Route::get('/admin/persioninfo', 'Admin\PersionalInfoController@index');
Route::get('/admin/table', 'Admin\TableController@index');
Route::get('/admin/user', 'Admin\UserController@index');
Route::get('/admin/user/profile', 'Admin\UserController@profile');
Route::get('/admin/user/add', 'Admin\UserController@add');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
