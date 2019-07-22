<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/11
 * Time: 17:37
 */

namespace App\Http\Controllers\Admin;


use App\Exceptions\LoginException;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utils\Response;
use App\Validator\AuthValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    public function __construct()
    {
    }

    public function login(Request $request)
    {
        new AuthValidator($request);
        if (! $token = auth("web")->attempt([
            "name" => $request->input("userName"),
            "password" => $request->input("password")
        ])) {
            throw new LoginException(['msg' => '用户名或密码错误']);
        }
        JWTAuth::user()->token = $token;
        return Response::result(JWTAuth::user());
    }

    public function register(Request $request)
    {
        new AuthValidator($request);
        $name = $request->name;
        $password = $request->password;
        $user = User::create(['name' => $name, 'password' => Hash::make($password)]);
        $user->token = JWTAuth::fromUser($user);
        return Response::result($user);
    }

    /**
     * Refresh a token.
     *
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