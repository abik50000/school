<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarkComment extends Model
{
    protected $fillable = ['mark_id', 'student_id', 'teacher_id', 'subject_id', 'tt_id', 'day', 'text'];
    public $timestamps = false;
}
