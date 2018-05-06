<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class Product extends Model
{
    use Searchable;
    protected $primaryKey = 'productid';
    protected $table = 'product';

    protected $fillable = ['cateid', 'title', 'descr', 'num', 'price', 'cover', 'pics', 'issale', 'ishot', 'istui', 'saleprice', 'ison'];

    public function details()
    {
        return $this->hasMany('App\Models\Home\OrderDetail', 'productid', 'productid');
    }
    //定义索引里的type值
    public function searcheableAs()
    {
        return "product";
    }
    //定义那些字段需要搜索
    public function searchableArray()
    {
        return [
            'title' => $this->title,
            'descr' => $this->descr
        ];
    }
}
