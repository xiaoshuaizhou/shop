<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends CommonController
{
    //订单列表
    public function index()
    {
        $res = $this->layout();

        return view('home.order.index' , compact('res'));
    }

    //收银台
    public function check()
    {
        return view('home.order.check');
    }
}
