<?php

use Illuminate\Database\Seeder;

class FeaturedSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('featured_sliders')->insert(
        	[
        		[
        			'image_path' => 'slide/slide1.jpg',
        			'title' => 'Xiaomi Lastest Smartphone Model',
        			'desc' => 'Finally Released! Check it out now!',
        			'link' => 'http://link1',
	            ],
	            [
        			'image_path' => 'slide/slide2.jpg',
        			'title' => 'Iphone 7 Best Price',
        			'desc' => 'Only available in SMP Shop, shocking price',
        			'link' => 'http://link2',
	            ],
	            [
        			'image_path' => 'slide/slide3.jpg',
        			'title' => 'Ipad 3 - Grab One for you now',
        			'desc' => 'Brandnew, the must have devices for any family',
        			'link' => 'http://link3',
	            ],
	            [
        			'image_path' => 'slide/slide4.jpg',
        			'title' => 'Motorola 360',
        			'desc' => 'A beautiful smartwatch, modern but still classic',
        			'link' => 'http://link4',
	            ],
        	]
        );
    }
}
