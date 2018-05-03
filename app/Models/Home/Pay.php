<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Payment\Client\Charge;
use Payment\Common\PayException;

class Pay extends Model
{
    /**
     * 支付宝支付
     * @param $orderid
     */
    public static function Alipay($orderid)
    {
        $payData = self::getOrderDetailByOrderid($orderid);

        try {
            $str = Charge::run('ali_web', config('alipay'), $payData);
        } catch (PayException $e) {
            echo $e->errorMessage();
            exit;
        }

        echo htmlspecialchars($str);
    }

    /** 如果你把目标只设定为明知自己能实现的东西，你的自我要求就太低了
     * 微信支付
     * @param $orderid
     */
    public static function wexinpay($orderid)
    {
        $payData = self::getOrderDetailByOrderid($orderid);

        try {
            $str = Charge::run('wx_app', config('weixinpay'), $payData);
        } catch (PayException $e) {
            echo $e->errorMessage();
            exit;
        }

        echo htmlspecialchars($str);
    }

    /**
     * 根据订单ID查询订单详情信息
     * @param $orderid
     * @return array
     */
    public static function getOrderDetailByOrderid($orderid)
    {
        $order = Order::where('orderid', $orderid)->with(['detail.product'])->first()->toArray();

        $payData = [
            'body' => $order['detail']['product']['title'],
            'subject' => $order['detail']['product']['title'],
            'order_no' => $order['expressno'],
            'timeout_express' => strtotime($order['detail']['created_at']),
            'amount' => $order['detail']['productnum'],
            'return_param' => 'buy some',
            'goods_type' => 1,
            'store_id' => '',// 没有就不设置
        ];

        return $payData;
    }
}