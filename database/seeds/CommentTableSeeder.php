<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comment')->delete();
        DB::table('comment')->insert(
        	[
        		[
                    'prdid' => '4',
                    'name' => 'Administrator',
                    'detail' => 'San pham tot',
                    'mail' => 'admin@gmail.com',
                ],
                [
                    'prdid' => '5',
                    'name' => 'Khach 1',
                    'detail' => 'San pham tot',
                    'mail' => 'Khach1@gmail.com',
                ],
                [
                    'prdid' => '6',
                    'name' => 'Do Van Toan',
                    'detail' => 'San pham tot',
                    'mail' => 'toandv11@gmail.com',
                ],
	        ]
	    );
    }
}
