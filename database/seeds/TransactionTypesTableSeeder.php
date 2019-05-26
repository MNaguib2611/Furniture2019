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
        TransactionTypes::create(['name' => "بنك"]);
        TransactionTypes::create(['name' => "عميل"]);
        TransactionTypes::create(['name' => "مورد"]);
        TransactionTypes::create(['name' => "مرافق"]);
    }
}
