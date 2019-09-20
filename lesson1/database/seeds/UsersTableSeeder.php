<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users= [

        	[
        		'name'=>'Le van Bac',
        		'email'=>'baclvph06267@fpt.edu.vn',
        		'password'=> bcrypt('123456'),
        	],
        	[
        		'name'=>'Le Van Hai',
        		'email'=>'hailvph06267@fpt.edu.vn',
        		'password'=> bcrypt('123456'),
        	],
        	[
        		'name'=>'Tran Thanh Son',
        		'email'=>'sontsph06267@fpt.edu.vn',
        		'password'=> bcrypt('123456'),
        	],
        	[
        		'name'=>'Tang ba huy',
        		'email'=>'huytbph06267@fpt.edu.vn',
        		'password'=> bcrypt('123456'),
        	],
        ];
        DB::table('users')->insert($users);
    }
}
