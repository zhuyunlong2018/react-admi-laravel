<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/17
 * Time: 10:43
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Logic\MenuLogic;
use App\Models\Menu;
use App\Utils\Response;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * 获取菜单列表
     * @return string
     */
    public function getMenus() {
        $menus = Menu::all();
        return Response::result($menus);
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
     */
    public function edit(Request $request) {
        $menu = Menu::getOne(['key' => $request->input("key")]);
        MenuLogic::update($menu, $request);
        return Response::ok();
    }

}