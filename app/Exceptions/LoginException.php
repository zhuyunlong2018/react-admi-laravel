<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/19
 * Time: 17:22
 */

namespace App\Exceptions;



class LoginException extends ApiException
{
    protected $code = 401;
    protected $message = '登录失效';
    protected $errorCode = 1001;

}