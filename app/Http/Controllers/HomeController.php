<?php

namespace App\Http\Controllers;
use Auth;
use App\Timetable;
use App\Teacher;
use App\Student;
use App\Subject;
use App\Grade;
use App\Notification;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        


        if(Auth::user()->isAdmin()) {
            return view('dashboard.admin');
        }

        if(Auth::user()->isStudent()) {
            $student = Student::where('user_id', Auth::user()->id)->first();
            $timetables = Timetable::whereDate('day', Carbon::today())->where('grade_id', $student->grade_id)->get();
            
            $grade = Grade::find($student->grade_id)->grade;
            $subjects = Subject::where('class', $grade)->get();

            foreach ($subjects as $subject) {
            	$tts = Timetable::where([
            		'grade_id' => $student->grade_id,
            		'subject_id' => $subject->id,
            	])->get();

            	$subject->marks = collect();
            	$subject->days = collect();

            	foreach ($tts as $tt) {
            		$subject->marks->push($tt->smark($student->id));
            		$subject->days->push($tt->day);
            	}
            }

            //dd(Carbon::today());

            $notifications = Notification::where([
                'uid' => Auth::user()->id,
                'status' => 0
            ])->orderBy('created_at', 'desc')->get();
                
            foreach ($notifications as $note) {
                $note->status = 1;
                $note->save();
            }

            return view('dashboard.student', compact('timetables', 'subjects', 'notifications'));
        }

        if(Auth::user()->isTeacher()) {

            $teacher = Teacher::where('user_id', Auth::user()->id)->first();
            $timetables = Timetable::whereDate('day', Carbon::today())->where('teacher_id', $teacher->id)->get();

            
            return view('dashboard.teacher', compact('timetables'));
        }

        if(Auth::user()->isParent()) {
            return view('dashboard.parent');
        }
    }

}
