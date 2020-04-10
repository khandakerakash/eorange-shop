<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';



    protected $fillable = [
        'name', 'address', 'phone',  'email','membership_number','point', 'current_point', 'type', 'dob',
    ];

}



