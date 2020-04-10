<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Smimage extends Model
{
    protected $fillable = ['photo','url'];
    public $timestamps = false;
}
