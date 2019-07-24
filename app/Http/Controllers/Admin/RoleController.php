<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/18
 * Time: 10:44
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Logic\AuthLogic;
use App\Logic\RoleLogic;
use App\Models\Role;
use App\Utils\Response;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * 获取所有角色列表
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRoles() {
        $roles = Role::all();
        return Response::result($roles);
    }

    /**
     * 添加一名角色
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request) {
        $role = new Role();
        RoleLogic::update($role, $request);
        return Response::result($role);
    }

    /**
     * 编辑角色
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request) {
        $role = Role::find($request->id);
        $oldPermissions = $role->permissions;
        RoleLogic::update($role, $request);
        //编辑角色后，后台权限修改，需要刷新缓存
        if ($oldPermissions != $request->keys) {
            AuthLogic::refreshAllCache();
        }
        return Response::result($role);
    }

    /**
     * 删除一名角色
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function del(Request $request) {
        Role::deleteWhere(['id' =>$request->input("id")]);
        return Response::ok();
    }

}