<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\OrderRequest;
use App\Models\Admin\Product;
use App\Models\Home\Address;
use App\Models\Home\Express;
use App\Models\Home\Order;
use App\Models\Home\OrderDetail;
use App\Models\Home\Pay;
use App\Reposities\Home\OrderResposity;
use Illuminate\Http\Request;

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function check(Request $request)
    {
        $orderid = $request->get('orderid');
        $order = Order::where('orderid', $orderid)->first();
        if ($order->status != Order::CREATEORDER && $order->status != Order::CHECKORDER){
            return redirect('order/index');
        }
        $userid = \Auth::guard('web')->id();
        $address = Address::where('userid', $userid)->get();
        $orderdetails =  OrderDetail::where('orderid', $orderid)->get();

        $info = [];
        foreach ($orderdetails as $detail) {
            $model = Product::where('productid', $detail['productid'])->first();
            $detail['title'] = $model->title;
            $detail['cover'] = $model->cover;
            $info[] = $detail;
        }

        $express = Express::all()->toArray();
        $res = $this->getMenu();
        $data = $this->totalPrice(\Auth::guard('web')->id());
        $totalPrice = 0;
        foreach ($info as $item){
            $totalPrice += $item->price * $item->productnum;
        }

        return view('home.order.check' , compact('res', 'data', 'info',  'express', 'address', 'totalPrice'));
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

        if ($res['status']){
            return \Redirect::action('Home\OrderController@check',['orderid' => $res['orderid']]);
        }else{
            return redirect()->back()->withErrors('添加订单错误');
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function confirm(Request $request)
    {
        $res = $this->orderReposity->updateOrder($request->all());

        return \Redirect::route('orderpay',['orderid' => $res['orderid'], 'method' => $request->get('paymethod')]);
    }

    /**
     * 支付
     * @param \Illuminate\Http\Request $request
     */
    public function pay(Request $request)
    {
        $orderid = $request->get('orderid');
        $paymethod = $request->get('method');
        if (empty($orderid)|| empty($paymethod)){
            throw new \Exception();
        }
        if ($paymethod = 'alipay'){
            return Pay::Alipay($orderid);
        }
//        if ($paymethod = 'weixinpay'){
//
//        }

    }
}
