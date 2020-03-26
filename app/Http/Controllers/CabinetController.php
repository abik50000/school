<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cabinet;
use Redirect;

class CabinetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['cabinets'] = Cabinet::orderBy('id','desc')->paginate(10);
   
        return view('cabinet.list',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cabinet.create');
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
            'cabinet' => 'required'
        ]);
   
        Cabinet::create($request->all());
    
        return Redirect::to('cabinets')
       ->with('success','Greate! cabinet created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\cabinet  $cabinet
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cabinet  $cabinet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $where = array('id' => $id);
        $data['cabinet_info'] = Cabinet::where($where)->first();
        
        return view('cabinet.edit', $data);
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cabinet  $cabinet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cabinet' => 'required'
        ]);
         
        $update = [
            'cabinet' => $request->cabinet
        ];

        Cabinet::where('id',$id)->update($update);
   
        return Redirect::to('cabinets')
       ->with('success','Great! cabinet updated successfully');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cabinet  $cabinet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cabinet::where('id',$id)->delete();
   
        return Redirect::to('cabinets')->with('success','cabinet deleted successfully');
    }
}
