<?php
/**
 * Created by PhpStorm.
 * User: ZhuYunLong2018
 * Email: 920200256@qq.com
 * Date: 2019/7/20
 * Time: 16:23
 */

namespace App\Validator;


use App\Models\Admin;
use Illuminate\Http\Request;

class AuthValidator extends BaseValidator
{
    protected $attributes = [
        'userName' => '用户名',
        'password' => '密码',
    ];

    protected $message = [
        'required'=>':attribute 为必填项',
    ];

    public function __construct(string $uri, Request $request)
    {
        parent::__construct($uri, $request);
         $this->rules = [
        //管理员登录
        "admin/login" => [
            'userName' => 'required|max:255',
            'password' => 'required|string|min:6'
        ],

        //管理员注册
        "admin/register" => [
            'userName' => [
                'required',
                'max:255',
                $this->getCustomRules("checkAddNameRepeat")
            ],
            'password' => 'required|string|min:6'
        ],
    ];
    }

    /**
     * 自定义规则
     * @param $request
     * @throws \App\Exceptions\DevException
     */
    protected function makeCustomRules($request): void
    {
        $this->checkAddRepeat(Admin::class);
    }
}