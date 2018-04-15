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

Route::get('/', 'Home\IndexController@index');
Route::get('/product/index', 'Home\ProductController@index');
Route::get('/product/detail', 'Home\ProductController@detail');
Route::get('/cart/index', 'Home\CartController@index');
Route::get('/order/index', 'Home\OrderController@index');
Route::get('/order/check', 'Home\OrderController@check');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([ 'prefix' => 'admin' ], function () {
    Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'AdminAuth\LoginController@login');
    Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

    Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'AdminAuth\RegisterController@register');

    Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

    Route::get('/manager/add', 'Admin\ManagerController@add');
    Route::post('/manager/add', 'Admin\ManagerController@create');
    Route::get('/manager/del/{id}', 'Admin\ManagerController@detroy');

    Route::get('/manager/index', 'Admin\ManagerController@index');
    Route::post('/manager/index', 'Admin\ManagerController@index');

    Route::get('/index', 'Admin\IndexController@index');
    Route::get('/calender', 'Admin\CalendarController@index');
    Route::get('/chartshowcase', 'Admin\ChartShowcaseController@index');
    Route::get('/formshowcase', 'Admin\FormShowcaseController@index');
    Route::get('/formwizard', 'Admin\FormShowcaseController@formwizard');
    Route::get('/gallery', 'Admin\GalleryController@index');
    Route::get('/manager', 'Admin\ManagerController@index');

    Route::get('/persioninfo', 'Admin\PersionalInfoController@index');
    Route::post('/changepersioninfo', 'Admin\PersionalInfoController@changepersioninfo');
    Route::get('/changeemail', 'Admin\ManagerController@changeemail');
    Route::post('manager/changeemailpost', 'Admin\ManagerController@changeemailpost');

    Route::get('changepass', 'Admin\ManagerController@changepass');
    Route::post('manager/changepasspost', 'Admin\ManagerController@changepasspost');

    Route::get('/table', 'Admin\TableController@index');
    Route::get('/user', 'Admin\UserController@index');
    Route::get('/user/profile', 'Admin\UserController@profile');
    Route::get('/user/add', 'Admin\UserController@add');
});
