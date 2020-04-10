<?php

namespace App;

use App\Services\CategoryService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Session;
class Product extends Model
{
    protected $fillable = ['category_id',
        'subcategory_id','admin_added',"brand_id", 'childcategory_id', 'name', 'photo', 'size', 'color', 'description','cprice','pprice','stock','policy','featured','status', 'views','tags','best','top','hot','latest','big','features','colors','user_id','product_condition','ship','meta_tag','meta_description', 'sku', 'flashsale', 'emi', 'costprice', 'shortdescription', 'eorangemall', 'surpriseoffer', 'orangebasket', 'chinabasket', 'warranty', 'exclusive_offer', 'salon_service_start_time', 'salon_service_end_time'];

    /*public function category()
    {
    	return $this->belongsTo('App\Category');
    }*/
    public function category()
    {
        return $this->belongsToMany(Category::class,'category_product','product_id','category_id');
    }
    public function subcategory()
    {
    	return $this->belongsTo('App\Subcategory');
    }

    public function childcategory()
    {
    	return $this->belongsTo('App\Childcategory');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function galleries()
    {
        return $this->hasMany('App\Gallery');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function wishlists()
    {
        return $this->hasMany('App\Wishlist');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function userinfo()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function latestcategory()
    {
        return $this->belongsToMany(EorangeCategory::class, 'category_product','product_id','category_id');
    }

    public function scopeCategorized($query, $category=null) {

        return $query->with('latestcategory')
            ->select('products.*')
            ->join('category_product', 'category_product.product_id', '=', 'products.id')
            ->whereIn('category_product.category_id', $category)
            ->groupBy('products.id');
    }
    public function scopeByCategory($query){

    }
    public function check_exclusive_offer(){
        if($this->exclusive_offer){
            //9 > 10
            if($this->salon_service_start_time > Carbon::now()){
                return [
                    'status'=>false,
                    'code'=>3,
                    'message'=>'Don\'t start Exclusive offer'
                ];
            }
            if($this->salon_service_end_time < Carbon::now()){
                return [
                    'status'=>false,
                    'code'=>4,
                    'message'=>'Time out offer Exclusive offer'
                ];
            }
            if(!auth()->check()){
                return [
                    'status'=>false,
                    'code'=>5,
                    'message'=>'Please after login for Exclusive offer'
                ];
            }
            if(auth()->user()->is_exclusive_offer || session()->has('exclusive_offer')){
                return [
                    'status'=>false,
                    'code'=>6,
                    'message'=>'Only one time for Exclusive offer'
                ];
            }
        }
        return [
            'status'=>true,
            'code'=>200,
            'message'=>'next'
        ];
    }
    public function scopeBySpatialCategory($query,$slug){

       return $query->where(str_replace('-','_',$slug),1)->whereStatus(1);
    }
    public function ratings()
    {
        return $this->hasMany(Review::class,'product_id','id');
    }

    public function avgRating()
    {
        return $this->ratings()
            ->selectRaw('avg(rating) as aggregate, product_id')
            ->groupBy('product_id');
    }
    public function scopePrice($query, $min,$max)
    {
        if ($max!=0) {
            return $query->whereBetween('cprice', [$min, $max])->orderBy('cprice','asc');
        }else{
            return $query->orderBy('product_id','desc');
        }

    }
    public function isStockOut(){
        return $this->stock === 0?true:false;
    }
    public function scopeRecommendYou($query){
        $form = Carbon::now()->subDays(60);
        $to =Carbon::now()->subDays(15);
        return $query->whereStatus(1)->whereBetween('created_at',[$form,$to]);
    }
    public function scopeNewArrival($query){
        $form = Carbon::now()->subDays(15);
        $to = Carbon::now();
        return $query->whereStatus(1)->whereBetween('created_at',[$form,$to]);
    }
    public function scopeMarkets999($query){
        return $query->whereStatus(1)->whereBetween('cprice', [0, 999]);

    }
    public function brandinfo()
    {
        return $this->belongsTo('App\Brand', 'brand_id', 'id');

     }
    public function seller(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function isNew(){
        if($this->created_at->addDays(15) > Carbon::now())
            return true;
        return false;
    }
    public function offPrice(){
        $CategoryService = new CategoryService();
        $gs = $CategoryService->getGeneralSettings();
        if (Session::has('currency')){
            $curr =$CategoryService->getCurrency(Session::get('currency'));
        }else{
            $curr =  $CategoryService->defaultCurrency();
        }
        if ($this->user_id != 0) {
            $price = $this->cprice + $gs->fixed_commission + ($this->cprice / 100) * $gs->percentage_commission;
            $price  =   round($price * $curr->value, 2);
        }else{
            $price  = round($this->cprice * $curr->value,2);
        }
        $off_price = $this->pprice != null?true:false;
        $off_prices = round($this->pprice * $curr->value,2);
        $off_percent =0;
        if($off_price){
            $less_price =$off_prices - $price;
            $off_percent = round((100*$less_price)/$off_prices);
        }
        return [
            'off_price'=>$off_price,
            'off_percent'=>$off_percent
        ];
    }
}
