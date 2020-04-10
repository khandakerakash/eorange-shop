<?php

// SSLCommerz configuration
$store_id = [
    'sendbox'=>'eoran5d73e4a89179f',
    'live'=>'eorangeshop001live'
];
$store_password = [
    'sendbox'=>'eoran5d73e4a89179f@ssl',
    'live'=>'eorangeshop001live72791'
];
$sandbox_mode = false;
$url = env('APP_URL');
return [
    'store_id' => $sandbox_mode?$store_id['sendbox']:$store_id['live'],
    'store_password' => $sandbox_mode?$store_password['sendbox']:$store_password['live'],
    'currency' =>  'BDT',
    'success_url' => $url.'/sslcz-gw/success',
    'fail_url' => $url.'/sslcz-gw/fail',
    'cancel_url' => $url.'/sslcz-gw/cancel',
    'sandbox_mode' => $sandbox_mode
];