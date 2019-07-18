<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/18
 * Time: 11:34
 */

namespace App\Logic;


use App\Models\Role;
use Illuminate\Http\Request;

class RoleLogic
{
    /**
     * 添加或更新
     * @param Role $role
     * @param Request $request
     * @return bool
     */
    public static function update(Role $role, Request $request) {
        $role->name = $request->input("name");
        $role->description = $request->input("description");
        $role->permissions = $request->input("keys");
        return $role->save();
    }

}