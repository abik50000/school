<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Day;
use Redirect;
use Carbon\Carbon;

class DayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['days'] = Day::orderBy('id','desc')->paginate(10);
   
        return view('day.list',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('day.create');
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
            'type' => 'required',
            'day' => 'required'
        ]);
        
        $weekMap = [
            0 => 'SU',
            1 => 'MO',
            2 => 'TU',
            3 => 'WE',
            4 => 'TH',
            5 => 'FR',
            6 => 'SA',
        ];


        $req = $request->all();


        $req['weekday'] = Carbon::createFromFormat('Y-m-d', $req['day'])->dayOfWeek;
       
        Day::create($req);
    
        return Redirect::to('days')
       ->with('success','Greate! day created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\day  $day
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\day  $day
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $where = array('id' => $id);
        $data['day_info'] = Day::where($where)->first();
        
        return view('day.edit', $data);
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\day  $day
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required',
            'day' => 'required'
        ]);
         
        $update = [
            'weekday' => Carbon::createFromFormat('Y-m-d', $request->day)->dayOfWeek,
            'type' => $request->type,
            'day' => $request->day
        ];


        Day::where('id',$id)->update($update);

    


   
        return Redirect::to('days')
       ->with('success','Great! day updated successfully');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\day  $day
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Day::where('id',$id)->delete();
   
        return Redirect::to('days')->with('success','day deleted successfully');
    }
}
