<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product ;
use App\Order ;

class OrderProduct extends Model
{

 protected $fillable =['order_id','product_id'];


    public function product()
    {
        return $this -> belongsTo(Product::class);
    }

    public function order()
    {
        return $this -> belongsTo(Order::class);
    }
}
