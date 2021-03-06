<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
	public function sent()
	{
	    return $this->belongsTo('App\User', 'sent_user');
	}

	public function recieved()
	{
	    return $this->belongsTo('App\User', 'recieved_user');
	}

	public function messages()
	{
	    return $this->hasMany('App\Message');
	}

	public function notifications()
	{
	    return $this->hasMany('App\UserNotification');
	}
}
