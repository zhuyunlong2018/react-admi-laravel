<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/20
 * Time: 16:23
 */

namespace App\Validator;


use App\Models\Admin;
use Illuminate\Http\Request;

class AdminValidator extends BaseValidator
{

    public function __construct(string $uri, Request $request)
    {
        parent::__construct($uri, $request);

        $this->attributes = [
            'name' => '用户名',
            'password' => '密码',
            'description' => '描述',
            'selectRoles' => '绑定角色',
        ];

        $this->message = [
            'required' => ':attribute 为必填项',
        ];

        $this->rules = [

            //获取管理员列表
            "admin/admins/getAdmins" => [
                'page' => 'required|Integer|min:1',
                'pageSize' => 'required|Integer|min:1',
            ],

            //添加管理员
            "admin/admins/add" => [
                'name' => [
                    'required',
                    'max:255',
                    $this->getCustomRules("checkAddNameRepeat")
                ],
                'description' => "required|String|min:6",
            ],

            //编辑管理员
            "admin/admins/edit" => [
                'name' => [
                    'required',
                    'max:255',
                    $this->getCustomRules("checkEditNameRepeat")
                ],
                'description' => "required|String|min:6",
            ],

            //删除管理员
            "admin/admins/del" => [
                'id' => [
                    "required",
                    'Integer',
                    'min:1',
                    $this->getCustomRules("checkIsSuper"),
                ]
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
        //检查添加名称是否存在
        $this->checkAddRepeat(Admin::class);

        //检查编辑的名称是否存在
        $this->checkEditRepeat(Admin::class);

        //检查删除的角色是否为超级管理员
        $this->setCustomRules("checkIsSuper", function ($attribute, $value, $fail) {
            if ($value === 1) {
                $fail('该用户为超级管理权限，不能删除！');
            }
        });
    }
}