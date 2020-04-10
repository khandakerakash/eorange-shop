<?php

namespace App\Http\Controllers;

use App\Category;
use App\Conversation;
use App\Currency;
use App\FavoriteSeller;
use App\Generalsetting;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;
use App\Language;
use App\Message;
use App\Order;
use App\Product;
use App\User;
use App\UserNotification;
use App\VendorOrder;
use App\Wishlist;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
    	$user = Auth::guard('user')->user();
        $complete = $user->orders()->where('status','=','completed')->get()->count();
        $process = $user->orders()->where('status','=','processing')->get()->count();
        $wishes =$user->wishlists ;
        $currency_sign = Currency::where('is_default','=',1)->first();
        return view('user.dashboard',compact('user','complete','process','wishes','currency_sign'));
    }

    public function profile()
    {
    	$user = Auth::guard('user')->user();
        return view('user.profile',compact('user'));
    }
    public function orders()
    {
        $user = Auth::guard('user')->user();
        $orders = Order::where('user_id','=',$user->id)->orderBy('id','desc')->get();
        return view('user.orders',compact('user','orders'));
    }

    public function messages()
    {
        $user = Auth::guard('user')->user();

            $convs = Conversation::where('sent_user','=',$user->id)->orWhere('recieved_user','=',$user->id)->get();
            return view('user.messages',compact('user','convs'));            
    }

    public function message($id)
    {
            $user = Auth::guard('user')->user();
            $conv = Conversation::findOrfail($id);
            return view('user.message',compact('user','conv'));                 
    }
    public function messagedelete($id)
    {
            $conv = Conversation::findOrfail($id);
            if($conv->messages->count() > 0)
            {
                foreach ($conv->messages as $key) {
                    $key->delete();
                }
            }
            if($conv->notifications->count() > 0)
            {
                foreach ($conv->notifications as $key) {
                    $key->delete();
                }
            }
            $conv->delete();
            return redirect()->back()->with('success','Message Deleted Successfully');                 
    }
    public function postmessage(Request $request)
    {
        $msg = new Message();
        $input = $request->all();  
        $msg->fill($input)->save();
        Session::flash('success', 'Message Sent!');
        return redirect()->back();
    }

    public function order($id)
    {
        $user = Auth::guard('user')->user();
        $order = Order::findOrfail($id);
        $cart = unserialize(bzdecompress(utf8_decode($order->cart)));
        return view('user.order',compact('user','order','cart'));
    }
    public function orderprint($id)
    {
        $user = Auth::guard('user')->user();
        $order = Order::findOrfail($id);
        $cart = unserialize(bzdecompress(utf8_decode($order->cart)));
        return view('user.print',compact('user','order','cart'));
    }
    public function vendororders()
    {
        $user = Auth::guard('user')->user();
        $orders = VendorOrder::where('user_id','=',$user->id)->orderBy('id','desc')->get()->groupBy('order_number');

        return view('user.order.index',compact('user','orders'));
    }

    public function vendororder($slug)
    {
        $user = Auth::guard('user')->user();
        $order = Order::where('order_number','=',$slug)->first();
        $cart = unserialize(bzdecompress(utf8_decode($order->cart)));
        return view('user.order.details',compact('user','order','cart'));
    }
    public function invoice($slug)
    {
        $user = Auth::guard('user')->user();
        $order = Order::where('order_number','=',$slug)->first();
        $cart = unserialize(bzdecompress(utf8_decode($order->cart)));
        return view('user.order.invoice',compact('user','order','cart'));
    }
    public function printpage($slug)
    {
        $user = Auth::guard('user')->user();
        $order = Order::where('order_number','=',$slug)->first();
        $cart = unserialize(bzdecompress(utf8_decode($order->cart)));
        return view('user.order.print',compact('user','order','cart'));
    }
    public function status($slug,$status)
    {
        $mainorder = VendorOrder::where('order_number','=',$slug)->first();
        if ($mainorder->status == "completed"){
            return redirect()->back()->with('success','This Order is Already Completed');
        }else{

        $user = Auth::guard('user')->user();
        $order = VendorOrder::where('order_number','=',$slug)->where('user_id','=',$user->id)->update(['status' => $status]);
        return redirect()->route('vendor-order-index')->with('success','Order Status Updated Successfully');
    }
    }
    public function resetform()
    {
        $user = Auth::guard('user')->user();
        return view('user.reset',compact('user'));
    }

    public function shop()
    {
        $user = Auth::guard('user')->user();
        return view('user.shop-description',compact('user'));
    }


    public function shopup(Request $request)
    {
        $input = $request->all();  
        $user = Auth::guard('user')->user();
        $user->update($input);
        Session::flash('success', 'Successfully updated the data');
        return redirect()->back();
    }


    public function ship()
    {
        $user = Auth::guard('user')->user();
        return view('user.ship',compact('user'));
    }

    public function affilate_code()
    {
        $user = Auth::guard('user')->user();
        return view('user.affilate_code',compact('user'));
    }
    public function shipup(Request $request)
    {
        $input = $request->all();  
        $user = Auth::guard('user')->user();
        $user->update($input);
        Session::flash('success', 'Successfully updated the data');
        return redirect()->back();
    }

    public function email($email)
    {
        return view('user.order.email',compact('email'));
    }

    public function emailsub(Request $request)
    {
        mail($request->to,$request->subject,$request->message);
        return redirect()->route('vendor-order-index')->with('success','Email Send Successfully');
    }

    public function reset(Request $request)
    {
        $input = $request->all();  
        $user = Auth::guard('user')->user();
         if($user->is_provider == 1)
         {
            return redirect()->back();
         }
        if ($request->cpass){
            if (Hash::check($request->cpass, $user->password)){
                if ($request->newpass == $request->renewpass){
                    $input['password'] = Hash::make($request->newpass);
                }else{
                    Session::flash('unsuccess', 'Confirm password does not match.');
                    return redirect()->back();
                }
            }else{
                Session::flash('unsuccess', 'Current password Does not match.');
                return redirect()->back();
            }
        }
        $user->update($input);
        Session::flash('success', 'Successfully updated your password');
        return redirect()->back();
    }


    public function vendorrequest()
    {
        $gs = Generalsetting::findOrfail(1);
        if($gs->reg_vendor != 1)
        {
            return redirect()->back();
        }
        $user = Auth::guard('user')->user();
        if($user->is_vendor == 2)
        {
            return redirect()->back();
        }
        return view('user.vendor-request',compact('user'));
    }

    public function vendorrequestsub(StoreValidationRequest $request)
    {
        $input = $request->all();  
        $user = Auth::guard('user')->user();
        $user->is_vendor = 1;
        $user->update($input);
        Session::flash('success', 'Successfully Sent The Request.');
        return redirect()->back();
    }
    public function profileupdate(UpdateValidationRequest $request)
    { 
        $input = $request->all();
        $user = Auth::guard('user')->user();
        if ($file = $request->file('photo'))
        {
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images',$name);
            if($user->photo != null)
            {
                    if (file_exists(public_path().'/assets/images/'.$user->photo)) {
                        unlink(public_path().'/assets/images/'.$user->photo);
                    }
            }
            $input['photo'] = $name;
        }
        $user->update($input);
        $language = Language::find(1);
        Session::flash('success', $language->success);
        return redirect()->route('user-profile');
    }

    public function wishlists()
    {
        $user = Auth::guard('user')->user();
        $wishes = Wishlist::where('user_id','=',$user->id)->get();
        return view('user.wishlist',compact('user','wishes'));
    }

    public function favorites()
    {
        $user = Auth::guard('user')->user();
        $favorites = FavoriteSeller::where('user_id','=',$user->id)->get();
        return view('user.favorite',compact('user','favorites'));
    }

    public function delete($id)
    {
        $gs = Generalsetting::findOrfail(1);
        $wish = Wishlist::findOrFail($id);
        $wish->delete();
        return redirect()->route('user-wishlist')->with('success',$gs->wish_remove);
    }

    public function favdelete($id)
    {
        $gs = Generalsetting::findOrfail(1);
        $wish = FavoriteSeller::findOrFail($id);
        $wish->delete();
        return redirect()->route('user-favorites')->with('success','Successfully Removed The Seller.');
    }

    public function wishlist(Request $request)
    {
        $sort = '';
        if(!empty($request->min) || !empty($request->max))
        {
        $min = $request->min;
        $max = $request->max;
        $user = Auth::guard('user')->user();
        $wishes = Wishlist::where('user_id','=',$user->id)->pluck('product_id');
        $wproducts = Product::whereIn('id',$wishes)->whereBetween('cprice', [$min, $max])->orderBy('id','desc')->paginate(9);
        return view('front.wishlist',compact('user','wproducts','sort','min','max'));
        }
        $user = Auth::guard('user')->user();
        $wishes = Wishlist::where('user_id','=',$user->id)->pluck('product_id');
        $wproducts = Product::whereIn('id',$wishes)->orderBy('id','desc')->paginate(9);
        return view('front.wishlist',compact('user','wproducts','sort'));
    }

    public function wishlistsort($sorted)
    {
        $sort = $sorted;
        $user = Auth::guard('user')->user();
        $wishes = Wishlist::where('user_id','=',$user->id)->pluck('product_id');
        if($sort == "new")
        {
        $wproducts = Product::whereIn('id',$wishes)->orderBy('id','desc')->paginate(9);
        }
        else if($sort == "old")
        {
        $wproducts = Product::whereIn('id',$wishes)->paginate(9);
        }
        else if($sort == "low")
        {
        $wproducts = Product::whereIn('id',$wishes)->orderBy('cprice','asc')->paginate(9);
        }
        else if($sort == "high")
        {
        $wproducts = Product::whereIn('id',$wishes)->orderBy('cprice','desc')->paginate(9);
        }
        return view('front.wishlist',compact('user','wproducts','sort'));
    }
    public function social()
    {
        $socialdata = Auth::guard('user')->user();
        return view('user.social',compact('socialdata'));
    }

    public function socialupdate(Request $request)
    {
        $socialdata = Auth::guard('user')->user();
        $input = $request->all();
        if ($request->f_check == ""){
            $input['f_check'] = 0;
        }
        if ($request->t_check == ""){
            $input['t_check'] = 0;
        }

        if ($request->g_check == ""){
            $input['g_check'] = 0;
        }

        if ($request->l_check == ""){
            $input['l_check'] = 0;
        }

        $socialdata->update($input);
        Session::flash('success', 'Social links updated successfully.');
        return redirect()->route('user-social-index');
    }
    //Send email to user
    public function usercontact(Request $request)
    {
        $data = 1;
        $user = User::findOrFail($request->user_id);
        $vendor = User::where('email','=',$request->email)->first();
        if(empty($vendor))
        {
            $data = 0;
            return response()->json($data);   
            
        }
        $subject = $request->subject;
        $to = $vendor->email;
        $name = $request->name;
        $from = $request->email;
        $msg = "Name: ".$name."\nEmail: ".$from."\nMessage: ".$request->message;
        //mail($to,$subject,$msg);
    $conv = Conversation::where('sent_user','=',$user->id)->where('subject','=',$subject)->first();
        if(isset($conv)){
            $msg = new Message();
            $msg->conversation_id = $conv->id;
            $msg->message = $request->message;
            $msg->sent_user = $user->id;
            $msg->save();
            return response()->json($data);   
        }
        else{
            $message = new Conversation();
            $message->subject = $subject;
            $message->sent_user= $request->user_id;
            $message->recieved_user = $vendor->id;
            $message->message = $request->message;
            $message->save();
        $notification = new UserNotification;
        $notification->user_id= $vendor->id;
        $notification->conversation_id = $message->id;
        $notification->save();
            $msg = new Message();
            $msg->conversation_id = $message->id;
            $msg->message = $request->message;
            $msg->sent_user = $request->user_id;;
            $msg->save();
            return response()->json($data);   

        }
    }
}
