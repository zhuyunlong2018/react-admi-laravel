<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/17
 * Time: 11:05
 */

namespace App\Http\Controllers;



use App\Models\Menu;

class TestController extends Controller
{
    public function test() {
        $value = new Menu();
        $value->parentKey = 'dddfadsf';
        $value->save();
        return ($value);
    }

}