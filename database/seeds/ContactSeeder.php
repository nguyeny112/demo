<?php

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert(
        	[
        		[
        			'contact_phone'=>'123123',
		        	'contact_email'=>'levienthuong@gmail.com',
		        	'contact_title'=>'Invite To The party',
		        	'contact_name'=>'Doe John',
		        	'contact_detail'=>'Something Here'
        		],
        		[
        			'contact_phone'=>'123123',
		        	'contact_email'=>'aeqweqwe@gmail.com',
		        	'contact_title'=>'May I Ask you Something?',
		        	'contact_name'=>'Linh Le',
		        	'contact_detail'=>'Others......'
        		],
        		[
        			'contact_phone'=>'123123',
		        	'contact_email'=>'123123@gmail.com',
		        	'contact_title'=>'Just a little question',
		        	'contact_name'=>'Van Nguyen',
		        	'contact_detail'=>'Well.....'
        		],
        		[
        			'contact_phone'=>'123123',
		        	'contact_email'=>'tranluong@gmail.com',
		        	'contact_title'=>'Dear Sir, Can you do me a favour',
		        	'contact_name'=>'Luong Tran',
		        	'contact_detail'=>'Just make it easier'
        		],
        	]
        	
        );
    }
}
