<?php

use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('payments')->insert(
         	[
         		[
         			'payment_name'=>'Bảo Kim',
         			'payment_info'=>''	
         		],
         		[
         			'payment_name'=>'COD',
         			'payment_info'=>''	
         		],
         		[
         			'payment_name'=>'ATM',
         			'payment_info'=>''	
         		]
         	]
         );
    }
}
