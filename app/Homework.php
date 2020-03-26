<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    protected $fillable = ['tt_id', 'text', 'diff'];
    public $timestamps = false;
}
