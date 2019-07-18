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
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    public function test() {
        $value = Role::all();
//        Log::debug($value);
        return ($value);
    }

}