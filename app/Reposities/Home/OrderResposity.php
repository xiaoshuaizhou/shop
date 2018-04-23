<?php

namespace App\Reposities\Home;


use App\Models\Admin\Product;
use App\Models\Home\Cart;
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
            return true;
        }catch(\Exception $exception){
            \DB::rollBack();
            return false;
        }

    }
}