<?php

namespace App\Http\Controllers\SSLPayment;

use App\Http\Controllers\Controller;
use App\Lib\SslCommerz\Customer;
use App\Lib\SslCommerz\Client;
use App\Order;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
class SSLPaymentController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request,[
            'order_number'=>'required',
        ]);
        if(!$order = Order::where('order_number',$request->order_number)
            ->where('payment_status','Pending')
            ->first()){
            return redirect()->back()->with('error','No Order found');
        }

        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.
        $post_data = array();
        $post_data['total_amount'] = $order->pay_amount+$order->shipping_cost; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid('trx_'); // tran_id must be unique
        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $order->customer_name;
        $post_data['cus_email'] = $order->customer_email;
        $post_data['cus_add1'] = $order->customer_address;
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = $order->customer_city;
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = $order->customer_country;
        $post_data['cus_phone'] = $order->customer_phone;
        $post_data['cus_fax'] = "";
        # SHIPMENT INFORMATION
        $post_data['ship_name'] = $order->shipping_name;
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = $order->shipping_city;
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = $order->shipping_phone;
        $post_data['ship_country'] = $order->shipping_country;
        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";
        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";
        #Before  going to initiate the payment order status need to insert or update as Pending.


        $customer = new Customer($post_data['cus_name'], $post_data['cus_email'], $post_data['cus_phone']);
        $customer->setAddress1($post_data['cus_add1']);
        $customer->setAddress2($post_data['cus_add2']);
        $customer->setCity($post_data['cus_city']);
        $customer->setCountry($post_data['cus_country']);
        $customer->setPostCode($post_data['cus_postcode']);
        $customer->setState($post_data['cus_state']);
        $resp = Client::initSession($customer, $post_data['total_amount']); //29 is the amount
        $order->txnid = $resp->getTransactionId();
        $order->save();
        $payment = new Payment();
        $payment->user_id = $order->user_id;
        $payment->txnid = $order->txnid;
        $payment->paid_amount = $order->pay_amount+$order->shipping_cost;;
        $payment->payment_status = 'Processing';
        $payment->payment_id = uniqid();
        $payment->featured = 'yes';
        $payment->process_time = Carbon::now();
        $payment->save();
        return redirect()->to($resp->getGatewayUrl());
    }
    public function success(Request $request)
    {

        $resp = Client::verifyOrder($request->val_id);
        $status = $resp->getStatus();
        $transaction = $resp->getTransactionId();
        $order_detials = Order::where('txnid', $transaction)->first();
        $payment = Payment::where('txnid',$order_detials->txnid)->first();
        if($status === 'VALID'){
            $order_detials->payment_status = 'Completed';
            $order_detials->status = 'Completed';
            $order_detials->save();
            $payment->payment_status = 'Completed';
            $payment->save();
            return redirect()->route('front.index')->with('success','A successful transaction');
        }else{

            $payment->payment_status = 'Pending';
            $payment->save();
            return redirect()->route('front.payment',$order_detials->order_number)->with('error','Invalid Transaction');
        }
    }
    public function fail(Request $request)
    {

        $order_detials = Order::where('txnid', $request->tran_id)->first();
        $payment = Payment::where('txnid',$request->tran_id)->first();
        $payment->payment_status = 'Pending';
        $payment->save();
        return redirect()->route('front.payment',$order_detials->order_number)->with('error','Transaction is declined by customer\'s Issuer Bank');
    }
    public function cancel(Request $request)
    {

        $order_detials = Order::where('txnid', $request->tran_id)->first();
        $payment = Payment::where('txnid',$request->tran_id)->first();

        $payment->payment_status = 'Pending';
        $payment->save();
        return redirect()->route('front.payment',$order_detials->order_number)->with('error','Transaction is cancelled by the customer.');
    }

}
