<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable = ['day', 'weekday', 'type', 'mark'];
    public $timestamps = false;
}
