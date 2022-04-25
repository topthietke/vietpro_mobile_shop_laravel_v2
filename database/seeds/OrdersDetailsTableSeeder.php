<?php

use Illuminate\Database\Seeder;

class OrdersDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_detail')->delete();
        DB::table('order_detail')->insert(
        	[
                //user_pass
                [
                'prdid'=>'4',
                'ordid'=>'1',
                'quantity' => '2',
                'price' => '3000000',
                ],
                [
                'prdid'=>'5',
                'ordid'=>'2',
                'quantity' => '1',
                'price' => '3000000',
                ],
                [
                'prdid'=>'6',
                'ordid'=>'3',
                'quantity' => '1',
                'price' => '3000000',
                ],
                [
                'prdid'=>'5',
                'ordid'=>'4',
                'quantity' => '1',
                'price' => '3000000',
                ],

            ]
	    );
    }
}
