<?php

use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('order_details')->insert(
         	[
         		[
         			'product_id'=>2,
         			'quantity'=>1,
         			'order_id'=>1
         		],
         		[
         			'product_id'=>3,
         			'quantity'=>5,
         			'order_id'=>1
         		],
         		[
         			'product_id'=>3,
         			'quantity'=>2,
         			'order_id'=>2
         		],
         		[
         			'product_id'=>2,
         			'quantity'=>5,
         			'order_id'=>3
         		],
         		[
         			'product_id'=>1,
         			'quantity'=>2,
         			'order_id'=>2
         		]
         	]
         );
    }
}
