<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'orderdetail';

    protected $fillable = ['productid', 'price', 'orderid', 'productnum'];

    public function product()
    {
        return $this->belongsTo('App\Models\Admin\Product', 'productid', 'productid');
    }
}
