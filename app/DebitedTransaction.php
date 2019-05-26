<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Order ;
use App\TransactionTypes ;

class DebitedTransaction extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['amount','transactionType_name'];

    public function transactionType()
    {
        // return $this->hasOne('App\TransactionTypes', 'id');
        return $this->belongsTo(TransactionTypes::class,'id');
    }
}
