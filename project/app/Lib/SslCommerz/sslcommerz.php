<?php
return [
    'store_id' => env('STORE_ID', 'eorangeshop001live'),
    'store_password' => env('STORE_PASSWORD', 'eorangeshop001live72791'),
    'currency' =>  env('CURRENCY', 'BDT'),
    'success_url' => env('SUCCESS_URL', 'http://localhost/dev/eorangeshopupdate/success'),
    'fail_url' => env('FAIL_URL', 'http://localhost/dev/eorangeshopupdate/fail'),
    'cancel_url' => env('CANCEL_URL', 'http://localhost/dev/eorangeshopupdate/cancel'),
    'sandbox_mode' => env('SANDBOX_MODE', false)
];