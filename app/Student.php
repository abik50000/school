<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mark;
use App\Timetable;

class Student extends Model
{
    protected $fillable = ['firstname', 'lastname', 'user_id', 'grade_id'];

    public function user()
	{
	    return $this->belongsTo('App\User');
	}

	public function grade()
	{
	    return $this->belongsTo('App\Grade');
	}

	public function marks($subject_id)
	{
	    $tt = Timetable::where([
	    	'grade_id' => $this->grade_id,
	    	'subject_id' => $subject_id
	    ])->get();

	    $marks = Mark::where('student_id', $this->id)->get();

	    foreach($tt as $time){
	    	$marks = $time->marks->where('student_id', $this->id)->first();
	    	if(!empty($marks)) {
	    		$time->mark_id = $marks->mark_id;
	    		$time->desc = $marks->mark->mark;
	    	} 
	    	
	    }


	    return $tt;
	}
}
