<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable = ['mark_id', 'student_id', 'tt_id', 'day', 'subject_id'];
    public $timestamps = false;

    public function mark()
	{
	    return $this->belongsTo('App\MarkType');
	}

	public function student()
	{
	    return $this->belongsTo('App\Student');
	}

	public function subject()
	{
	    return $this->belongsTo('App\Subject');
	}

	// public function times()
	// {
	//     return $this->hasOne('App\Timetable');
	// }
	
	// public function tt()
	// {
	//     return $this->belongsTo('App\Timetable');
	// }

}
