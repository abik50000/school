<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MarkType;
use Redirect;

class MarkTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['mark_types'] = MarkType::orderBy('id','desc')->paginate(10);
   
        return view('mark_type.list',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mark_type.create');
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
            'mark' => 'required',
            'description' => 'required'
        ]);
   
        MarkType::create($request->all());
    
        return Redirect::to('mark_types')
       ->with('success','Greate! Mark Type created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Mark Type  $Mark Type
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mark Type  $Mark Type
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $where = array('id' => $id);
        $data['Mark Type_info'] = MarkType::where($where)->first();
        
        return view('mark_type.edit', $data);
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mark Type  $Mark Type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'mark' => 'required',
            'description' => 'required'
        ]);
         
        $update = [
            'mark' => $request->mark,
            'description' => $request->description
        ];

        MarkType::where('id',$id)->update($update);
   
        return Redirect::to('mark_types')
       ->with('success','Great! Mark Type updated successfully');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mark Type  $Mark Type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MarkType::where('id',$id)->delete();
   
        return Redirect::to('mark_types')->with('success','Mark Type deleted successfully');
    }
}
