<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/20
 * Time: 16:23
 */

namespace App\Validator;


class AuthValidator extends BaseValidator
{
    protected $attributes = [
        'userName' => '用户名',
        'password' => '密码',
    ];

    protected $message = [
        'required'=>':attribute 为必填项',
    ];

    protected $rules = [
        //管理员登录
        "admin/login" => [
            'userName' => 'required|max:255',
            'password' => 'required|string|min:6'
        ],

        //管理员注册
        "admin/register" => [
            'userName' => 'required|max:255',
            'password' => 'required|string|min:6'
        ],
    ];

    /**
     * 自定义规则
     */
    protected function makeCustomRules(): void
    {
        // TODO: Implement makeCustomRules() method.
    }
}