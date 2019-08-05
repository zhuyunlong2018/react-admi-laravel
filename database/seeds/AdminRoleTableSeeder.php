<?php

use Illuminate\Database\Seeder;

class AdminRoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_role')->delete();
        
        \DB::table('admin_role')->insert(array (
            0 => 
            array (
                'admin_id' => 1,
                'role_id' => 1,
            ),
            1 => 
            array (
                'admin_id' => 3,
                'role_id' => 2,
            ),
            2 => 
            array (
                'admin_id' => 4,
                'role_id' => 2,
            ),
        ));
        
        
    }
}