<?php

use Illuminate\Database\Seeder;
use App\Customer;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create(['name'=>'customer1','phone'=>'111','email'=>'','address'=>'شارع 11']);
        Customer::create(['name'=>'customer2','phone'=>'222','email'=>'test2@test.com','address'=>'شارع 22']);
        Customer::create(['name'=>'customer3','phone'=>'333','email'=>'test3@test.com','address'=>'شارع 33']);
        Customer::create(['name'=>'customer4','phone'=>'444','email'=>'test4@test.com','address'=>'شارع 44']);
    }
}
