<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * Class Product
 * @package App\Models\Admin
 */
class Product extends Model
{
    use Searchable;
    /**
     * @var string
     */
    protected $primaryKey = 'productid';
    /**
     * @var string
     */
    protected $table = 'product';

    /**
     * @var array
     */
    protected $fillable = ['cateid', 'title', 'descr', 'num', 'price', 'cover', 'pics', 'issale', 'ishot', 'istui', 'saleprice', 'ison'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function details()
    {
        return $this->hasMany('App\Models\Home\OrderDetail', 'productid', 'productid');
    }

    /**
     * 定义索引里的type值
     * @return string
     */
    public function searcheableAs()
    {
        return "product";
    }

    /**
     * 定义那些字段需要搜索
     * @return array
     */
    public function searchableArray()
    {
        return [
            'title' => $this->title,
            'descr' => $this->descr
        ];
    }
}
