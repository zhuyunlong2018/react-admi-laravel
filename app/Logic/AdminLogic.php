<?php
/**
 * Created by PhpStorm.
 * User: ZhuYunLong2018
 * Email: 920200256@qq.com
 * Date: 2019/7/22
 * Time: 18:04
 */

namespace App\Logic;


use App\Models\Admin;
use Illuminate\Http\Request;

class AdminLogic
{

    /**
     * 编辑或添加管理员
     * @param Admin $admin
     * @param Request $request
     * @return bool
     */
    public static function update(Admin $admin, Request $request) {
        $admin->name = $request->name;
        $admin->description = $request->description;
        $admin->save();
        $admin->roles()->sync($request->selectRoles);
        $admin->roles;
        return $admin;
    }
}