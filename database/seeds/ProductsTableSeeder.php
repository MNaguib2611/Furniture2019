<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create(['name'=>'product1','description'=>'dsadadreterteraa','price'=>'111']);
        Product::create(['name'=>'product2','description'=>'dsadadaretretera','price'=>'222']);
        Product::create(['name'=>'product3','description'=>'dsadaretretdaa','price'=>'333']);
        Product::create(['name'=>'product4','description'=>'dsadadaaergbb7','price'=>'444']);
        Product::create(['name'=>'product5','description'=>'dsadadatrytryra','price'=>'555']);
        Product::create(['name'=>'product6','description'=>'dsadadartytryrtya','price'=>'666']);
        Product::create(['name'=>'product7','description'=>'dsadadaasdwgtnmuyjhtra','price'=>'777']);
        Product::create(['name'=>'product8','description'=>'dsadasdsadadaa','price'=>'888']);

    }
}
