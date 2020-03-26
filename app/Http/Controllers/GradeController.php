<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use Redirect;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['grades'] = Grade::orderBy('id','desc')->paginate(10);
   
        return view('grade.list',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grade.create');
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
            'grade' => 'required'
        ]);
   
        Grade::create($request->all());
    
        return Redirect::to('grades')
       ->with('success','Greate! grade created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $where = array('id' => $id);
        $data['grade_info'] = Grade::where($where)->first();
        
        return view('grade.edit', $data);
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'grade' => 'required',
            'name' => 'required'
        ]);
         
        $update = [
            'grade' => $request->grade,
            'name' => $request->name
        ];

        Grade::where('id',$id)->update($update);
   
        return Redirect::to('grades')
       ->with('success','Great! grade updated successfully');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Grade::where('id',$id)->delete();
   
        return Redirect::to('grades')->with('success','grade deleted successfully');
    }
}
