<?php
/**
 * Created by PhpStorm.
 * User: ZhuYunLong2018
 * Email: 920200256@qq.com
 * Date: 2019/7/24
 * Time: 14:08
 */

namespace App\Validator;


use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MenuValidator extends BaseValidator
{

    public function __construct(string $uri, Request $request)
    {
        parent::__construct($uri, $request);

        $this->attributes = [
            "local" => "国际化",
            "text" => "名称",
            "icon" => "图标",
            "code" => "API编码",
            "type" => "类型",
        ];

        $this->message = [
            'required' => ':attribute 为必填项',
            'max' => ':attribute 长度不能大于255',
            "in" => ':attribute 参数出错',
        ];

        $this->rules = [

            //添加菜单
            "admin/menus/add" => [
                "local" => "max:255",
                "path" => "max:255",
                "target" => "max:255",
                "icon" => "max:255",
                "text" => "required|String|max:255",
                "code" => "max:255",
                "type" => [
                    "required",
                    Rule::in([1, 2])
                ],
            ],

            //编辑菜单
            "admin/menus/edit" => [
                "key" => "required|String",
                "local" => "max:255",
                "path" => "max:255",
                "target" => "max:255",
                "icon" => "max:255",
                "text" => "required|String|max:255",
                "code" => "max:255",
                "type" => [
                    "required",
                    Rule::in([1, 2])
                ],
            ],

            //删除菜单
            "admin/menus/del" => [
                "id" => [
                    "required",
                    'Integer',
                    'min:1',
                    $this->getCustomRules("hasChildren"),
                ]
            ],

        ];
    }

    /**
     * 自定义规则在此地方注册
     * @param $request
     * @throws \App\Exceptions\DevException
     */
    protected function makeCustomRules($request): void
    {
        //检查删除的角色是否为超级管理员
        $this->setCustomRules("hasChildren", function ($attribute, $value, $fail) {
            $menu =  Menu::with("children")->find($value);
            if (count($menu->children) > 0) {
                $fail('该菜单存在下级菜单，无法删除！');
            }
        });
    }
}