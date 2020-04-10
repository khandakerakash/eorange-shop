<?php
/**
 * Created by PhpStorm.
 * User: rowjat
 * Date: 7/3/2019
 * Time: 12:01 AM
 */

namespace App\Http\Controllers\Front;


use App\Brand;
use App\Category;
use App\Http\Helper\ApiResource;
use App\Product;
use App\Services\CategoryService;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
class IndividualController
{

    /**
     * @var Category
     */
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function category($slug){
        return view('layouts.vue.front');
    }
    public function spatialCategory($slug){
        $eccept = ['flashsale','eorangemall','orangebasket','surpriseoffer','emi','chinabasket','exclusive_offer'];

        if(!in_array(str_replace('-','_',$slug),$eccept))
            abort(404);
        return view('layouts.vue.front');
    }
    public function newArrivals(){
        return view('layouts.vue.front');
    }
    public function _999markets(){
        return view('layouts.vue.front');
    }
    public function vendor(){
//        dd(User::where('is_vendor',2)->get(['shop_name'])->pluck('shop_name'));
//        dd($vendor = User::where('shop_name',str_replace('-', ' ','Union-Group'))->first());
        return view('layouts.vue.front');
    }
    public function search(){
        return view('front.individual.search');
    }


    public function getProducts(Request $request,CategoryService $categoryService,Product $productModel,$slug){
        $api_response = new ApiResource();
        $filter = json_decode($request->filter,true);

        if($request->type==='category'){
            if(!$category = Category::where('slug',$slug)->with(['subCategory','products'])->first())
                return $api_response->response_data('error','Category not found',401);

            $user_id_arr = $category->products()->whereStatus(1)
                ->groupBy('user_id')->where('user_id','!=',0)->pluck('user_id')->toArray();
            $brand_id_arr =  $category->products()->whereStatus(1)->groupBy('brand_id')->where('brand_id','!=',0)->pluck('brand_id')->toArray();
            $result['seller'] = User::whereIn('id',$user_id_arr)->get(['id','name']);
            $result['brand'] = Brand::whereIn('id',$brand_id_arr)->get(['id','name']);
                $result['banner_image'] = asset('assets/images/'.$category->cat_bg);

                $result['sub_category']=$category->subCategory;
                $result['header_name']=$category->name;
                $products = $category->products()->whereStatus(1);

        }elseif($request->type==='vendor'){
           /**
             *
             */
            $slug =  str_replace('-', ' ',$slug);
            if(!$vendor = User::where('shop_name',$slug)->first())
                return $api_response->response_data('error','Vendor not found',401);


            if ($filter['category'] !== null) {
                if (!$category = Category::where('id', $filter['category'])->with(['subCategory', 'products'])->first())
                    return $api_response->response_data('error', 'Category not found', 401);

                $products = $vendor->products()->whereHas('category',function ($category_q) use($category) {
                    $category_q->where('category_id',$category->id);
                })->whereStatus(1);
            } else {
                $products = $vendor->products()->whereStatus(1);
            }

            $brand_id_arr =  $vendor->products()->whereStatus(1)->groupBy('brand_id')->where('brand_id','!=',0)->pluck('brand_id')->toArray();
            $result['seller'] = collect([]);
            $result['brand'] = Brand::whereIn('id',$brand_id_arr)->get(['id','name']);
            $banner_image = null;
            if($image = $vendor->sliders->first()){
                $banner_image = $image->photo;
            }
                $result['banner_image'] = asset('assets/images/'.$banner_image);

            $result['sub_category']=Category::whereStatus(1)->where('parent_id',null )->whereHas('products',function ($product) use($vendor){
                return $product->where('user_id',$vendor->id);
            })->orderBy('position')->get();
                $result['header_name']=$vendor->shop_name;


        }elseif ($request->type==='spatial_category'){
            $slug = str_replace('-','_',$slug);
            $accept_sp_cat = ['flashsale','eorangemall','orangebasket','surpriseoffer','emi','chinabasket','exclusive_offer'];
            if(!in_array(str_replace('-','_',$slug),$accept_sp_cat))
                return $api_response->response_data('error','Page not found',401);


            $result['sub_category']=Category::whereStatus(1)->where('parent_id',null )->whereHas('products',function ($q) use($slug){
               return $q->bySpatialCategory($slug);
            })->orderBy('position')->get();

            if($filter['category'] !== null){
                if(!$category = Category::where('id',$filter['category'])->with(['subCategory','products'])->first())
                    return $api_response->response_data('error','Category not found',401);
               $products = $category->products()->bySpatialCategory($slug);
            }else{
                $products = $productModel->bySpatialCategory($slug);
            }
            $result['seller'] = User::whereHas('products',function ($q) use($slug){
                return $q->bySpatialCategory($slug);
            })->get(['id','name']);
            $result['brand'] = Brand::whereHas('products',function ($q) use($slug){
                return $q->bySpatialCategory($slug);
            })->get(['id','name']);



                        $sp_cat_arr = [
                            'flashsale'=>'Flash sale',
                            'eorangemall'=>'E-Orange mall',
                            'orangebasket'=>'Orange Grocery',
                            'surpriseoffer'=> 'Gift Corner',
                            'emi'=>'EMI',
                            'chinabasket'=>'China Basket',
                            'exclusive_offer'=>'Exclusive Offer'
                        ];
            $result['banner_image'] = asset('assets/images/sp/'.$slug.'.jpg');
            $result['header_name']=$sp_cat_arr[str_replace('-','_',$slug)];
        }elseif ($request->type==='new_arrivals') {
            $result['sub_category'] = Category::whereStatus(1)->where('parent_id', null)->whereHas('products', function ($q) use ($slug) {
                return $q->newArrival();
            })->orderBy('position')->get();

            if ($filter['category'] !== null) {
                if (!$category = Category::where('id', $filter['category'])->with(['subCategory', 'products'])->first())
                    return $api_response->response_data('error', 'Category not found', 401);
                $products = $category->products()->newArrival();
            } else {
                $products = $productModel->newArrival();
            }
            $result['seller'] = User::whereHas('products',function ($q) use($slug){
                return $q->newArrival();
            })->get(['id','name']);
            $result['brand'] = Brand::whereHas('products',function ($q) use($slug){
                return $q->newArrival();
            })->get(['id','name']);
            $result['banner_image'] = asset('assets/images/sp/new_arrivals.jpg');
            $result['header_name'] = 'New Arrivals';
        }elseif ($request->type==='999_markets') {
            $result['sub_category'] = Category::whereStatus(1)->where('parent_id', null)->whereHas('products', function ($q) use ($slug) {
                return $q->markets999();
            })->orderBy('position')->get();

            if ($filter['category'] !== null) {
                if (!$category = Category::where('id', $filter['category'])->with(['subCategory', 'products'])->first())
                    return $api_response->response_data('error', 'Category not found', 401);

                $products = $category->products()->markets999();
            } else {
                $products = $productModel->markets999();
            }
            $result['seller'] = User::whereHas('products',function ($q) use($slug){
                return $q->markets999();
            })->get(['id','name']);
            $result['brand'] = Brand::whereHas('products',function ($q) use($slug){
                return $q->markets999();
            })->get(['id','name']);
            $result['banner_image'] = asset('assets/images/sp/999_zone.jpg');
            $result['header_name'] = '999 Zone';
        }
        $result['min_price'] = $products->min('cprice');
        $result['max_price'] = $products->max('cprice');
        if(count($filter['seller_by'])){
            $products = $products->whereIn('user_id',$filter['seller_by']);
        }
        if(count($filter['brand_by'])){
            $products = $products->whereIn('brand_id',$filter['brand_by']);
        }
        switch($filter['short_by']){
            case 'popularity':
//                $products = $products->orderBy('brand_id',$filter['brand_by']);
                break;
            case 'position':
//                $products = $products->orderBy('brand_id',$filter['brand_by']);
                break;
            case 'low_to_high':
                $products = $products->orderBy('cprice','ASC');
                break;
            case 'high_to_low':
                $products = $products->orderBy('cprice','DESC');
                break;
        }



        $result['price_range']= ['min'=>$result['min_price'],'max'=>$result['max_price']];
        if($filter['price']['max']>0){
            $result['price_range']= ['min'=>$filter['price']['min'],'max'=>$filter['price']['max']];
            $products=$products->whereBetween('cprice', [$filter['price']['min'], $filter['price']['max']]);

        }
        $result['products']= $this->getCategoryResource($api_response,$products,$categoryService);
        return $api_response->response_data('success','Success',200,$result);
    }

