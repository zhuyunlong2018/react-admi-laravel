<?php
/**
 * Created by PhpStorm.
 * User: ZhuYunLong2018
 * Email: 920200256@qq.com
 * Date: 2019/11/28
 * Time: 10:37
 */

namespace App\Validator;

use App\Exceptions\ValidationException;
use Illuminate\Support\Facades\Validator;

/**
 * 处理参数验证器
 * Class HandleValidator
 * @package App\Validator
 */
class HandleValidator
{
    /**
     * 执行校验
     * @param $input
     * @param BaseValidator $rules
     * @throws ValidationException
     */
    public static function execute($input,BaseValidator $rules): void {
        $validator = Validator::make(
            $input,
            $rules->getRules(),
            $rules->getMessage(),
            $rules->getCustomAttributes()
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag()->getMessages();
            $message = current($messages);
            if (is_array($messages)) {
                $message = current($message);
            }
            throw new ValidationException([
                'msg' => $message
            ]);
        }
    }

}