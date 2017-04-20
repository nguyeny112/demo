<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('categories')->insert(
        	[
        		[
	            'cat_name' => 'Smartphone',
	            'cat_desc' => 'Smartphone Description'
	            ],
	            [
	            'cat_name' => 'Tablet',
	            'cat_desc' => 'Tablet Description'
	            ],
	            [
	            'cat_name' => 'Smart Watch',
	            'cat_desc' => 'Smart Watch Description'
	            ],
	            [
	            'cat_name' => 'Other Smart Devices',
	            'cat_desc' => 'Other Smart Devices Description'
	            ],
	            [
	            'cat_name' => 'Accesories',
	            'cat_desc' => 'Accesories Description'
	            ],
        	]
        );
    }
}
