<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        DB::table('categories')->insert(
        	[
                ['name' => 'Iphone', 'slug'=>'iphone'],
                ['name' => 'Nokia', 'slug'=>'nokia'],
                ['name' => 'Sam sung', 'slug'=>'sam-sung'],
                ['name' => 'Oppo', 'slug'=>'oppo'],
                ['name' => 'Vivo', 'slug'=>'vivo'],
                ['name' => 'HTC', 'slug'=>'htc'],
                ['name' => 'Sony', 'slug'=>'sony']            
	        ]
	    );
    }
}
