<?php

namespace App\Reposities\Home;


use App\Models\Admin\Product;
use App\Models\Home\Cart;
use App\Models\Home\Express;
use App\Models\Home\Order;
use App\Models\Home\OrderDetail;

/**
 * Class OrderResposity
 * @package App\Reposities\Home
 */
class OrderResposity
{
    /**
     * @var Order
     */
    public $order;

    /**
     * @var \App\Models\Home\OrderDetail
     */
    public $orderDetail;

    /**
     * OrderResposity constructor.
     * @param \App\Models\Home\Order $order
     * @param \App\Models\Home\OrderDetail $orderDetail
     */
    public function __construct(
        Order $order,
        OrderDetail $orderDetail
    ){
        $this->order = $order;
        $this->orderDetail = $orderDetail;
    }

    /**
     * 增加order和orderdetail表和address表
     * @param $data
     * @return bool
     * @throws \Exception
     */
    public function create($data)
    {
        \DB::beginTransaction();
        try{
            $order = $this->order->create([
                'userid' => \Auth::id(),
                'status' => Order::CREATEORDER,
                'expressno' => self::makeOrderNo()
            ]);
            $orderid = $order->id;
            foreach ($data['orderdetail'] as $product){
                $product['orderid'] = $orderid;
                $orderdetail = $this->orderDetail->create($product);
                if (!$orderdetail){
                    throw new \Exception();
                }
                //清空购物车
                Cart::where('productid', $product['productid'])->delete();
                $productnum = Product::where('productid', $product['productid'])->first(['num']);
                //修改库存
                Product::where('productid', $product['productid'])->update(['num' => $productnum->num - $product['productnum']]);
            }
            \DB::commit();
            return ['status' => true, 'orderid' => $orderid];
        }catch(\Exception $exception){
            \DB::rollBack();
            return ['status' => false, 'orderid' => 0];
        }

    }

    /**
     * @param $data
     * @return array|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function updateOrder($data)
    {
        $orderdetail = OrderDetail::where('orderid' , $data['orderid'])->get();
        $price = 0;
        foreach ($orderdetail as $item) {
            $price += $item->productnum * $item->price;
        }
        if ($price <= 0.0){
            throw new \Exception();
            return redirect('/');
        }
        $expressPrice = Express::where('id', $data['expressid'])->first(['expressprice']);
        if ($expressPrice->expressprice < 0.0){
            throw new \Exception();
            return redirect('/');
        }
        $price = $price + $expressPrice->expressprice;
        $res = Order::where('orderid', $data['orderid'])
            ->where('userid', \Auth::guard('web')->id())
            ->update([
                'addressid' => $data['addressid'],
                'expressid' => $data['expressid'],
                'status' => Order::CHECKORDER,
                'amount' => $price,
            ]);

        return ['orderid' => $data['orderid'], 'status' => $res];
    }
    /**
     * 生成订单号,避免订单号重复
     * @return string
     */
    public static function makeOrderNo()
    {
        $yCode = ['A', 'B', 'C', 'D', 'E', 'F', 'G'];
        $orderSn =
            $yCode[intval(date('Y') - 2017)]
            . strtoupper(dechex(date('m')))
            . date('d')
            . substr(time(), -5)
            . substr(microtime(), 2, 5)
            . sprintf('%02d', rand(0, 99));
        return $orderSn;
    }
}