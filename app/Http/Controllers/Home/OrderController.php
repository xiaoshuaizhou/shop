<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\OrderRequest;
use App\Reposities\Home\OrderResposity;

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

    /**
     * 订单列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $res = $this->getMenu();
        $data = $this->totalPrice(\Auth::guard('web')->id());

        return view('home.order.index' , compact('res', 'data'));
    }

    /**
     * 收银台
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function check()
    {
        $res = $this->getMenu();
        $data = $this->totalPrice(\Auth::guard('web')->id());

        return view('home.order.check' , compact('res', 'data'));
    }

    /**
     * 新增订单
     * @param \App\Http\Requests\OrderRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function add(OrderRequest $request)
    {
       $res = $this->orderReposity->create($request->all());
        if ($res){
            return redirect('/order/check');
        }else{

            return redirect()->back();
        }
    }
}
