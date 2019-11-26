<?php
/**
 * Created by PhpStorm.
 * User: ZhuYunLong2018
 * Email: 920200256@qq.com
 * Date: 2019/7/18
 * Time: 15:15
 */

namespace App\Logic;


use App\Models\User;
use Illuminate\Http\Request;

class UserLogic
{
    public static function getByPage(Request $request) {
        return User::query()
            ->whereAge($request->input("age"))
            ->whereName($request->input("name"))
            ->paginate($request->input("pageSize"));
    }

    /**
     * 编辑或添加用户
     * @param User $user
     * @param Request $request
     * @return bool
     */
    public static function update(User $user, Request $request) {
        $user->name = $request->input("name");
        $user->age = $request->input("age");
        $user->mobile = $request->input("mobile");
        return $user->save();
    }

}