<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
        	[
        		[
	            'name' => 'Le Vien Thuong',
	            'email' => 'levienthuong@gmail.com',
	            'password' => bcrypt('123123'),
	            'level'=>1,
	            'username'=>'admin',
	            'phone'=> '0935579194',
	            'address'=>'446 Nguyen Luong Bang - TP Da Nang'
	            ],
	            [
	            'name' => 'Nguyen Tu Quang',
	            'email' => 'quangnguyen@gmail.com',
	            'password' => bcrypt('123123'),
	            'level'=>2,
	            'username'=>'mod',
	            'phone'=> '0977123123',
	            'address'=>'123 Hoang Hoa Tham - TP Nha Trang'
	            ],
	            [
	            'name' => 'Nope',
	            'email' => 'nope@gmail.com',
	            'password' => bcrypt('123123'),
	            'level'=>3,
	            'username'=>'member',
	            'phone'=> '01212432423',
	            'address'=>'239 Phan Chau Trinh - TP Ha Noi'
	            ],
	            [
	            'name' => 'Le Mem Bo',
	            'email' => 'member@gmail.com',
	            'password' => bcrypt('123123'),
	            'level'=>3,
	            'username'=>'othermember',
	            'phone'=> '0979123435',
	            'address'=>'854 Phan Boi Chau - TP Ho Chi Minh'
	            ]
        	]
        );
    }
}
