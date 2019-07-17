<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/11
 * Time: 17:37
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    public function login()
    {

        return ['code'=>200,'user'=>[]];
    }
}