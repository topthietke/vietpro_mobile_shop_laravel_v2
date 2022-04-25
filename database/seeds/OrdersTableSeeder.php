<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->delete();
        DB::table('orders')->insert(
        	[
                //user_pass
                [
                'cusid'=>'1',
                'total' => '3000000',
                'state' => '1'
                ],
                [
                'cusid'=>'2',
                'total' => '3000000',
                'state' => '1'
                ],
                [
                'cusid'=>'3',
                'total' => '3000000',
                'state' => '0'
                ],
                [
                'cusid'=>'4',
                'total' => '3000000',
                'state' => '0'
                ],
                [
                'cusid'=>'5',
                'total' => '3000000',
                'state' => '0'
                ],
            ]
	    );
    }
}
