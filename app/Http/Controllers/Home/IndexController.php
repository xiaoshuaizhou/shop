<?php

namespace App\Http\Controllers\Home;
use App\Models\Kafka;
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

        $kafka = new Kafka();
        $kafka->send(['this is indexController laravel']);

        $menus = $this->getMenu();
        $data = $this->totalPrice(\Auth::guard('web')->id());

        return view('home.index.Index', compact('menus', 'data'));
    }
}
