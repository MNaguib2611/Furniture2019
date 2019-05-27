<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Customer ;
use App\Product ;
use App\OrderProduct ;
use App\DebitedTransaction;
use App\CreditedTransaction;
class Order extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['customer_id','delivery_time','credited_transaction_id','total_price','notes'];

    public function creditedTransaction()
    {
        return $this -> hasOne(CreditedTransaction::class);
    }

    public function customer()
    {
        return $this -> belongsTo(Customer::class);
    }
    public function product()
    {
        return $this -> hasMany(Product::class);
    }

    public function orderProduct()
    {
        return $this -> hasMany(OrderProduct::class);
    }
}
