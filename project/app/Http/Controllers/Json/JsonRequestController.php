<?php

namespace App\Http\Controllers\Json;

use App\Cart;
use App\Category;
use App\Childcategory;
use App\Coupon;
use App\EorangeCategory;
use App\Currency;
use App\FavoriteSeller;
use App\Generalsetting;
use App\Http\Controllers\Controller;
use App\Order;
use App\Page;
use App\PaymentGateway;
use App\Product;
use App\Subcategory;
use App\UserNotification;
use App\Wishlist;
use Auth;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use Session;
Use App\Notification;

class JsonRequestController extends Controller
{
    public function conv_notf()
    {
        $data = UserNotification::where('user_id','=',Auth::guard('user')->user()->id)->where('is_read','=',0)->get()->count();
        return response()->json($data);            
    }
    public function conv_notf_clear()
    {
        $data = UserNotification::where('user_id','=',Auth::guard('user')->user()->id);
        $data->delete();             
    }  
    public function order_notf()
    {
        $data = Notification::where('order_id','!=',null)->where('is_read','=',0)->get()->count();
        return response()->json($data);            
    }
    public function order_notf_clear()
    {
        $data = Notification::where('order_id','!=',null);
        $data->delete();             
    }  
    public function product_notf()
    {
        $data = Notification::where('product_id','!=',null)->where('is_read','=',0)->get()->count();
        return response()->json($data);            
    }
    public function product_notf_clear()
    {
        $data = Notification::where('product_id','!=',null);
        $data->delete();             
    }  
    public function user_notf()
    {
        $data = Notification::where('user_id','!=',null)->where('is_read','=',0)->get()->count();
        return response()->json($data);            
    } 
    public function user_notf_clear()
    {
        $data = Notification::where('user_id','!=',null);
        $data->delete();        
    } 
    public function pos()
    {
        $pos = $_GET['pos'];
        $pages = Page::all();
        foreach ($pages as $page) {
            $pgs[] = $page->id;
        }
        foreach(array_combine($pgs,$pos) as $page => $psn)
        {
            $pg = Page::findOrFail($page);
            $pg->pos = $psn;
            $pg->update();
        }

        return response()->json($pgs);            
    } 
    public function trans()
    {
        $id = $_GET['id'];
        $trans = $_GET['tin'];
        $order = Order::findOrFail($id);
        $order->txnid = $trans;
        $order->update();
        $data = $order->txnid;
        return response()->json($data);            
    }  
    public function transhow()
    {
        $id = $_GET['id'];
        $pay = PaymentGateway::findOrFail($id);
        return response()->json($pay->text);

       
    }  

    public function coupon()
    {
        $code = $_GET['code'];
        $fnd = Coupon::where('code','=',$code)->get()->count();
        if($fnd < 1)
        {
        return response()->json(0);              
        }
        else{
        $coupon = Coupon::where('code','=',$code)->first();
            if (Session::has('currency')) 
            {
              $curr = Currency::find(Session::get('currency'));
            }
            else
            {
                $curr = Currency::where('is_default','=',1)->first();
            }
        if($coupon->times != null)
        {
            if($coupon->times == "0")
            {
                return response()->json(0);                
            }
        }
        $today = (int)date('d');
        $from = (int)date('d',strtotime($coupon->start_date));
        $to = (int)date('d',strtotime($coupon->end_date));
        if($from <= $today && $to >= $today)
        {
            if($coupon->status == 1)
            {
                $oldCart = Session::has('cart') ? Session::get('cart') : null;
                $val = Session::has('already') ? Session::get('already') : null;
                if($val == $code)
                {
                    return response()->json(2); 
                }
                $cart = new Cart($oldCart);
                if($coupon->type == 0)
                {
                    Session::put('already', $code);
                    $coupon->price = (int)$coupon->price;
                    $val = $cart->totalPrice / 100;
                    $sub = $val * $coupon->price;
                    $cart->totalPrice = $cart->totalPrice - $sub;
                    $data[0] = round($cart->totalPrice * $curr->value,2);
                    $data[1] = $code;      
                    $data[2] = round($sub * $curr->value, 2);
                    $data[3] = $coupon->id;
                    $data[4] = $coupon->price."%";
                    $data[5] = 1;
                    return response()->json($data);   
                }
                else{
                    Session::put('already', $code);
                    $cart->totalPrice = $cart->totalPrice - $coupon->price;
                    $data[0] = round($cart->totalPrice * $curr->value,2);
                    $data[1] = $code;
                    $data[2] = round($coupon->price * $curr->value, 2);
                    $data[3] = $coupon->id;
                    $data[4] = $curr->sign;
                    $data[5] = 1;
                    return response()->json($data);              
                }
            }
            else{
                    return response()->json(0);   
            }              
        }
        else{
        return response()->json(0);             
        }
        }         
    }  

