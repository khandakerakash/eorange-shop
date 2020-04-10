<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EorangeCategory extends Model
{
    protected $fillable = [
        "name",
        "slug",
        "photo",
        "slider_1",
        "slider_2",
        "slider_3",
        "cat_bg",
        "status",
        "parent_id"
    ];
    protected $table = "category_new";
    public function subCategory()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product','category_id','product_id');
    }


    public function products123()
    {
        return $this->hasManyThrough(
            'App\Product', 'App\EorangeCategory',
            'parent_id', 'product_id', 'id'
        );
    }








}
