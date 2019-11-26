<?php
/**
 * Created by PhpStorm.
 * User: ZhuYunLong2018
 * Email: 920200256@qq.com
 * Date: 2019/7/19
 * Time: 17:47
 */

namespace App\Exceptions;


use App\Utils\Enum\ErrorCode;

class ApiException extends \Exception
{
    protected $code = 400;
    protected $message = 'invalid parameters';
    protected $errorCode = ErrorCode::UNKNOWN_ERROR;
    protected $errorResult = [];

    protected $shouldToClient = true;

    /**
     * 构造函数，接收一个关联数组
     * @param array $params 关联数组只应包含code、msg和errorCode，且不应该是空值
     */
    public function __construct($params=[])
    {
        if(!is_array($params)){
            return;
        }
        if(array_key_exists('code',$params)){
            $this->code = $params['code'];
        }
        if(array_key_exists('msg',$params)){
            $this->message = $params['msg'];
        }
        if(array_key_exists('errorCode',$params)){
            $this->errorCode = $params['errorCode'];
        }
        if(array_key_exists('errorResult',$params)){
            $this->errorResult = $params['errorResult'];
        }
    }

    public function getErrorCode() {
        return $this->errorCode;
    }

    public function getErrorResult() {
        return $this->errorResult;
    }

}