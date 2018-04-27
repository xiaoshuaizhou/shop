<?php

return [
    'app_id' => '应用ID',
    'mch_id' => '商户id',
    'md5_key' => '刚刚设置的密钥',
    'app_cert_pem' => 'apiclient_cert.pem',
    'app_key_pem' => 'apiclient_key.pem',
    'sign_type' => 'MD5',// MD5  HMAC-SHA256
    'limit_pay' => [//'no_credit',
    ],

    'fee_type' => 'CNY',// 货币类型  当前仅支持该字段
    'notify_url' => 'https://helei112g.github.io/',
    'redirect_url' => 'https://helei112g.github.io/',
    'return_raw' => false,
];
