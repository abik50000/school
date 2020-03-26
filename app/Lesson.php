<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['start', 'end', 'lesson_change', 'lesson_number'];
}
