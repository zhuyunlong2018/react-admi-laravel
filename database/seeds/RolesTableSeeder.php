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
                'permissions' => ',antDesign,201907170951063dTU7,page404,user-center,,20190723084241uiICM,20190723084122gyCde,20190723084159fLDHF,201907230842164oAoV,20190723082846xWoCb,201907230830210nfjm,20190723083046Q5vlg,20190723083110yDnSt,20190723084433waZVb,20190723084410Vc0mS,20190723084352wt739,20190723084318EB6qP,20190723084637plJI3,20190723084618TdB37,20190723084525MKB1c,20190723084458WNAR8,20190718090554vTy5a,menus,20190722021436W09iP,user,role,,,document,/example/antd/async-select,/example/antd/form-element,/example/antd/operator,/example/antd/pagination,/example/antd/query-bar,/example/antd/query-item,/example/antd/table-editable,/example/antd/table-row-draggable,/example/antd/tool-bar,/example/antd/user-avatar,codeGenerator,ajax,component,',
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