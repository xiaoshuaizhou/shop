<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

/**
 * Class Cart
 * @package App\Models\Home
 */
class Cart extends Model
{
    /**
     * @var string
     */
    protected $table = 'cart';
    /**
     * @var array
     */
    protected $fillable = ['cartid', 'productid', 'productnum', 'price','userid'];

    /**
     * 根据updated_at 更新缓存
     * @return string
     */
    public function cacheKey()
    {
        return sprintf(
            "%s/%s-%s",
            $this->getTable(),
            $this->getKey(),
            $this->updated_at->timestamp
        );
    }

    /**
     * 获取缓存中的购物车数据
     * @return mixed
     */
    public function getCachedProductsAttribute()
    {
        $key = 'product';
        return Cache::remember($this->cacheKey() . ":{$key}", 1, function () {
            return $this->with('product')->get();
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Admin\Product', 'productid', 'productid');
    }
}
