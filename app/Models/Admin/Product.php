<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = ['cateid', 'title', 'descr', 'num', 'price', 'cover', 'pics', 'issale', 'ishot', 'istui', 'saleprice', 'ison'];
}
