<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/20
 * Time: 16:22
 */

namespace App\Exceptions;


class DevException extends ApiException
{
    protected $code = 505;
    protected $message = '开发时异常';
    protected $errorCode = 505;
}