    public function subcats()
    {
        $id = $_GET['id'];
        $subcats = EorangeCategory::where('parent_id','=',$id)->get();
        return response()->json($subcats);            
    }  

    public function childcats()
    {
        $id = $_GET['id'];
        $childcats = Childcategory::where('subcategory_id','=',$id)->get();
        return response()->json($childcats);            
    }    

    public function addcart()
    {
        $id = $_GET['id'];
        $prod = Product::where('id','=',$id)->first(['id','user_id','name','photo','size','color','cprice','stock']);


        if($prod->user_id != 0){
        $gs = Generalsetting::findOrFail(1);
        $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
        $prod->cprice = round($price,2);
        }


        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        $cart->add($prod, $prod->id);
        if($cart->items[$id]['stock'] < 0)
        {
            return [
                'status'=>0,
                'msg'=>$exclusive_offer['message']
            ];
        }
        Session::put('cart',$cart);
        $data[0] = $cart->totalPrice;
        $data[1] = $cart->items;
        $data[2] = count($cart->items);        
        return response()->json($data);           
    }  


    public function quick()
    {
        $id = $_GET['id'];
        $prod = Product::findOrFail($id);
        if($prod->user_id != 0){
        $gs = Generalsetting::findOrFail(1);
        $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
        $prod->cprice = round($price,2);
        }
        $data[0] = $prod->photo; 
        $data[1] = $prod->name;  
        $data[2] = $prod->cprice;  
        $data[3] = $prod->pprice;
        $data[4] = strip_tags(substr($prod->description,0,300));  
        $data[5] = (string)$prod->stock;
        if($prod->size != null)
        {
        $data[6] = (explode(",",$prod->size));
        }
        else
        {
        $data[6] = null;
        }
        if($prod->color != null)
        {
        $data[8] = (explode(",",$prod->color));
        }
        else
        {
        $data[8] = null;
        }
        $data[7] = $prod->id;
        return response()->json($data);           
    }  

    public function feature()
    {
        $id = $_GET['id'];
        $prod = Product::findOrFail($id);
        $data[0] = $prod->featured; 
        $data[1] = $prod->best;  
        $data[2] = $prod->top;  
        $data[3] = $prod->hot;
        $data[4] = $prod->latest;  
        $data[5] = $prod->big;
        $data[6] = $prod->id;
        $data[7] = strlen($prod->name) > 30 ? substr($prod->name, 0, 30) : $prod->name;
        return response()->json($data);           
    }  

    public function addbyone()
    {
        $id = $_GET['id'];
$prod = Product::where('id','=',$id)->first(['id','user_id','name','photo','size','color','cprice','stock']);
        if($prod->user_id != 0){
        $gs = Generalsetting::findOrFail(1);
        $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
        $prod->cprice = round($price,2);
        }
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->adding($prod, $prod->id);
        if($cart->items[$id]['stock'] < 0)
        {
            return 0;
        }
        Session::put('cart',$cart);
        $data[0] = $cart->totalPrice;
        $data[1] = $cart->items[$id]['qty']; 
        $data[2] = $cart->items[$id]['price'];
        $data[3] = count($cart->items);
        return response()->json($data);          
    }  

    public function reducebyone()
    {
        $id = $_GET['id'];
$prod = Product::where('id','=',$id)->first(['id','user_id','name','photo','size','color','cprice','stock']);
        if($prod->user_id != 0){
        $gs = Generalsetting::findOrFail(1);
        $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
        $prod->cprice = round($price,2);
        }
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduce($prod, $prod->id);
        Session::put('cart',$cart);
        $data[0] = $cart->totalPrice;
        $data[1] = $cart->items[$id]['qty']; 
        $data[2] = $cart->items[$id]['price'];
        $data[3] = count($cart->items);
        return response()->json($data);           
    }  

