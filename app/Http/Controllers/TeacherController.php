<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\User;
use Redirect;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['teachers'] = Teacher::orderBy('id','desc')->paginate(10);
   
        return view('teacher.list',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('role', 3)->get();
        return view('teacher.create', compact('users'));
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
            'user_id' => 'required'
        ]);
   
        Teacher::create($request->all());
    
        return Redirect::to('teachers')
       ->with('success','Greate! teacher created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $where = array('id' => $id);
        $data['teacher_info'] = Teacher::where($where)->first();
        
        $users = User::where('role', 3)->get();

        //$this_user = User::find($data['teacher_info']->user_id);
        //$users->forget(0);

        //dd($users);
        //$users->prepend('Select a shirt size');

        return view('teacher.edit', compact('users'), $data);
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'user_id' => 'required'
        ]);
         
        $update = [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'user_id' => $request->user_id
        ];

        Teacher::where('id',$id)->update($update);
   
        return Redirect::to('teachers')
       ->with('success','Great! teacher updated successfully');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Teacher::where('id',$id)->delete();
   
        return Redirect::to('teachers')->with('success','teacher deleted successfully');
    }
}
