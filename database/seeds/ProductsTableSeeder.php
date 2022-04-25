<?php

use Illuminate\Database\Seeder;
use DB as DBS;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->delete();
        DB::table('products')->insert(
        	[
                //user_pass
                [
                'name'=>'Nokia A2',
                'code' => 'NK002',
                'image' => 'Nokia-1-red.png',
                'price' => '600000',
                'warrnty' => '12',
                'slug' => 'nokia-a9',
                'new' => '100%',
                'promotion' =>'Dán cường lực 4D',
                'status' => '1',
                'featured' => '1',
                'details' => 'san pham doc quyen cua nokia',
                'catid' => '1'
                ],
                [
                'name'=>'Nokia A3',
                'code' => 'NK003',
                'image' => 'Nokia-1-red.png',
                'price' => '600000',
                'warrnty' => '12',
                'slug' => 'nokia-a9',
                'new' => '100%',
                'promotion' =>'Dán cường lực 4D',
                'status' => '1',
                'featured' => '1',
                'details' => 'san pham doc quyen cua nokia',
                'catid' => '2'
                ],
                [
                'name'=>'Nokia A4',
                'code' => 'NK004',
                'image' => 'Nokia-1-red.png',
                'price' => '600000',
                'warrnty' => '12',
                'slug' => 'nokia-a9',
                'new' => '100%',
                'promotion' =>'Dán cường lực 4D',
                'status' => '1',
                'featured' => '1',
                'details' => 'san pham doc quyen cua nokia',
                'catid' => '3'
                ],
            ]
	    );
    }
}