    public function getSearchProduct(Request $request,CategoryService $categoryService){
        $api_response = new ApiResource();
        $filter = json_decode($request->filter,true);
        $result['sub_category'] = Category::whereStatus(1)->where('parent_id', null)->whereHas('products', function ($q) use ($request) {
            return $q->where('status',1)->where('name', 'like', '%' . $request->search . '%');
        })->orderBy('position')->get();

        if ($filter['category'] !== null) {
            if (!$category = Category::where('id', $filter['category'])->with(['subCategory', 'products'])->first())
                return $api_response->response_data('error', 'Category not found', 401);

            $products = $category->products()->where('status',1)->where('name', 'like', '%' . $request->search . '%');
        } else {
            $products = Product::where('status',1)->where('name', 'like', '%' . $request->search . '%');
        }
        $result['seller'] = User::whereHas('products',function ($q) use($request){
            return $q->where('status',1)->where('name', 'like', '%' . $request->search . '%');
        })->get(['id','name']);
        $result['brand'] = Brand::whereHas('products',function ($q) use($request){
            return $q->where('status',1)->where('name', 'like', '%' . $request->search . '%');
        })->get(['id','name']);
        $result['banner_image'] = asset('assets/images/sp/search.jpg');
        $result['header_name'] = 'Search : '.$request->search;
        $result['min_price'] = $products->min('cprice');
        $result['max_price'] = $products->max('cprice');
        if(count($filter['seller_by'])){
            $products = $products->whereIn('user_id',$filter['seller_by']);
        }
        if(count($filter['brand_by'])){
            $products = $products->whereIn('brand_id',$filter['brand_by']);
        }
        switch($filter['short_by']){
            case 'popularity':
//                $products = $products->orderBy('brand_id',$filter['brand_by']);
                break;
            case 'position':
//                $products = $products->orderBy('brand_id',$filter['brand_by']);
                break;
            case 'low_to_high':
                $products = $products->orderBy('cprice','ASC');
                break;
            case 'high_to_low':
                $products = $products->orderBy('cprice','DESC');
                break;
        }



        $result['price_range']= ['min'=>$result['min_price'],'max'=>$result['max_price']];
        if($filter['price']['max']>0){
            $result['price_range']= ['min'=>$filter['price']['min'],'max'=>$filter['price']['max']];
            $products=$products->whereBetween('cprice', [$filter['price']['min'], $filter['price']['max']]);

        }
        $result['products']= $this->getCategoryResource($api_response,$products,$categoryService);
        return $api_response->response_data('success','Success',200,$result);
    }
    public function getCategoryResource($api_response,$products,$categoryService){
        $products = $api_response->paginate($products->latest()->paginate(32),function ($item,$key) use($categoryService){
            $item['images'] = asset('assets/images/' . $item->photo);
            $item['slug'] = str_slug($item->name);
            $item['title'] = str_limit($item->name, 50);
            $gs = $categoryService->getGeneralSettings();
            if (Session::has('currency')){
                $curr = $categoryService->getCurrency(Session::get('currency'));
            }else{
                $curr =  $categoryService->defaultCurrency();
            }
            $item['sign'] = $gs->sign == 0?$curr->sign:"";
            if ($item->user_id != 0) {
                $price = $item->cprice + $gs->fixed_commission + ($item->cprice / 100) * $gs->percentage_commission;
                $item['price']  =   round($price * $curr->value, 2);
            }else{
                $item['price']  = round($item->cprice * $curr->value,2);
            }

            $item['off_price'] = $item->pprice != null?true:false;
            $item['off_prices'] = round($item->pprice * $curr->value,2);
            $off_percent =0;
            if($item->off_price){
                $less_price =$item->off_prices - $item->price;
                $off_percent = round((100*$less_price)/$item->off_prices);
            }

            $item['off_percent'] = '-'.$off_percent.'%';
            $item['is_new'] = $item->isNew();
            return $item;
        });
    return $products;
    }

}