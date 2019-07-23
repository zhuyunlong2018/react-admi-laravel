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


Route::get('/', function () {
    return view('welcome');
});

//测试路由
Route::middleware('validator:Auth')->prefix('/')->group(function () {
    Route::any('test', 'TestController@test');
});


Route::middleware('validator:Auth')->namespace('Admin')->prefix('admin')->group(function () {
    // 后台登录
    Route::post('login', 'AuthController@login');

    //后台注册
    Route::post('register', 'AuthController@register');

});

// Admin 模块
Route::middleware('api.auth')->namespace('Admin')->prefix('admin')->group(function () {

    Route::middleware('validator:Admin')->prefix('/admins')->group(function () {
        // 获取管理员列表
        Route::get('getAdmins', 'AdminController@getAdmins');

        //添加管理员
        Route::post('add', 'AdminController@add');

        //编辑管理员
        Route::put('edit', 'AdminController@edit');

        //删除管理员
        Route::delete('del', 'AdminController@del');

    });

    Route::prefix('/menus')->group(function () {
        // 获取前端菜单
        Route::get('getMenus', 'MenuController@getMenus');

        //添加菜单
        Route::post('add', 'MenuController@add');

        //编辑菜单
        Route::put('edit', 'MenuController@edit');

        //删除菜单
        Route::delete('del', 'MenuController@del');
    });

    Route::middleware('validator:Role')->prefix('/roles')->group(function () {
        // 获取角色列表
        Route::get('getRoles', 'RoleController@getRoles');

        //添加角色
        Route::post('add', 'RoleController@add');

        //编辑角色
        Route::put('edit', 'RoleController@edit');

        //删除角色
        Route::delete('del', 'RoleController@del');
    });

    Route::prefix('/users')->group(function () {
        // 获取用户列表
        Route::get('getUsers', 'UserController@getUsers');

        //根据ID获取一名用户信息
        Route::get('getUser', 'UserController@getUser');

        //添加用户
        Route::post('add', 'UserController@add');

        //编辑用户
        Route::put('edit', 'UserController@edit');

        //删除用户
        Route::delete('del', 'UserController@del');
    });
});