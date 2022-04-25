<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('customers')->delete();
        DB::table('customers')->insert(
        	[
                //pass
                [
                'id' => 1,
                'fullname' => 'Nguyen Van A',
                'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'address' => 'Hà Nội',
                'email' => 'Khach1@gmail.com',
                'phone' => '012345678',
                'gender' => '0'
                ],
                [
                'id' => 2,
                'fullname' => 'Nguyen Van B',
                'pass'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'address' => 'Hà Nội',
                'email' => 'Khach2@gmail.com',
                'phone' => '012345678',
                'gender' => '1',
                ],
                [
                'id' => 3,
                'fullname' => 'Nguyen Van C',
                'pass'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'address' => 'Hà Nội',
                'email' => 'Khach3@gmail.com',
                'phone' => '012345678',
                'gender' => '1',
                ],
                [
                'id' => 4,
                'fullname' => 'Nguyen Van A',
                'pass'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'address' => 'Hà Nội',
                'email' => 'Khach4@gmail.com',
                'phone' => '012345678',
                'gender' => '0',
                ],
                [
                'id' => 5,
                'fullname' => 'Nguyen Van B',
                'pass'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'address' => 'Hà Nội',
                'email' => 'Khach5@gmail.com',
                'phone' => '012345678',
                'gender' => '1',
                ],
                [
                'id' => 6,
                'fullname' => 'Nguyen Van C',
                'pass'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'address' => 'Hà Nội',
                'email' => 'Khach6@gmail.com',
                'phone' => '012345678',
                'gender' => '0',
                ],

            ]
	    );
    }
}
