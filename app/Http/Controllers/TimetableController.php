<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Timetable;
use App\Subject;
use App\Lesson;
use App\Teacher;
use App\Cabinet;
use App\Grade;
use Redirect;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['timetables'] = Timetable::orderBy('id','desc')->paginate(10);
   
        return view('timetable.list',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::all();
        $teachers = Teacher::all();
        $cabinets = Cabinet::all();
        $lessons = Lesson::all();
        $subjects = Subject::all();
        return view('timetable.create', compact('teachers', 'grades', 'cabinets', 'lessons', 'subjects'));
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required',
            'lesson_id' => 'required',
            'teacher_id' => 'required',
            'grade_id' => 'required',
            'day' => 'required',
            'cabinet_id' => 'required'
        ]);
   
        Timetable::create($request->all());
    
        return Redirect::to('timetables')
       ->with('success','Greate! timetable created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $where = array('id' => $id);
        $data['timetable_info'] = Timetable::where($where)->first();
        
        $grades = Grade::all();
        $teachers = Teacher::all();
        $cabinets = Cabinet::all();
        $lessons = Lesson::all();
        $subjects = Subject::all();
        
        return view('timetable.edit', compact('teachers', 'grades', 'cabinets', 'lessons', 'subjects'), $data);
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'subject_id' => 'required',
            'lesson_id' => 'required',
            'teacher_id' => 'required',
            'grade_id' => 'required',
            'day' => 'required',
            'cabinet_id' => 'required'
        ]);
         
        $update = [
            'subject_id' => $request->subject_id,
            'lesson_id' => $request->lesson_id,
            'teacher_id' => $request->teacher_id,
            'grade_id' => $request->grade_id,
            'day' => $request->day,
            'cabinet_id' => $request->cabinet_id
        ];

        Timetable::where('id',$id)->update($update);
   
        return Redirect::to('timetables')
       ->with('success','Great! timetable updated successfully');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Timetable::where('id',$id)->delete();
   
        return Redirect::to('timetables')->with('success','timetable deleted successfully');
    }
}
