<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\Redis;

/**
 * Class IndexController
 * @package App\Http\Controllers\Home
 */
class IndexController extends CommonController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $redis = new Redis();
//        dd($redis::keys("*"));


        $menus = $this->getMenu();
        $data = $this->totalPrice(\Auth::guard('web')->id());

        return view('home.index.Index', compact('menus', 'data'));
    }
}
