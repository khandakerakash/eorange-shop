<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
protected $fillable = ['user_id', 'cart', 'method','shipping', 'pickup_location', 'totalQty', 'pay_amount', 'txnid', 'charge_id', 'order_number', 'payment_status', 'customer_email', 'customer_name', 'customer_phone', 'customer_address', 'customer_city', 'customer_zip','shipping_name', 'shipping_email', 'shipping_phone', 'shipping_address', 'shipping_city', 'shipping_zip', 'order_note', 'status'];

    public function vendororders()
    {
        return $this->hasMany('App\VendorOrder');
    }
    public function generateOrderNo(){
        $start_number = 1000;
        $generate = Order::max('order_number');
        if($start_number > $generate){
            return $start_number+1;
        }
        return $generate +1;
    }
}
