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
use App\Day;
use App\Grade;
use App\Student;
use App\Subject;
use App\Notification;
use Redirect;
use Carbon\Carbon;

class StudentNavController extends Controller
{
   
    public function notifications()
    {
        $notifications = Notification::where([
                'uid' => Auth::user()->id
            ])->orderBy('created_at', 'desc')->get();

        return view('student.notifications', compact('notifications'));
    }

    public function diary()
    {
        $student = Student::where('user_id', Auth::user()->id)->first();
        //dd(Mark::whereMonth('day', '=', Carbon::createFromFormat('m', $request->month)->format('m'))->where('student_id', $student->id)->get());

        $subject_array = [];
        $subjects = Subject::where('class', $student->grade_id)->get();
            
        $days = Day::whereMonth('day', '=', Carbon::createFromFormat('m', 1)->format('m'))->orderBy('day', 'asc')->get();

        foreach ($subjects as $subject) {
            $subject_array[] = [
                'subject' => $subject->name,
                'marks' => $subject->marks($student->id, $days)
            ];

        }

        $this_month = now()->format('m');

        return view('student.diary', compact('subject_array','days', 'this_month'));
    }

    public function diary_month(Request $request)
    {
        $student = Student::where('user_id', Auth::user()->id)->first();
        //dd(Mark::whereMonth('day', '=', Carbon::createFromFormat('m', $request->month)->format('m'))->where('student_id', $student->id)->get());

        $subject_array = [];
        $subjects = Subject::where('class', $student->grade_id)->get();
            
        $days = Day::whereMonth('day', '=', Carbon::createFromFormat('m', $request->month)->format('m'))->orderBy('day', 'asc')->get();

        foreach ($subjects as $subject) {
            $subject_array[] = [
                'subject' => $subject->name,
                'marks' => $subject->marks($student->id, $days)
            ];

        }

        //dd($subject_array);
        
        $this_month = now()->format('m'); 
        return view('student.diary', compact('subject_array','days', 'this_month'));
    }
  
}
