<?php

use Illuminate\Database\Seeder;

class ThemeOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('theme_options')->insert(
        	[
        		[
        			'pagename' => 'SMPShop',
        			'phoneNumber' => '0935579194',
        			'pageTitle' => 'SMP Shop - Buying Online was never so easy',
        			'email' => 'levienthuong@gmail.com',
        			'address' => '54 Ninh Ton - TP Da Nang, Viet Nam',
	            ],
        	]
        );
    }
}
