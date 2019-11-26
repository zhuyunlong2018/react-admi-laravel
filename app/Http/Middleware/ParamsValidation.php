<?php
/**
 * Created by PhpStorm.
 * User: ZhuYunLong2018
 * Email: 920200256@qq.com
 * Date: 2019/7/20
 * Time: 17:31
 */

namespace App\Http\Middleware;

use App\Exceptions\DevException;
use App\Exceptions\ValidationException;
use Closure;
use Illuminate\Support\Facades\Validator;

class ParamsValidation
{
    /**
     * 校验前端传递参数是否合法
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $Rules String 验证器对象名，AuthValidator验证器则传递Auth字段
     * @return mixed
     * @throws DevException
     * @throws ValidationException
     */
    public function handle($request, Closure $next, $Rules)
    {
        $RulesClass = "\App\Validator\\{$Rules}Validator";
        if (!class_exists($RulesClass)) {
            throw new DevException();
        }
        $rules = new $RulesClass($request->route()->uri, $request);
        $validator = Validator::make(
            $request->input(),
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
        return $next($request);
    }
}
