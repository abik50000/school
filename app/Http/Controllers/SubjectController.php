<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use Redirect;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['subjects'] = Subject::orderBy('id','desc')->paginate(10);
   
        return view('subject.list',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subject.create');
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
            'name' => 'required',
            'class' => 'required'
        ]);
   
        Subject::create($request->all());
    
        return Redirect::to('subjects')
       ->with('success','Greate! subject created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $where = array('id' => $id);
        $data['subject_info'] = Subject::where($where)->first();
        
        return view('subject.edit', $data);
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'class' => 'required'
        ]);
         
        $update = [
            'name' => $request->name,
            'class' => $request->class
        ];

        Subject::where('id',$id)->update($update);
   
        return Redirect::to('subjects')
       ->with('success','Great! subject updated successfully');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subject::where('id',$id)->delete();
   
        return Redirect::to('subjects')->with('success','subject deleted successfully');
    }
}
