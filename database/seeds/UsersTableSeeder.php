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
        DB::table('users')->delete();
        DB::table('users')->insert(
        	[
                //pass
                [
                'id' => 1,
                'full' => 'Administrator',
                'password'=> bcrypt('123456'),
                'address' => 'Hà Nội',
                'email' => 'admin@gmail.com',
                'phone' => '012345678',
                'gender' => '0',
                'level' => '0',
                'status' => '0'
                ],
                [
                'id' => 2,
                'full' => 'Admin',
                'password'=>bcrypt('123456'),
                'address' => 'Hà Nội',
                'email' => 'ngoctusoftware@gmail.com',
                'phone' => '012345678',
                'gender' => '0',
                'level' => '0',     
                'status' => '0'           
                ],
            ]
	    );
    }
}
