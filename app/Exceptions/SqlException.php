<?php
/**
 * Created by PhpStorm.
 * User: ZhuYunLong2018
 * Email: 920200256@qq.com
 * Date: 2019/7/24
 * Time: 10:03
 */

namespace App\Exceptions;


use App\Utils\Enum\ErrorCode;

class SqlException extends ApiException
{
    protected $code = 500;
    protected $message = '数据操作失败';
    protected $errorCode = ErrorCode::SQL_ERROR;
}