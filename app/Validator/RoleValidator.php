<?php
/**
 * Created by PhpStorm.
 * User: ZhuYunLong2018
 * Email: 920200256@qq.com
 * Date: 2019/7/20
 * Time: 16:23
 */

namespace App\Validator;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleValidator extends BaseValidator
{

    public function __construct(string $uri, Request $request)
    {
        parent::__construct($uri, $request);

        $this->attributes = [
            'name' => '用户名',
            'description' => '描述',
            'permission' => "权限key值"
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

            //添加角色
            "admin/roles/add" => [
                'name' => [
                    'required',
                    'max:255',
                    $this->getCustomRules("checkAddNameRepeat")
                ],
                'description' => "required|String|min:6",
            ],

            //编辑角色
            "admin/roles/edit" => [
                'name' => [
                    'required',
                    'max:255',
                    $this->getCustomRules("checkEditNameRepeat")
                ],
                'description' => "required|String|min:6",
            ],

            //删除角色
            "admin/roles/del" => [
                'id' => [
                    "required",
                    'Integer',
                    'min:1',
                    $this->getCustomRules("checkBeBound"),
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
        $this->checkAddRepeat(Role::class);

        //检查编辑的名称是否存在
        $this->checkEditRepeat(Role::class);

        //检查删除的角色是否被绑定了
        $this->setCustomRules("checkBeBound", function ($attribute, $value, $fail) {
            $role = Role::with("admins")->find($value);
            if ($role && count($role->admins) > 0) {
                $fail($role->name .' 已绑定管理员，请先解绑才能删除。');
            }
        });

        //检查删除的角色是否为超级管理员角色
        $this->setCustomRules("checkIsSuper", function ($attribute, $value, $fail) {
            if ($value === 1) {
                $fail('该角色为超级管理权限，不能删除！');
            }
        });
    }
}