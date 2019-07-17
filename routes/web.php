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

Route::prefix('/')->group(function () {
    Route::any('test', 'TestController@test');
});


// Admin 模块
Route::namespace('Admin')->prefix('admin')->group(function () {

    Route::prefix('/')->group(function () {
        // 登录
        Route::post('login', 'LoginController@login');

    });

    Route::prefix('/menus')->group(function () {
        // 获取前端菜单
        Route::get('getMenus', 'MenuController@getMenus');

        //添加菜单
        Route::post('add', 'MenuController@add');

        //编辑菜单
        Route::put('edit', 'MenuController@edit');
    });
});