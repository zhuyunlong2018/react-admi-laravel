<?php
/**
 * Created by PhpStorm.
 * User: ZhuYunLong2018
 * Email: 920200256@qq.com
 * Date: 2019/7/24
 * Time: 9:16
 */

namespace App\Exceptions;


use App\Utils\Enum\ErrorCode;

class AuthException extends ApiException
{
    protected $code = 405;
    protected $message = '权限不足';
    protected $errorCode = ErrorCode::AUTH_ERROR;

}