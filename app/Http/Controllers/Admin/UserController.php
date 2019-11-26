<?php
/**
 * Created by PhpStorm.
 * User: ZhuYunLong2018
 * Email: 920200256@qq.com
 * Date: 2019/7/18
 * Time: 14:22
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\Logic\UserLogic;
use App\Models\User;
use App\Utils\Response;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * 获取用户列表
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUsers(Request $request) {
        $users = UserLogic::getByPage($request);
        return Response::result($users);
    }

    /**
     * 通过ID获取用户信息
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUser(Request $request) {
        $user = User::find($request->id);
        return Response::result($user);
    }

    /**
     * 添加一名用户
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request) {
        $user = new User();
        UserLogic::update($user, $request);
        return Response::result($user);
    }

    /**
     * 编辑一名用户信息
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request) {
        $user = User::find($request->id);
        UserLogic::update($user, $request);
        return Response::result($user);
    }

    /**
     * 删除一名用户
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function del(Request $request) {
        User::deleteWhere(['id' => $request->input("id")]);
        return Response::ok();
    }

}