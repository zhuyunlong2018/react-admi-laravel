<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin2',
                'description' => '超级管理员1',
                'permissions' => ',antDesign,document,201907170951063dTU7,menus,codeGenerator,ajax,user,role,component,/example/antd/operator,/example/antd/async-select,/example/antd/user-avatar,/example/antd/tool-bar,/example/antd/table-row-draggable,/example/antd/table-editable,/example/antd/query-item,/example/antd/form-element,/example/antd/query-bar,/example/antd/pagination,page404,user-center,',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'guester',
                'description' => '客人角色',
                'permissions' => 'antDesign,document,201907170951063dTU7,menus,codeGenerator,ajax,user,role,page404,user-center,,',
            ),
        ));
        
        
    }
}