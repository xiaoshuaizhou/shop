<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $fillable = ['cartid', 'productid', 'productnum', 'price','userid'];
}
