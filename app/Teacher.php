<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['firstname', 'lastname', 'user_id'];

    public function user()
	{
	    return $this->belongsTo('App\User');
	}
}
