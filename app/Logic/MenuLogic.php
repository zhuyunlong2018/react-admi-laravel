<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/17
 * Time: 16:17
 */

namespace App\Logic;


use App\Models\Menu;
use App\Utils\Utils;
use Illuminate\Http\Request;

class MenuLogic
{
    public static function makeKey() {
        return date("YmdHis").Utils::getRandChar(5);
    }

    /**
     * 添加或更新
     * @param Menu $menu
     */
    public static function update(Menu $menu, Request $request) {
        $menu->parentKey = $request->input("parentKey");
        $menu->local = $request->input("local");
        $menu->order = $request->input("order", 1000);
        $menu->path = $request->input("path");
        $menu->target = $request->input("target");
        $menu->icon = $request->input("icon");
        $menu->text = $request->input("text");
        $menu->type = $request->input("type");
        $menu->code = $request->input("code");
        return $menu->save();
    }

}