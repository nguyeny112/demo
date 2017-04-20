<?php

use Illuminate\Database\Seeder;

class AdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advertisements')->insert(
        	[
        		[
        			'ads_link'=>'http://google.com',
		        	'ads_desc'=>'This is Google',
		        	'ads_title'=>'Google.com',
		        	'ads_image'=>'advert/ad1.gif'
        		],
        		[
        			'ads_link'=>'http://facebook.com',
		        	'ads_desc'=>'This is Facebook',
		        	'ads_title'=>'Facebook.com',
		        	'ads_image'=>'advert/ad2.gif'
        		],
        		[
        			'ads_link'=>'http://twitter.com',
		        	'ads_desc'=>'This is Twitter',
		        	'ads_title'=>'Twitter.com',
		        	'ads_image'=>'advert/ad3.gif'
        		]
        	]
        	
        );
    }
}
