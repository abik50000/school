<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;
use Redirect;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['lessons'] = Lesson::orderBy('id','desc')->paginate(10);
   
        return view('lesson.list',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lesson.create');
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
            'start' => 'required',
            'end' => 'required',
            'lesson_change' => 'required',
            'lesson_number' => 'required'
        ]);
   
        Lesson::create($request->all());
    
        return Redirect::to('lessons')
       ->with('success','Greate! lesson created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $where = array('id' => $id);
        $data['lesson_info'] = Lesson::where($where)->first();
        
        return view('lesson.edit', $data);
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'start' => 'required',
            'end' => 'required',
            'lesson_change' => 'required',
            'lesson_number' => 'required'
        ]);
         
        $update = [
            'start' => $request->start,
            'end' => $request->end,
            'lesson_change' => $request->lesson_change,
            'lesson_number' => $request->lesson_number
        ];

        Lesson::where('id',$id)->update($update);
   
        return Redirect::to('lessons')
       ->with('success','Great! lesson updated successfully');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lesson::where('id',$id)->delete();
   
        return Redirect::to('lessons')->with('success','lesson deleted successfully');
    }
}
