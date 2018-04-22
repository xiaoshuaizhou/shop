<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\OrderRequest;
use App\Models\Home\Order;
use App\Reposities\Home\OrderResposity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends CommonController
{
    public $orderReposity;

    /**
     * OrderController constructor.
     * @param OrderResposity $orderResposity
     */
    public function __construct(OrderResposity $orderResposity)
    {
        $this->middleware('auth');
        $this->orderReposity = $orderResposity;
    }
    //订单列表
    public function index()
    {
        $res = $this->getMenu();
        $data = $this->totalPrice(\Auth::guard('web')->id());

        return view('home.order.index' , compact('res', 'data'));
    }

    //收银台
    public function check()
    {
        return view('home.order.check');
    }

    /**
     * @param OrderRequest $request
     * @throws \Exception
     * @throws \Throwable
     */
    public function add(OrderRequest $request)
    {
       $this->orderReposity->create($request->all());
        dd($request->all());
    }
}
