<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('orders')->insert(
          [
          [
          'fullname'=>'Le Vien Thuong',
          'username'=>'admin',
          'useraddress'=>'446 Nguyen Luong Bang TP Da Nang',
          'userphone'	=> '0935579194',
          'moreinfo'=>'Fast Please',
          'useremail'=>$faker->email,
          'amount'=>27000000,
          'status'=>2,
          'payment_id'=>2
          ],
          [
          'fullname'=>$faker->name,
          'username'=>'Guest',
          'useraddress'=>$faker->address,
          'userphone' => $faker->phoneNumber,
          'moreinfo'=>$faker->realText(100),
          'useremail'=>$faker->email,
          'amount'=>$faker->numberBetween(1,280)*100000,
          'status'=>$faker->numberBetween(0,2),
          'payment_id'=>$faker->numberBetween(1,3)
          ],
          [
          'fullname'=>$faker->name,
          'username'=>'Guest',
          'useraddress'=>$faker->address,
          'userphone' => $faker->phoneNumber,
          'moreinfo'=>$faker->realText(100),
          'useremail'=>$faker->email,
          'amount'=>$faker->numberBetween(1,280)*100000,
          'status'=>$faker->numberBetween(0,2),
          'payment_id'=>$faker->numberBetween(1,3)
          ],
          [
          'fullname'=>$faker->name,
          'username'=>'Guest',
          'useraddress'=>$faker->address,
          'userphone' => $faker->phoneNumber,
          'moreinfo'=>$faker->realText(100),
          'useremail'=>$faker->email,
          'amount'=>$faker->numberBetween(1,280)*100000,
          'status'=>$faker->numberBetween(0,2),
          'payment_id'=>$faker->numberBetween(1,3)
          ],
          [
          'fullname'=>$faker->name,
          'username'=>'admin',
          'useraddress'=>$faker->address,
          'userphone' => $faker->phoneNumber,
          'moreinfo'=>$faker->realText(100),
          'useremail'=>$faker->email,
          'amount'=>$faker->numberBetween(1,280)*100000,
          'status'=>$faker->numberBetween(0,2),
          'payment_id'=>$faker->numberBetween(1,3)
          ],
          [
          'fullname'=>$faker->name,
          'username'=>'mod',
          'useraddress'=>$faker->address,
          'userphone' => $faker->phoneNumber,
          'moreinfo'=>$faker->realText(100),
          'useremail'=>$faker->email,
          'amount'=>$faker->numberBetween(1,280)*100000,
          'status'=>$faker->numberBetween(0,2),
          'payment_id'=>$faker->numberBetween(1,3)
          ],
          [
          'fullname'=>'Tran Van Hoang',
          'username'=>'Guest',
          'useraddress'=>'238 Tran Van Linh TP Ha Tinh',
          'userphone'	=> '0123332123',
          'moreinfo'=>'Nothing',
          'useremail'=>$faker->email,
          'amount'=>$faker->numberBetween(1,280)*100000,
          'status'=>1,
          'payment_id'=>1
          ],
          [
          'fullname'=>'John Doe',
          'username'=>'Guest',
          'useraddress'=>'954 Ninh Ton TP Ha Long',
          'userphone'	=> '092512321',
          'moreinfo'=>'.....',
          'useremail'=>$faker->email,
          'amount'=>$faker->numberBetween(1,280)*100000,
          'status'=>0,
          'payment_id'=>2
          ],
          ]
          );
    }
}
