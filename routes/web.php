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

//测试ES
Route::get('/search', function (){
    return \App\Models\Admin\Product::search('2017')->get();
});


Route::get('/pay', 'Home\AliPayController@index');

Route::get('/', 'Home\IndexController@index');
Route::get('/product/index', 'Home\ProductController@index');
Route::get('/product/detail/{id}', 'Home\ProductController@detail');
Route::get('/cart/index', 'Home\CartController@index');
Route::any('/cart/add/{id?}', 'Home\CartController@add');
Route::get('cart/changecount', 'Home\CartController@changecount');
Route::get('cart/del/{id}', 'Home\CartController@destroy');
Route::post('order/add', 'Home\OrderController@add');
Route::post('address/add', 'Home\AddressController@add');
Route::get('address/edit/{id}', 'Home\AddressController@edit');
Route::post('address/update', 'Home\AddressController@update');
Route::get('address/del/{id}', 'Home\AddressController@del');

Route::post('/order/confirm', 'Home\OrderController@confirm');
Route::get('order/pay', 'Home\OrderController@pay')->name('orderpay');





Route::get('/category/index/{id}', 'Home\CategoryController@index');
Route::get('/order/index', 'Home\OrderController@index');
Route::any('/order/check', 'Home\OrderController@check');
Route::get('/email/verify/{token}', ['as' => 'email.verify', 'uses' => 'Home\EmailController@verify']);

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

    Route::group(['middleware' => 'admincan'], function (){
        //管理员模块
        Route::get('/manager/add', 'Admin\ManagerController@add');
        Route::post('/manager/add', 'Admin\ManagerController@create');
        Route::get('/manager/del/{id}', 'Admin\ManagerController@detroy');
        Route::get('/manager/index', 'Admin\ManagerController@index');
        //角色创建
        Route::get('/manager/{admin}/role', 'Admin\ManagerController@role');
        Route::post('/manager/{admin}/role', 'Admin\ManagerController@storeRole');
        //角色
        Route::get('/roles/{admin}/permissioninfo', 'Admin\RoleController@roleByManager');
        Route::get('/roles', 'Admin\RoleController@index');
        Route::get('/roles/create', 'Admin\RoleController@create');
        Route::post('/roles/store', 'Admin\RoleController@store');
        //创建权限
        Route::get('/roles/{role}/permission', 'Admin\RoleController@permission');
        Route::post('/roles/{role}/permission', 'Admin\RoleController@storePermission');
        //权限
        Route::get('/permissions', 'Admin\PermissionController@index');
        Route::get('/permissions/create', 'Admin\PermissionController@create');
        Route::post('/permissions/store', 'Admin\PermissionController@store');
    });
    Route::get('/index', 'Admin\IndexController@index');
    Route::get('/calender', 'Admin\CalendarController@index');
    Route::get('/chartshowcase', 'Admin\ChartShowcaseController@index');
    Route::get('/formshowcase', 'Admin\FormShowcaseController@index');
    Route::get('/formwizard', 'Admin\FormShowcaseController@formwizard');
    Route::get('/gallery', 'Admin\GalleryController@index');
    Route::get('/manager', 'Admin\ManagerController@index');

    Route::get('/persioninfo/{id}', 'Admin\ManagerController@profile');
    Route::post('/changepersioninfo', 'Admin\PersionalInfoController@changepersioninfo');
    Route::get('/changeemail', 'Admin\ManagerController@changeemail');
    Route::post('manager/changeemailpost', 'Admin\ManagerController@changeemailpost');

    Route::get('changepass', 'Admin\ManagerController@changepass');
    Route::post('manager/changepasspost', 'Admin\ManagerController@changepasspost');

    Route::get('/table', 'Admin\TableController@index');


    Route::get('/user', 'Admin\UserController@index');
    Route::get('/user/add', 'Admin\UserController@add');
    Route::get('/user/{id}', 'Admin\PersionalInfoController@index');
    Route::post('/changepersioninfo/changeprofile', 'Admin\PersionalInfoController@changepersioninfo');
    Route::get('/user/profile', 'Admin\UserController@profile');
    Route::post('/user/create', 'Admin\UserController@create');
    Route::get('/user/delete/{id}', 'Admin\UserController@destroy');
    //分类
    Route::get('/category/list', 'Admin\CategoryController@list');
    Route::get('/category/add', 'Admin\CategoryController@add');
    Route::post('/category/create', 'Admin\CategoryController@create');
    Route::get('/category/edit/{id}', 'Admin\CategoryController@edit');
    Route::post('/category/update', 'Admin\CategoryController@update');
    Route::get('/category/del/{id}', 'Admin\CategoryController@destroy');
    //商品
    Route::get('/product/list', 'Admin\ProductController@list');
    Route::get('/product/add', 'Admin\ProductController@add');
    Route::post('/product/create', 'Admin\ProductController@create');
    Route::get('/product/edit/{id}', 'Admin\ProductController@edit');
    Route::post('/product/update', 'Admin\ProductController@update');
    Route::get('/product/del/{id}', 'Admin\ProductController@destroy');
    Route::get('/product/dwon/{id}', 'Admin\ProductController@dwon');
    Route::get('/product/up/{id}', 'Admin\ProductController@up');
});
