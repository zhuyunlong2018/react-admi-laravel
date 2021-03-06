<?php
/**
 * Created by PhpStorm.
 * User: ZhuYunLong2018
 * Email: 920200256@qq.com
 * Date: 2019/7/19
 * Time: 17:22
 */

namespace App\Exceptions;



use App\Utils\Enum\ErrorCode;

class LoginException extends ApiException
{
    protected $code = 401;
    protected $message = '登录失效';
    protected $errorCode = ErrorCode::LOGIN_ERROR;

}