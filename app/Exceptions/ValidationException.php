<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/20
 * Time: 15:37
 */

namespace App\Exceptions;


use App\Utils\Enum\ErrorCode;

class ValidationException extends ApiException
{
    protected $code = 402;
    protected $message = '参数校验失败';
    protected $errorCode = ErrorCode::VALIDATOR_ERROR;
}