<?php

namespace App\Models\Home;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Order
 * @package App\Models\Home
 */
class Order extends Model
{
    protected $table = 'order';
    protected $fillable = ['orderid', 'userid', 'addressid', 'amount', 'status', 'expressid', 'expressno', 'tradeno', 'tradeext'];

    const CREATEORDER = 0;

    const CHECKORDER = 100;

    const PAYFAILED = 201;

    const PAYSUCCESS = 202;

    const SENDED = 220;

    const RECEIVED = 260;

    /**
     * @var array
     */
    public static $status = [
        self::CREATEORDER => '订单初始化',
        self::CHECKORDER => '待支付',
        self::PAYFAILED => '支付失败',
        self::PAYSUCCESS => '支付成功',
        self::SENDED => '已发货',
        self::RECEIVED => '订单完成'
    ];

    public function detail()
    {
        return $this->belongsTo('App\Models\Home\OrderDetail', 'orderid', 'orderid');
    }
}