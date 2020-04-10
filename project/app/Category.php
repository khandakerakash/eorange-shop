<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category_new';
    /*protected $fillable = ['cat_name', 'cat_slug','featured','photo',"cat_bg"
    ,"slider_1","slider_2","slider_3"];*/
    public $timestamps = false;

    public function parent(){
        return $this->belongsTo(Category::class,'parent_id');
    }
    public function subCategory(){
        return $this->hasMany(Category::class,'parent_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'category_product','category_id','product_id');
    }
    /**
     * cat->product->brand
     * cat->product->seller
     */
    public function brand(){

    }
}
