<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admins')->delete();
        
        \DB::table('admins')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'password' => '$2y$10$fWFJoKKbU.Vb10.WQovqTOmiyPUP5H8FxhXWkoanIwjwFfauzueO.',
                'description' => 'administrator',
                'status' => 1,
            ),
        ));
        
        
    }
}