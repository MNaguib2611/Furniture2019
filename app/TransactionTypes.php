<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\DebitedTransaction;
use App\CreditedTransaction;


class TransactionTypes extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['name'];



    // public function debitedTransactions()
    // {
    //     // return $this->belongsTo('App\DebitedTransaction', 'transactionType_id');
    //     // return $this->hasMany(DebitedTransaction::class,'id');


    // }

    // public function creditedTransactions()
    // {

    //     return $this->belongsTo('App\CreditedTransaction', 'transactionType_id');
    // }
}
