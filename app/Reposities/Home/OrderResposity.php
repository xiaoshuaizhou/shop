<?php

namespace App\Reposities\Home;


use App\Models\Home\Order;

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
     * OrderResposity constructor.
     * @param $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * @param $data
     * @return $this|\Illuminate\Database\Eloquent\Model
     * @throws \Exception
     * @throws \Throwable
     */
    public function create($data)
    {
        \DB::transaction(function () {
//            $this->orderReposity->create([
//                'userid' => \Auth::id(),
//                'status' => Order::CREATEORDER,
//
//            ]);
        });

        return $this->order->create($data);
    }
}