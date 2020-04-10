<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_id','product_id','name','email','review','rating','review_date'];
    public $timestamps = false;
    
    public static function ratings($productid){
        $stars = Review::where('product_id',$productid)->avg('rating');
        $ratings = number_format((float)$stars, 1, '.', '')*20;
        return $ratings;
    }
}
