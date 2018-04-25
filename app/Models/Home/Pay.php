<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;
use Payment\Client\Charge;
use Payment\Common\PayException;

class Pay extends Model
{
    public static function Alipay($orderid)
    {
        date_default_timezone_set('Asia/Shanghai');

        try {
            $str = Charge::run('ali_web');
        } catch (PayException $e) {
            echo $e->errorMessage();
            exit;
        }


    }
}
