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

class TestController extends Controller
{
    public function test(Request $request) {
//        $value = Role::all();
//        Log::debug($value);
        dd($name = $request->getUserInfo());
        new AuthValidator($request, "admin/login");
        $str = "a:5:{i:0;a:6:{s:7:\"options\";a:5:{s:8:\"required\";i:1;s:4:\"help\";s:0:\"\";s:4:\"size\";s:0:\"\";s:11:\"addonBefore\";s:0:\"\";s:10:\"addonAfter\";s:0:\"\";}s:11:\"placeholder\";s:11:\"placeholder\";s:5:\"label\";s:12:\"所属部门\";s:6:\"idname\";s:3:\"aaa\";s:4:\"type\";s:4:\"text\";s:2:\"id\";i:1;}i:1;a:6:{s:7:\"options\";a:5:{s:8:\"required\";i:1;s:4:\"help\";s:0:\"\";s:4:\"size\";s:0:\"\";s:11:\"addonBefore\";s:0:\"\";s:10:\"addonAfter\";s:0:\"\";}s:11:\"placeholder\";s:11:\"placeholder\";s:5:\"label\";s:33:\"部门人数和参加活动人数\";s:6:\"idname\";s:3:\"bbb\";s:4:\"type\";s:4:\"text\";s:2:\"id\";i:2;}i:2;a:6:{s:7:\"options\";a:2:{s:8:\"required\";b:0;s:4:\"help\";s:0:\"\";}s:11:\"placeholder\";s:11:\"placeholder\";s:5:\"label\";s:18:\"费用发生日期\";s:6:\"idname\";i:4536456375467;s:4:\"type\";s:8:\"datetime\";s:2:\"id\";i:3;}i:3;a:6:{s:7:\"options\";a:4:{s:8:\"required\";i:1;s:4:\"help\";s:0:\"\";s:6:\"inline\";s:0:\"\";s:5:\"radio\";a:2:{i:0;a:2:{s:3:\"key\";i:0;s:5:\"value\";s:15:\"已提供照片\";}i:1;a:2:{s:3:\"key\";i:1;s:5:\"value\";s:15:\"未提供照片\";}}}s:11:\"placeholder\";s:11:\"placeholder\";s:5:\"label\";s:27:\"是否已提交活动相片\";s:6:\"idname\";s:3:\"ddd\";s:4:\"type\";s:5:\"radio\";s:2:\"id\";i:4;}i:4;a:6:{s:7:\"options\";a:5:{s:8:\"required\";i:1;s:4:\"help\";s:0:\"\";s:4:\"size\";s:0:\"\";s:11:\"addonBefore\";s:0:\"\";s:10:\"addonAfter\";s:0:\"\";}s:11:\"placeholder\";s:11:\"placeholder\";s:5:\"label\";s:12:\"费用金额\";s:6:\"idname\";s:3:\"fff\";s:4:\"type\";s:6:\"number\";s:2:\"id\";i:5;}}";
        return (unserialize($str));
    }

}