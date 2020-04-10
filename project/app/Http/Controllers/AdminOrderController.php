<?php

namespace App\Http\Controllers;

use App\Order;
use App\VendorOrder;
use App\User;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $orders = Order::orderBy('id','desc')->get();
        return view('admin.order.index',compact('orders'));
    }
    public function pending()
    {
        $orders = Order::where('status','=','pending')->get();
        return view('admin.order.pending',compact('orders'));
    }
    public function processing()
    {
        $orders = Order::where('status','=','processing')->get();
        return view('admin.order.processing',compact('orders'));
    }
    public function completed()
    {
        $orders = Order::where('status','=','completed')->get();
        return view('admin.order.completed',compact('orders'));
    }
    public function declined()
    {
        $orders = Order::where('status','=','declined')->get();
        return view('admin.order.declined',compact('orders'));
    }
    public function show($id)
    {
        $order = Order::findOrFail($id);
        $cart = unserialize(bzdecompress(utf8_decode($order->cart)));
        return view('admin.order.details',compact('order','cart'));
    }

    public function invoice($id)
    {
        $order = Order::findOrFail($id);
        $tax = ($order->pay_amount / 100) * $order->tax;
        $subtotal = $order->pay_amount - ($tax + $order->shipping_cost);
        $cart = unserialize(bzdecompress(utf8_decode($order->cart)));
        return view('admin.order.invoice',compact('order','cart','tax','subtotal'));
    }

    public function printpage($id)
    {
        $order = Order::findOrFail($id);
        $tax = ($order->pay_amount / 100) * $order->tax;
        $subtotal = $order->pay_amount - ($tax + $order->shipping_cost);
        $cart = unserialize(bzdecompress(utf8_decode($order->cart)));
        return view('admin.order.print',compact('order','cart','tax','subtotal'));
    }
    public function email($id)
    {
         $order = Order::findOrFail($id);
        return view('admin.order.email',compact('order'));
    }

    public function emailsub(Request $request)
    {
        mail($request->to,$request->subject,$request->message);
        return redirect()->route('admin-order-index')->with('success','Email Send Successfully');
    }

    public function status($id,$status)
    {
        $mainorder = Order::findOrFail($id);
        if ($mainorder->status == "completed"){
            return redirect()->route('admin-order-index')->with('success','This Order is Already Completed');
        }else{
        if ($status == "completed"){
            foreach($mainorder->vendororders as $vorder)
            {
                $uprice = User::findOrFail($vorder->user_id);
                $uprice->current_balance = $uprice->current_balance + $vorder->price;
                $uprice->update();

            }

        }
        $stat['status'] = $status;
        $order = VendorOrder::where('order_id','=',$id)->update(['status' => $status]);
        $mainorder->update($stat);
        return redirect()->back()->with('success','Order Status Updated Successfully');
        }
    }

}