    public function upcart()
    {
         $id = $_GET['id'];
         $size = $_GET['size'];
$prod = Product::where('id','=',$id)->first(['id','user_id','name','photo','size','color','cprice','stock']);
         $oldCart = Session::has('cart') ? Session::get('cart') : null;
         $cart = new Cart($oldCart);
         $cart->updateItem($prod,$id,$size);  
         Session::put('cart',$cart);
    }  

    public function upcolor()
    {
         $id = $_GET['id'];
         $color = $_GET['color'];
$prod = Product::where('id','=',$id)->first(['id','user_id','name','photo','size','color','cprice','stock']);
         $oldCart = Session::has('cart') ? Session::get('cart') : null;
         $cart = new Cart($oldCart);
         $cart->updateColor($prod,$id,$color);  
         Session::put('cart',$cart);
    } 
    public function addnumcart()
    {
        $id = $_GET['id'];
        $qty = $_GET['qty'];
        $size = $_GET['size'];
        $color = $_GET['color'];
$prod = Product::where('id','=',$id)->first(['id','user_id','name','photo','size','color','cprice','stock','exclusive_offer','salon_service_start_time','salon_service_end_time']);
        $exclusive_offer = $prod->check_exclusive_offer();
        if(!$exclusive_offer['status']){
            return $exclusive_offer['code'];
        }
        if($prod->exclusive_offer){
            session()->put('exclusive_offer',1);
        }
        if($prod->user_id != 0){
        $gs = Generalsetting::findOrFail(1);
        $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
        $prod->cprice = round($price,2);
        }
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addnum($prod, $prod->id, $qty, $size,$color);
        if($cart->items[$id]['stock'] < 0)
        {
            return 0;
        }
        Session::put('cart',$cart);
        $data[0] = $cart->totalPrice;
        $data[1] = $cart->items;   
        $data[2] = count($cart->items);   
        return response()->json($data);        
    }  

    public function removecart()
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $id = $_GET['id'];   
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
            $data[0] = $cart->totalPrice;
            $data[1] = $cart->items;   
            $data[2] = count($cart->items);
            return response()->json($data);  
        } else {
            Session::forget('cart');
            $data[0] = 0.00;
            $data[1] = null;   
            return response()->json($data); 
        }          
    } 

    public function wish()
    {
        $id = $_GET['id'];        
        $user = Auth::guard('user')->user();
        $data = 0;
        $ck = Wishlist::where('user_id','=',$user->id)->where('product_id','=',$id)->get()->count();
        if($ck > 0)
        {
            return response()->json($data); 
        }
        $wish = new Wishlist();
        $wish->user_id = $user->id;
        $wish->product_id = $id;
        $wish->save();
        $data = 1; 
        return response()->json($data);      
    }

    public function removewish()
    {
        $id = $_GET['id'];
        $wish = Wishlist::where('product_id','=',$id)->first();
        $wish->delete();        
        $data = 1; 
        return response()->json($data);      
    }

    public function favorite()
    {
        $id = $_GET['id'];        
        $user = Auth::guard('user')->user();
        $data = 0;
        $ck = FavoriteSeller::where('user_id','=',$user->id)->where('vendor_id','=',$id)->get()->count();
        if($ck > 0)
        {
            return response()->json($data); 
        }
        $wish = new FavoriteSeller();
        $wish->user_id = $user->id;
        $wish->vendor_id = $id;
        $wish->save();
        $data = 1; 
        return response()->json($data);      
    }

    public function removefavorite()
    {
        $id = $_GET['id'];
        $wish = FavoriteSeller::where('vendor_id','=',$id)->first();
        $wish->delete();        
        $data = 1; 
        return response()->json($data);      
    }
    public function suggest()
    {
        $search = $_GET['search'];        
        $data = Product::where('name', 'like', '%' . $search . '%')
                ->where('status','=',1)->get();
        return response()->json($data);      
    }
}