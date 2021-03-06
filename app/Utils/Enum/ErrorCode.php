<?php
/**
 * Created by PhpStorm.
 * User: ZhuYunLong2018
 * Email: 920200256@qq.com
 * Date: 2019/7/22
 * Time: 9:42
 */

namespace App\Utils\Enum;

/**
 * 输出前端异常、错误代码
 * Class ErrorCode
 * @package App\Utils\Enum
 */
class ErrorCode
{
    //未知错误
    const UNKNOWN_ERROR = 6000;

    const WEIXIN_SDK_ERROR = 5050;

    //登录错误
    const LOGIN_ERROR = 4001;

    //token错误
    const TOKEN_ERROR = 4002;

    //token过期
    const TOKEN_EXPIRED = 4003;

    //传递参数验证器不通过
    const VALIDATOR_ERROR = 4004;

    //权限不足
    const AUTH_ERROR = 4005;

    //开发时异常
    const DEV_ERROR = 5000;

    //数据库操作异常
    const SQL_ERROR = 5001;


}