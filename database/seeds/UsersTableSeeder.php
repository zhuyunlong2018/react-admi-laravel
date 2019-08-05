<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 4,
                'name' => '张珊',
                'password' => NULL,
                'mobile' => '234324',
                'age' => 50,
                'position' => NULL,
                'job' => NULL,
            ),
            1 => 
            array (
                'id' => 6,
                'name' => '张思',
                'password' => NULL,
                'mobile' => '42342',
                'age' => 20,
                'position' => NULL,
                'job' => NULL,
            ),
            2 => 
            array (
                'id' => 7,
                'name' => 'admin1',
                'password' => '$2y$10$fWFJoKKbU.Vb10.WQovqTOmiyPUP5H8FxhXWkoanIwjwFfauzueO.',
                'mobile' => NULL,
                'age' => 0,
                'position' => NULL,
                'job' => NULL,
            ),
            3 => 
            array (
                'id' => 9,
                'name' => '34放大',
                'password' => NULL,
                'mobile' => '6595',
                'age' => 50,
                'position' => NULL,
                'job' => NULL,
            ),
            4 => 
            array (
                'id' => 10,
                'name' => '发的发',
                'password' => NULL,
                'mobile' => '4545643',
                'age' => 24,
                'position' => NULL,
                'job' => NULL,
            ),
            5 => 
            array (
                'id' => 11,
                'name' => NULL,
                'password' => '$2y$10$1nwg4flES6hZpt/.3w7W7OdtrWTf/jIatuHm7cVZ1A8GTA4c/R.OW',
                'mobile' => NULL,
                'age' => 0,
                'position' => NULL,
                'job' => NULL,
            ),
        ));
        
        
    }
}