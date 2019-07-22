<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/22
 * Time: 10:33
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Logic\AdminLogic;
use App\Models\Admin;
use App\Utils\Response;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * 获取管理员列表
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAdmins(Request $request) {
        $admins = Admin::with("roles")->paginate($request->pageSize);
        return Response::result($admins);
    }

    /**
     * 添加一名管理员
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request) {
        $admin = AdminLogic::update(new Admin(), $request);
        return Response::result($admin);
    }

    /**
     * 编辑一名管理员
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request) {
        $admin = AdminLogic::update(Admin::find($request->id), $request);
        return Response::result($admin);
    }

    /**
     * 删除一名管理员
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function del(Request $request) {
        Admin::deleteWhere(['id' => $request->input("id")]);
        return Response::ok();
    }

}