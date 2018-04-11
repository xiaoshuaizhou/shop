<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //订单列表
    public function index()
    {
        return view('home.order.index');
    }

    //收银台
    public function check()
    {
        return view('home.order.check');
    }
}
