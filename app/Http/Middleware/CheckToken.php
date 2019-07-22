<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/20
 * Time: 17:31
 */

namespace App\Http\Middleware;


use App\Exceptions\LoginException;
use App\Exceptions\TokenException;
use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckToken
{

    public function handle(Request $request, Closure $next)
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {  //获取到用户数据，并赋值给$user
                throw new LoginException(['msg' => "未登录，请先登录"]);
            }
            //如果想向控制器里传入用户信息，将数据添加到$request里面
            $request->attributes->add(["user" => $user]);//添加参数
            return $next($request);
        } catch (TokenExpiredException $e) {
            throw new TokenException(['msg' => "token 过期"]);
        } catch (TokenInvalidException $e) {
            throw new TokenException(['msg' => "token 无效"]);
        } catch (JWTException $e) {
            throw new TokenException(['msg' => "缺少token"]);
        }
    }
}