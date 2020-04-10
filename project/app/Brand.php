<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['photo','url','name'];
    public $timestamps = false;
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
