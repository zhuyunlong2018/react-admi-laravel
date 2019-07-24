<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/24
 * Time: 14:08
 */

namespace App\Validator;


use App\Models\Menu;
use Illuminate\Http\Request;

class MenuValidator extends BaseValidator
{

    public function __construct(string $uri, Request $request)
    {
        parent::__construct($uri, $request);

        $this->attributes = [

        ];

        $this->message = [
            'required' => ':attribute 为必填项',
        ];

        $this->rules = [

            //获取所有菜单列表
            "admin/menus/getMenus" => [
                'page' => 'required|Integer|min:1',
                'pageSize' => 'required|Integer|min:1',
            ],

            //添加菜单
            "admin/menus/add" => [],

            //编辑菜单
            "admin/menus/edit" => [],

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