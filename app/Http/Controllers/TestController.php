<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/17
 * Time: 11:05
 */

namespace App\Http\Controllers;



use App\Models\Menu;
use App\Models\Role;
use App\Validator\AuthValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    public function test(Request $request) {

        $menu = Menu::with("children")->find(51);
        return $menu;
    }

}