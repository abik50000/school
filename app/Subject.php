<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mark;
use Carbon\Carbon;

class Subject extends Model
{
    protected $fillable = ['name', 'class'];





    public function marks($student_id, $days) {

    	$marks = Mark::where([
    		'student_id' => $student_id,
    		'subject_id' => $this->id
    	])->with('mark')->get();


    	foreach ($marks as $mark) {
    		$mark->day = Carbon::parse($mark->day)->format('Y-m-d');
    	}

    	$days_array = [];

    	foreach ($days as $day) {
    		$query = $marks->where('day', Carbon::parse($day->day)->format('Y-m-d'))->first();
    		if($query != null) {
    		
    			$days_array[] = [
    				'day' => $day->day,
    				'weekday' => $day->weekday,
    				'type' => $day->type,
    				'mark' => $query->mark()->first()->mark
    			];
    		} else {
    			$days_array[] = [
    				'day' => $day->day,
    				'weekday' => $day->weekday,
    				'type' => $day->type,
    				'mark' => ''
    			];
    		}
    	}
    	

    	return $days_array;
    }
}
