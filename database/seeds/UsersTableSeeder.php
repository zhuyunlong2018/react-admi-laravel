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
                'id' => 5,
                'name' => '对对对',
                'password' => NULL,
                'mobile' => '234324',
                'age' => 50,
                'position' => NULL,
                'job' => NULL,
            ),
            2 => 
            array (
                'id' => 6,
                'name' => '张思',
                'password' => NULL,
                'mobile' => '42342',
                'age' => 20,
                'position' => NULL,
                'job' => NULL,
            ),
            3 => 
            array (
                'id' => 7,
                'name' => 'admin',
                'password' => '$2y$10$fWFJoKKbU.Vb10.WQovqTOmiyPUP5H8FxhXWkoanIwjwFfauzueO.',
                'mobile' => NULL,
                'age' => 0,
                'position' => NULL,
                'job' => NULL,
            ),
            4 => 
            array (
                'id' => 8,
                'name' => 'test',
                'password' => '$2y$10$fWFJoKKbU.Vb10.WQovqTOmiyPUP5H8FxhXWkoanIwjwFfauzueO.',
                'mobile' => NULL,
                'age' => 0,
                'position' => NULL,
                'job' => NULL,
            ),
        ));
        
        
    }
}