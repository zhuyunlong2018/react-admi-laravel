<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/20
 * Time: 17:45
 */

namespace App\Exceptions;


use App\Utils\Enum\ErrorCode;

class TokenException extends ApiException
{
    protected $code = 402;
    protected $message = 'token错误';
    protected $errorCode = ErrorCode::TOKEN_ERROR;
}