<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['uid', 'status', 'created_at', 'text'];
    public $timestamps = false;
}
