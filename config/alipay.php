<?php

return [
    'use_sandbox'           => false,
    'partner'               => env('ALIPAYPARTNER'),
    'app_id'                => env('ALIPAYAPPID'),
    'sign_type'             => 'RSA2',

    'ali_public_key'        => env('ALIPAYALIPUBLICKEY'),
    'rsa_private_key'       => env('ALIPAYRSAPRIVATEKEY'),

    'limit_pay'             => [
        //'balance',
        //'moneyFund',
        // ... ...
    ],

    'notify_url'            => env('ALIPAYNOTIFYURL'),
    'return_url'            => env('ALIPAYNOTIFYURL'),
    'return_raw'            => false,
];



?>