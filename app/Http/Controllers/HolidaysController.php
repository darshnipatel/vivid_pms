<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Holidays;

class HolidaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $holidays = Holidays::all();
        return view('admin.holidays',compact( 'holidays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required',
        ]);
       
        $input = $request->all();
        $input['date'] = date('Y-m-d h:i:s', strtotime($input['date'])) ;
        $input['status'] = "Active";
        Holidays::create($input);

        session()->flash('msg', 'Holiday Created');
        return redirect()->route('holidays.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $holiday = Holidays::find($id);
        $holiday->name = (isset($request->name)) ? $request->name : $holiday->name;
        $holiday->date =  date('Y-m-d h:i:s', strtotime($request->date)) ;
        $holiday->type = (isset($request->type)) ? $request->type : $holiday->type;
        $holiday->status = (isset($request->status)) ? $request->status : $holiday->status;
        $holiday->save();
        session()->flash('msg', 'Holiday details updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $holiday = Holidays::find($id);
        $holiday->delete();
        session()->flash('msg', 'Holiday deleted');
        return back();
    }
}
