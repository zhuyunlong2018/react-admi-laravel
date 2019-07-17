<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/17
 * Time: 15:11
 */

namespace App\Utils;


class Response
{
    private static $code = 200;

    private static $message = "success";

    private static $data = [];

    public static function ok() {
        return response()->json(
            [
                'msg' => self::$message,
                'code' => self::$code,
                'data' => self::$data
            ]
        );
    }

    public static function result($data, $message="success") {
        self::$data = $data;
        self::$message = $message;
        return self::ok();
    }

}