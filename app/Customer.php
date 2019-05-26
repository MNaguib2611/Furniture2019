<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Order ;


class Customer extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['name','phone','email','address'];

    public function order()
    {
        return $this -> hasMany(Order::class);
    }
}
