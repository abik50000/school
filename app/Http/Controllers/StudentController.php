<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\Grade;
use Redirect;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['students'] = Student::orderBy('id','desc')->with('user', 'grade')->paginate(10);
       
        return view('student.list',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('role', 2)->get();
        $grades = Grade::all();
        return view('student.create', compact('users', 'grades'));
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
            'firstname' => 'required',
            'lastname' => 'required',
            'grade_id' => 'required',
            'user_id' => 'required'
        ]);
   
        Student::create($request->all());
    
        return Redirect::to('students')
       ->with('success','Greate! student created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $where = array('id' => $id);
        $data['student_info'] = Student::where($where)->first();
        
        $users = User::where('role', 2)->get();
        $grades = Grade::all();
        return view('student.edit', compact('users', 'grades'), $data);
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'grade_id' => 'required',
            'user_id' => 'required'
        ]);
         
        $update = [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'grade_id' => $request->grade_id,
            'user_id' => $request->user_id
        ];

        Student::where('id',$id)->update($update);
   
        return Redirect::to('students')
       ->with('success','Great! student updated successfully');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::where('id',$id)->delete();
   
        return Redirect::to('students')->with('success','student deleted successfully');
    }
}
