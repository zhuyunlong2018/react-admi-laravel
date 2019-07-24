<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/11
 * Time: 17:37
 */

namespace App\Http\Controllers\Admin;


use App\Exceptions\AuthException;
use App\Exceptions\LoginException;
use App\Http\Controllers\Controller;
use App\Logic\AuthLogic;
use App\Models\Admin;
use App\Utils\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    /**
     * 后台管理员登录
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws AuthException
     * @throws LoginException
     */
    public function login(Request $request)
    {
        if (! $token = auth("web")->attempt([
            "name" => $request->input("userName"),
            "password" => $request->input("password")
        ])) {
            throw new LoginException(['msg' => '用户名或密码错误']);
        }
        if (JWTAuth::user()->status === 0) {
            throw new AuthException(['msg' => '用户暂无权限登录']);
        }
        //将token返回给前端
        JWTAuth::user()->token = $token;
        //存储用户相关权限
        (new AuthLogic(JWTAuth::user()))->saveAuthoritiesToCache();
        return Response::result(JWTAuth::user());
    }

    /**
     * 后台管理员注册
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $name = $request->userName;
        $password = $request->password;
        $user = Admin::create(['name' => $name, 'password' => Hash::make($password)]);
        $user->token = JWTAuth::fromUser($user);
        return Response::result($user);
    }

    /**
     * Refresh a token.
     * TODO 还未实现验证
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(JWTAuth::parseToken()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);
    }
}