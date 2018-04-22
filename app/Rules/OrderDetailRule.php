<?php

namespace App\Rules;

use App\Http\Requests\OrderDetailResquest;
use Illuminate\Contracts\Validation\Rule;

class OrderDetailRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (!is_array($value)) return false;
        foreach($value as $k => $item){
            if (!key_exists('price', $item)) return false;
            if (!key_exists('productid', $item)) return false;
            if (!key_exists('productnum', $item)) return false;
            if ($value[$k]['price'] < 0.0 || !is_numeric($value[$k]['price'])) return false;
            if ($value[$k]['productid'] < 1 || !is_numeric($value[$k]['productid'])) return false;
            if ($value[$k]['productnum'] < 1 || !is_numeric($value[$k]['productnum'])) return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '订单参数错误';
    }
}
