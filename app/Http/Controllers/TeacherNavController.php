<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Teacher;
use App\User;
use App\Timetable;
use App\MarkType;
use App\MarkComment;
use App\Homework;
use App\Mark;
use App\Grade;
use App\Student;
use App\Notification;
use Redirect;

class TeacherNavController extends Controller
{
   
    public function journals()
    {
        return view('teacher.journals');
    }
  	
  	public function journal($id)
    {
    	$tt = Timetable::find($id);
        
        $students = Student::where('grade_id', $tt->grade_id)->get();
        $days = Timetable::where([
            'subject_id' => $tt->subject_id,
            'grade_id' => $tt->grade_id
        ])->get();
        $marks = MarkType::all();
        
        
        $homework = $this->previous($days, $tt->id)->homework();

        return view('teacher.journal', compact('tt', 'marks', 'students', 'days', 'homework'));
    }


	/*
	    //========================= AXIOS ROUTES ===============================
	*/

    public function set_mark(Request $request)
    {
        $req = $request->all();

        $test = Mark::where([
            'tt_id' => $req['params']['tt_id'],
            'student_id' => $req['params']['student_id']
        ])->first();

        if(!empty($test)) {
            if($test->mark_id == $req['params']['mark_id']) {
                return 'This mark is old!';
            } else {
                $test->mark_id = $req['params']['mark_id'];
                $test->day = Timetable::find($req['params']['tt_id'])->day;
                $test->save();
                return 'Mark was changed successfully!';
            }
        } else {
            $record = new Mark();
            $record->mark_id = $req['params']['mark_id'];
            $record->tt_id = $req['params']['tt_id'];
            $record->student_id = $req['params']['student_id'];
            $record->day = Timetable::find($req['params']['tt_id'])->day;
            $record->save();
            return 'New mark was added!';
        }


    }

    public function setHomework(Request $request) {
        $req = $request->all();

        $record = new Homework();
        $record->tt_id = $req['params']['tt_id'];
        $record->diff = $req['params']['diff'];
        $record->text = $req['params']['homework'];
        $record->save();

        return 'New homework was added!';
    }

    public function addComment(Request $request)
    {
        $req = $request->all();


        $record = new Notification();
        $record->text = $req['params']['text'];
        $record->status = 0;
        $record->created_at = now();

        $user = Student::find($req['params']['student_id']);
        $record->uid = $user->user_id;
        $record->save();



        $record = new MarkComment();
        $record->text = $req['params']['text'];
        $record->day = now();
        $record->student_id = $req['params']['student_id'];
        $record->subject_id = $req['params']['subject_id'];
        $record->teacher_id = Teacher::where('user_id', Auth::user()->id)->first()->id;
        $record->tt_id = $req['params']['tt_id'];
        $record->mark_id = $req['params']['mark_id'];
        $record->save();

        return 'New notification was added!';
     


    }


    /**** TEmporary function for checking axios ****/
    public function get_marks()
    {
        return 'Test was accomplished!';
    }
  	

  	// helpers

  	public function next($obj, $id)
	{
	    $previous = null;
	    foreach ($obj as $media)
	    {
	        if(!empty($previous && $previous->id == $id))
	        {
	            // Yay! Our current record  is the 'next' record.
	            return $media->id;
	        }
	        $previous = $media;
	    }
	    return null;
	}

	public function previous($obj, $id)
	{
	    $previous = null;
	    foreach ($obj as $media)
	    {
	        if(!empty($previous && $media->id == $id))
	        {
	            // Yay! Our previous record is the 'previous' record.
	            return $previous;
	        }
	        $previous = $media;
	    }
	    return null;
	}
}
