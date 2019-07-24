<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/17
 * Time: 10:43
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Logic\AuthLogic;
use App\Logic\MenuLogic;
use App\Models\Menu;
use App\Utils\Response;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * 获取所有菜单列表
     * @return string
     */
    public function getMenus() {
        $menus = Menu::all();
        return Response::result($menus);
    }

    /**
     * 获取前端导航栏菜单路由
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserRoutes(Request $request) {
        $routes = Menu::getMany([
            "key" => ["in", (new AuthLogic($request->user()))->getPermissions()]
        ]);
        return Response::result($routes);
    }

    /**
     * 添加菜单
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request) {
        $menu = new Menu();
        $menu->key = MenuLogic::makeKey();
        MenuLogic::update($menu, $request);
        return Response::ok();
    }

    /**
     * 编辑菜单
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request) {
        $menu = Menu::getOne(['key' => $request->input("key")]);
        $oldCode = $menu->code;
        MenuLogic::update($menu, $request);
        //编辑菜单，若为功能，修改了code（api），需要刷新关联的角色权限缓存
        if ($menu->type===2 && !empty($oldCode) && $oldCode != $request->code) {
            AuthLogic::refreshAllCache();
        }
        return Response::ok();
    }

    /**
     * 删除菜单
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function del(Request $request) {
        //TODO 菜单有下级将无法删除
        $key = $request->input("key");
        Menu::deleteWhere(["key" => $key]);
        return Response::ok();
    }

}