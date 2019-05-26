<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Order ;
use App\OrderProduct ;

class Product extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['name','price','description'];


    public function order()
    {
        return $this -> hasOne(Order::class);
    }

    public function orderProduct()
    {
        return $this -> hasOne(OrderProduct::class);
    }
}
