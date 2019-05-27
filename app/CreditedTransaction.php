<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Order ;
use App\TransactionTypes ;



class CreditedTransaction extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['amount','transactionType_name','transactionType_color'];



    public function order()
    {
        return $this -> hasOne(Order::class);
    }

    // public function transactionType()
    // {
    //     return $this->belongsTo('App\TransactionTypes');
    // }

}
