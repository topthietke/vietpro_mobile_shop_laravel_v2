<?php

use Illuminate\Database\Seeder;

class MailConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mail_config')->delete();
        DB::table('mail_config')->insert(
        	[
                //user_pass
                [
                'server'=>'pop3.gmail.com',
                'username'=>'abcd',
                'password' => '12334567889',
                'smtp' => '465',
                'tcp' => '',
                'from' => 'topthietke.com@gmail.com',
                'sendCC' => 'ngoctusoftware@gmail.com',
                'smtp' => 'Test mail',
                'subject' => 'Test mail',
                'content' => 'Chung toi test mail'

                ],


            ]
	    );
    }
}
