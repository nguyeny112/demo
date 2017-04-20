<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert(
        	[
        		[
	            'brand_name' => 'Apple',
	            'brand_desc' => 'Apple Description'
	            ],
	            [
	            'brand_name' => 'Samsung',
	            'brand_desc' => 'Samsung Description'
	            ],
	            [
	            'brand_name' => 'LG',
	            'brand_desc' => 'LG Description'
	            ],
	            [
	            'brand_name' => 'Nokia',
	            'brand_desc' => 'Nokia Description'
	            ],
	            [
	            'brand_name' => 'Asus',
	            'brand_desc' => 'Asus Description'
	            ],
	            [
	            'brand_name' => 'Xiaomi',
	            'brand_desc' => 'Xiaomi Description'
	            ],
	            [
	            'brand_name' => 'Others',
	            'brand_desc' => 'Others Description'
	            ],
        	]
        );
    }
}
