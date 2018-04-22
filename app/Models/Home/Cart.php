<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Admin\Product', 'productid', 'productid');
    }
}
