<?php
/**
 * Created by PhpStorm.
 * User: ZhuYunLong2018
 * Email: 920200256@qq.com
 * Date: 2019/7/12
 * Time: 20:57
 */

namespace App\Exceptions;


use App\Utils\Enum\ErrorCode;

class WeixinJsSdkException extends ApiException
{
    public $code = 500;
    public $errorCode = ErrorCode::WEIXIN_SDK_ERROR;
    public $message = "JsSdk错误";
}