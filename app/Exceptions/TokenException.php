<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/20
 * Time: 17:45
 */

namespace App\Exceptions;


class TokenException extends ApiException
{
    protected $code = 402;
    protected $message = 'token错误';
    protected $errorCode = 1002;
}