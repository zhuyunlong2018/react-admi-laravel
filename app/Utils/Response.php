<?php
/**
 * Created by PhpStorm.
 * User: ZhuYunLong2018
 * Email: 920200256@qq.com
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
                'code' => $exception->getErrorCode(),
                'data' => $exception->getErrorResult()
            ],
            $exception->getCode()
        );
    }

    public static function unknownError(\Exception $exception) {
        return response()->json(
            [
                'msg' => "服务器错误，请稍等片刻！",
                'code' => $exception->getErrorCode(),
                'data' => ''
            ],
            $exception->getCode()
        );
    }

}