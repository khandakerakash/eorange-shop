<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\EorangeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    //

    public function index()
    {


      //  EorangeCategory::truncate();
        $info = Category::with(['subs.childs'])->get();
       // return $info;
        foreach ($info as $cat){
            $category = new  EorangeCategory();
            $category->name = $cat->cat_name;
            $category->slug = $cat->cat_slug;
            $category->photo = $cat->photo;
            $category->slider_1 = $cat->slider_1;
            $category->slider_2 = $cat->slider_2;
            $category->slider_3 = $cat->slider_3;
            $category->cat_bg = $cat->cat_bg;
            $category->status = 1;
            $category->save();
            if(count($cat->subs)>0){
                foreach ($cat->subs as $sub) {
                    $subcategory = new  EorangeCategory;
                    $subcategory->parent_id = $category->id;
                    $subcategory->name = $sub->sub_name;
                    $subcategory->slug = $sub->sub_slug;
                    $subcategory->slider_1 = $cat->slider_1;
                    $subcategory->slider_2 = $cat->slider_2;
                    $subcategory->slider_3 = $cat->slider_3;
                    $subcategory->cat_bg = $cat->cat_bg;
                    $subcategory->photo = $cat->photo;
                    $subcategory->status = 1;
                    $subcategory->save();
                    if(count($sub->childs)>0){
                        foreach ($sub->childs as $child) {
                            $childcategory = new  EorangeCategory;
                            $childcategory->parent_id = $subcategory->id;
                            $childcategory->name = $child->child_name;
                            $childcategory->slug = $child->child_slug;
                            $childcategory->slider_1 = $cat->slider_1;
                            $childcategory->slider_2 = $cat->slider_2;
                            $childcategory->slider_3 = $cat->slider_3;
                            $childcategory->cat_bg = $cat->cat_bg;
                            $childcategory->photo = $cat->photo;
                            $childcategory->status = 1;
                            $childcategory->save();
                        }
                    }
                }
            }
        }
        return $info;
        //return "hello world";
    }


    /**
     * @return array
     */
    public function product()
    {
        $notInsertedIDs = [];
        DB::table('category_product')->truncate();
        Product::with('category','subcategory','childcategory')->chunk(50, function ($product) use($notInsertedIDs) {

            foreach ($product as $item) {
                try{

                    $ids = [];
                    if($item->childcategory!=null){

                        $ids[] =  $item->childcategory->child_slug;
                    }if ($item->subcategory!=null) {
                        $ids[] = $item->subcategory->sub_slug;
                    }
                        $ids[] = $item->category->cat_slug;

                    $newCategory = EorangeCategory::whereIn('slug', $ids)->get()->pluck('id');
                    $item->latestcategory()->attach($newCategory);
                }catch (\Exception $e){
                    $notInsertedIDs[] = $item->id;
                }

            }
        });
        return $notInsertedIDs;
    }

    public function getaProduct($id)
    {
        return Product::with('latestcategory')->where('id',$id)->first();
    }

    public function info()
    {

        return EorangeCategory::with(['subCategory.subCategory'])
            ->whereNull('parent_id')->get();
    }
}
