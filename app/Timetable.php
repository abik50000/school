<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    protected $fillable = ['lesson_id', 'grade_id', 'subject_id', 'teacher_id', 'cabinet_id', 'day'];

    public function lesson()
	{
	    return $this->belongsTo('App\Lesson');
	}

	public function grade()
	{
	    return $this->belongsTo('App\Grade');
	}

	public function subject()
	{
	    return $this->belongsTo('App\Subject');
	}

	public function teacher()
	{
	    return $this->belongsTo('App\Teacher');
	}

	public function cabinet()
	{
	    return $this->belongsTo('App\Cabinet');
	}

	// public function marks()
 //    {
 //        return $this->hasMany('App\Mark', 'tt_id');
 //    }

    public function marks()
    {
	    return $this->hasMany('App\Mark', 'tt_id');
	}

	public function homework()
    {
    	$query = $this->hasMany('App\Homework', 'tt_id')->first();
    	if(!empty($query)) {
    		return $this->hasMany('App\Homework', 'tt_id')->first()->text;
    	} else {
    		return '';
    	}
	    
	}

	public function smark($student_id)
    {
	    $marks = $this->hasMany('App\Mark', 'tt_id');

	    return $marks->where('student_id', $student_id)->get();
	}

}
