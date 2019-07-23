<?php
/**
 * Created by PhpStorm.
 * User: Administrator
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
                    $this->getCustomRules("checkAddRepeat")
                ],
                'description' => "required|String|min:6",
            ],

            //编辑角色
            "admin/roles/edit" => [
                'name' => [
                    'required',
                    'max:255',
                    $this->getCustomRules("checkEditRepeat")
                ],
                'description' => "required|String|min:6",
            ],

            //删除角色
            "admin/roles/del" => [
                'id' => "required|Integer|min:1"
            ],

        ];
    }


    /**
     * 自定义规则
     */
    protected function makeCustomRules(): void
    {
        $this->setCustomRules("checkAddRepeat", function ($attribute, $value, $fail) {
            if (Role::getOne(["name" => $value])) {
                $fail($value.' 已存在。');
            }
        });

        $request = $this->request;
        $this->setCustomRules("checkEditRepeat", function ($attribute, $value, $fail)
        use ($request) {
            if (Role::getOne(["name" => $value, "id" => ["<>", $request->id]])) {
                $fail($value.' 已存在。');
            }
        });
    }
}