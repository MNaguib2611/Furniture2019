<?php

use Illuminate\Database\Seeder;
use App\TransactionTypes;
class TransactionTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransactionTypes::create(['name' => "بنك" , 'color' =>'#90EE90']);
        TransactionTypes::create(['name' => "عميل", 'color' =>'#add8e9']);
        TransactionTypes::create(['name' => "مورد", 'color' =>'#ffb6c1']);
        TransactionTypes::create(['name' => "مرافق", 'color' =>'#ffa500']);
    }
}
