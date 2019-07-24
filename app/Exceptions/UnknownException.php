<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/23
 * Time: 16:52
 */

namespace App\Exceptions;


use App\Utils\Enum\ErrorCode;

class UnknownException extends ApiException
{
    protected $code = 500;
    protected $message = '未知错误';
    protected $errorCode = ErrorCode::UNKNOWN_ERROR;
}