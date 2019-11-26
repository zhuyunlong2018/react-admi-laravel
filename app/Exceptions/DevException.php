<?php
/**
 * Created by PhpStorm.
 * User: ZhuYunLong2018
 * Email: 920200256@qq.com
 * Date: 2019/7/20
 * Time: 16:22
 */

namespace App\Exceptions;


use App\Utils\Enum\ErrorCode;

class DevException extends ApiException
{
    protected $code = 505;
    protected $message = '开发时异常';
    protected $errorCode = ErrorCode::DEV_ERROR;
}