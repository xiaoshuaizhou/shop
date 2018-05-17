<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\Cart;
use App\Reposities\Admin\CategoryReposity;
use Illuminate\Support\Facades\Cache;

class CommonController extends Controller
{
    /**
     * 查询所有分类，两级
     * @return array
     */
    public static function getMenu()
    {
        $key = 'menu';
        return Cache::remember($key, 2 * 60, function () {
            return CategoryReposity::getMenu();
        });
    }

    /**
     * @return array
     */
    public function layout()
    {
        return  CategoryReposity::getMenu();
    }

    /**
     * 购物车总价 种类
     * @param $userid
     * @return array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|static[]
     */
    public function totalPrice($userid)
    {
        return  Cart::where('userid','=', $userid)->with('product')->get();
    }

}
