<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Services\CategoryService;
use function foo\func;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Gallery;
use App\Currency;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;
use URL;
class UserProductController extends Controller
{

    /**
     * @var CategoryService
     */
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->middleware('auth:user');
        $this->categoryService = $categoryService;
    }
    public function index()
    {
    	$user = Auth::guard('user')->user();
    	$user->load(['products.latestcategory'=>function($query){
    	    $query->orderBy('id', 'desc');
        }]);

    	$prods = [];

    	if(count($user->products)>0){
    	    $prods = $user->products;
        }


        $sign = Currency::where('is_default','=',1)->first();


        return view('user.product.index',compact('prods','sign'));
    }
    public function getData(Request $request){
        $user = Auth::guard('user')->user();
        $sign =Currency::where('is_default', '=', 1)->first();
        $keyword = $request->keyword;
        $product = $user->products()->with(['user'])
            ->where(function ($q) use($keyword){
                $q->where('name','LIKE','%'.$keyword.'%')
                ->orWhere('id',$keyword);
            })->latest()

            ->paginate(20);
        $product =$this->paginateMap($product,function ($prod) use($sign){
            $prod['image'] =  URL::to('/').'/assets/images/'.$prod->photo;
            $prod['shop_name']= [
                'name'=>optional($prod->user)->shop_name,
                'route'=>$prod->user?route('front.vendor',str_replace(' ', '-',optional($prod->user)->shop_name)):''
            ];
            $prod['name']= [
                'name'=>str_limit($prod->name,50),
                'route'=>route('front.product',['id' => $prod->id, 'slug' => $prod->name])
            ];

            $prod['price']= [
                'sign'=>$sign->sign,
                'price'=>round(($prod->cprice * $sign->value), 2)
            ];
//            $prod->latestcategory->pluck('name')->toArray()
            $stck = (string)$prod->stock;

            if($stck == "0") {
                $stock_status = "Out Of Stock";
            }elseif($stck == null){
                $stock_status = 'Unlimited';
            }else{
                $stock_status = $prod->stock;
            }
            $prod['latest_category']= $prod->latestcategory->first();
            $prod['stock']= $stock_status;
            $classs = $prod->status == 1?'success':'danger';
            $label = $prod->status == 1?'Active':'Inactive';
            $prod['status']= [
                'class'=>$classs,
                'label'=>$label,
                'value'=>$prod->status,
                'active_route'=>route('admin-prod-st',['id1'=>$prod->id,'id2'=>1]),
                'inactive_route'=>route('admin-prod-st',['id1'=>$prod->id,'id2'=>0]),
            ];
            $prod['action']= [
                'route'=>[
                    'edit'=>route('admin-prod-edit',$prod->id),
                    'delete'=>route('admin-prod-delete',$prod->id),
                ],
                'id'=>$prod->id
            ];

            return $prod;
        });
        return response()->json([
            'data'=>[
                'product'=>$product,
                'keyword'=>$keyword
            ]
        ]);



    }
    public function paginateMap($data,$callback){
        $collec = $data->getCollection()->map($callback);
        return $data->setCollection($collec);
    }
    public function create()
    {
        $cats = $this->categoryService->getCatetory();
        $sign = Currency::where('is_default', '=', 1)->first();
        $brands = Brand::all();

        return view('user.product.create',compact('cats','sign', 'brands'));
    }

      public function status($id1,$id2)
        {
            $prod = Product::findOrFail($id1);
            $prod->status = $id2;
            $prod->update();
            Session::flash('success', 'Successfully Updated The Status.');
            return redirect()->route('user-prod-index');
        }

    public function store(StoreValidationRequest $request)
    {
        $user = Auth::guard('user')->user();
        $this->validate($request, [
               'photo' => 'required',
               'categories' => 'required'
           ]);
        $prod = new Product;
        $prod->user_id = $user->id;

        $sign = Currency::where('is_default','=',1)->first();
        $input = $request->all();


            if(in_array(null, $request->features) || in_array(null, $request->colors))
            {
                $input['features'] = null;  
                $input['colors'] = null;
            }
            else 
            {             
                $input['features'] = implode(',', $request->features);  
                $input['colors'] = implode(',', $request->colors);                 
            }

            if(empty($request->scheck ))
            {
                $input['size'] = null;
            }
            else{
            $input['size'] = implode(',', $request->size); 
            }


            if(empty($request->colcheck ))
            {
                $input['color'] = null;
            }
            else{
            $input['color'] = implode(',', $request->color); 
            }

            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);           
            $input['photo'] = $name;
            }       
         
        if (!empty($request->tags)) 
         {
            $input['tags'] = implode(',', $request->tags);       
         }  

        if ($request->pccheck == ""){
            $input['product_condition'] = 0;
        }
        if ($request->shcheck == ""){
            $input['ship'] = null;
        }  
        if (!empty($request->meta_tag)) 
         {
            $input['meta_tag'] = implode(',', $request->meta_tag);       
         }  
        if ($request->secheck == "") 
         {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;         
         } 
         $input['cprice'] = ($input['cprice'] / $sign->value);
         $input['pprice'] = ($input['pprice'] / $sign->value);             
        $prod->fill($input)->save();
        $lastid = $prod->id;
        $cat =implode(',', $request->categories);
        $categoryId = DB::select( DB::raw("SELECT distinct(c1.id) FROM 
category_new as c1 left join category_new as 
c2 on c2.parent_id = c1.id left join category_new as c3
 on c3.parent_id = c2.id where c1.id in ($cat) or 
 c2.id in ($cat) or c3.id in ($cat)"));
        $myids = [];
        foreach ($categoryId as $cat){
            $myids[] = $cat->id;
        }

        $prod->latestcategory()->attach($myids);

        if ($files = $request->file('gallery')){
            foreach ($files as $file){
                $gallery = new Gallery;
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images/gallery',$name);
                $gallery['photo'] = $name;
                $gallery['product_id'] = $lastid;
                $gallery->save();
            }
        }
        Session::flash('success', 'New Product added successfully.');
        return redirect()->route('user-prod-index');
    }

    public function edit($id)
    {
        $cats = $this->categoryService->getCatetory();
        $prod = Product::with('latestcategory')->findOrFail($id);
        $selectedCategory = $prod->latestcategory->pluck('id');
        $brands = Brand::all();
        $sign = Currency::where('is_default','=',1)->first();
        if($prod->size != null)
        {
            $size = explode(',', $prod->size);            
        }
        if($prod->color != null)
        {
            $colrs = explode(',', $prod->color);            
        }
        if($prod->tags != null)
        {
            $tags = explode(',', $prod->tags);            
        }
        if($prod->meta_tag != null)
        {
            $metatags = explode(',', $prod->meta_tag);            
        }
        if($prod->features!=null && $prod->colors!=null)
        {
            $title = explode(',', $prod->features);
            $details = explode(',', $prod->colors);
        }

        return view('user.product.edit',compact('cats','prod','selectedCategory','size','colrs','tags','metatags','title','details','sign', 'brands'));
    }

    public function update(UpdateValidationRequest $request, $id)
    {

       $prod = Product::findOrFail($id);
        $sign = Currency::where('is_default','=',1)->first();
        $input = $request->all();
        if ($request->galdel == 1){
            $gals = Gallery::where('product_id',$id)->get();
            foreach ($gals as $gal) {
                    if (file_exists(public_path().'/assets/images/'.$gal->photo)) {
                        unlink(public_path().'/assets/images/'.$gal->photo);
                    }
                $gal->delete();
            }
            
        }
        if(!in_array(null, $request->features) && !in_array(null, $request->colors))
        {             
            $input['features'] = implode(',', $request->features);  
            $input['colors'] = implode(',', $request->colors);                 
        }
        else
        {
            if(in_array(null, $request->features) || in_array(null, $request->colors))
            {
                $input['features'] = null;  
                $input['colors'] = null;
            }
            else
            {
                $features = explode(',', $prod->features);
                $colors = explode(',', $prod->colors);
                $input['features'] = implode(',', $features);  
                $input['colors'] = implode(',', $colors);
            }
        }  

            if(empty($request->scheck ))
            {
                $input['size'] = null;
            }
            else{
                if (!empty($request->size)) 
                 {
                    $input['size'] = implode(',', $request->size);       
                 }  
                if (empty($request->size)) 
                 {
                    $input['size'] = null;       
                 }  
            }

            if(empty($request->colcheck ))
            {
                $input['color'] = null;
            }
            else{
                if (!empty($request->color)) 
                 {
                    $input['color'] = implode(',', $request->color);       
                 }  
                if (empty($request->color)) 
                 {
                    $input['color'] = null;       
                 }  
            }

            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);           
                $input['photo'] = $name;
            }       
         
        if (!empty($request->tags)) 
         {
            $input['tags'] = implode(',', $request->tags);       
         }  
        if (empty($request->tags)) 
         {
            $input['tags'] = null;       
         }
        if ($request->pccheck == ""){
            $input['product_condition'] = 0;
        }
        if ($request->shcheck == ""){
            $input['ship'] = null;
        }  
        if (!empty($request->meta_tag)) 
         {
            $input['meta_tag'] = implode(',', $request->meta_tag);       
         }  
        if ($request->secheck == "") 
         {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;         
         }   
         $input['cprice'] = $input['cprice'] / $sign->value;
         $input['pprice'] = $input['pprice'] / $sign->value; 
         //return $input; 
      
        $prod->update($input);
        //categories
        $cat =implode(',', $request->categories);
        $categoryId = DB::select( DB::raw("SELECT distinct(c1.id) FROM 
category_new as c1 left join category_new as 
c2 on c2.parent_id = c1.id left join category_new as c3
 on c3.parent_id = c2.id where c1.id in ($cat) or 
 c2.id in ($cat) or c3.id in ($cat)"));
        $myids = [];
        foreach ($categoryId as $cat){
            $myids[] = $cat->id;
        }

        $prod->latestcategory()->sync($myids);
        $lastid = $prod->id;
        if ($files = $request->file('gallery')){
            foreach ($files as $file){
                $gallery = new Gallery;
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images/gallery',$name);
                $gallery['photo'] = $name;
                $gallery['product_id'] = $lastid;
                $gallery->save();
            }
        }
        Session::flash('success', 'Product updated successfully.');
        return redirect()->route('user-prod-index');
    }

    public function destroy($id)
    {
        $prod = Product::findOrFail($id);
        if($prod->user_id != Auth::guard('user')->user()->id)
        {
            return redirect()->back();
        }
        if($prod->galleries->count() > 0)
        {
            foreach ($prod->galleries as $gal) {
                    if (file_exists(public_path().'/assets/images/'.$gal->photo)) {
                        unlink(public_path().'/assets/images/'.$gal->photo);
                    }
                $gal->delete();
            }

        }
        if($prod->reviews->count() > 0)
        {
            foreach ($prod->reviews as $gal) {
                $gal->delete();
            }
        }
        if($prod->wishlists->count() > 0)
        {
            foreach ($prod->wishlists as $gal) {
                $gal->delete();
            }
        }
                    if (file_exists(public_path().'/assets/images/'.$prod->photo)) {
                        unlink(public_path().'/assets/images/'.$prod->photo);
                    }
        $prod->delete();
        Session::flash('success', 'Product deleted successfully.');
        return redirect()->route('user-prod-index');
    }

}
