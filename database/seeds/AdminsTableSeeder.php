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
                'password' => '$2y$10$LE6WRHd1jnxuMVwI7n21/Odk8URlnVajlnFKTsSqis/MC2lSzy6OW',
                'description' => 'super administrator',
                'status' => 1,
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'guester',
                'password' => NULL,
                'description' => 'a guester',
                'status' => 1,
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'guester1',
                'password' => NULL,
                'description' => 'other guester',
                'status' => 1,
            ),
        ));
        
        
    }
}