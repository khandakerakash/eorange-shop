<?php

namespace App\Http\Controllers\api;

use App\Category;
use App\Product;
use App\Childcategory;
use App\Review;
use App\Services\CategoryService;
use App\Subcategory;
use App\EorangeCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontApiController extends Controller
{
    /**
     * @var CategoryService
     */
    private $categoryService;

    /**
     * FrontApiController constructor.
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {

        $this->categoryService = $categoryService;
    }

    public function categoryProduct($slug, $min=0, $max=0)
    {


            $allCategories = [];
            $cat = EorangeCategory::with(['subCategory.subCategory'])
                ->where('slug','=',$slug)->first();
            $allCategories[] = $cat->id;
            if(count($cat->subCategory)>0){
                foreach ($cat->subCategory as $item) {
                    $allCategories[] = $item->id;
                    if(count($item->subCategory)>0){
                        foreach ($item->subCategory as $child){
                            $allCategories[] = $child->id;
                        }

                    }
                }
            }

            $products = Product::with('avgRating')->Categorized($allCategories)->Price($min,$max)
            ->paginate(24);



        return ["cat"=>$cat,"products"=>$products,"image"=>$cat->cat_bg];
    }

    public function sortCategoryProduct($slug,$sort)
    {
        $allCategories = [];
        $cat = EorangeCategory::with(['subCategory.subCategory'])
            ->where('slug','=',$slug)->first();
        $allCategories[] = $cat->id;
        if(count($cat->subCategory)>0){
            foreach ($cat->subCategory as $item) {
                $allCategories[] = $item->id;
                if(count($item->subCategory)>0){
                    foreach ($item->subCategory as $child){
                        $allCategories[] = $child->id;
                    }

                }
            }
        }

            if($sort == "new")
            {
                $products = Product::with('avgRating')->Categorized($allCategories)->orderBy('id','desc')->paginate(12);
            }
            else if($sort == "old")
            {
                $products = Product::with('avgRating')->Categorized($allCategories)->orderBy('id','asc')->paginate(12);

            }
            else if($sort == "low")
            {
                $products = Product::with('avgRating')->Categorized($allCategories)->orderBy('cprice','asc')->paginate(12);

            }
            else if($sort == "high")
            {
                $products = Product::with('avgRating')->Categorized($allCategories)->orderBy('cprice','desc')->paginate(12);

            }



        return ["cat"=>$cat,"products"=>$products,"image"=>$cat->cat_bg];
    }

    public function listCategory()
    {
        return $this->categoryService->getCatetory();
    }



}
