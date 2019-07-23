<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/17
 * Time: 15:11
 */

namespace App\Utils;


use App\Exceptions\ApiException;

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

    public static function error(ApiException $exception) {
        return response()->json(
            [
                'msg' => $exception->getMessage(),
//                'msg' => "服务器错误，请稍等片刻！",
                'code' => $exception->getErrorCode(),
                'data' => ''
            ],
            $exception->getCode()
        );
    }

}