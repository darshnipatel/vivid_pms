<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\User;
class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $records_per_page = '';

    public function _construct()
    {
        $this->records_per_page = config('app.records_per_page');
    }
    public function index()
    {
        $leaves = Leave::paginate($this->records_per_page);
        $employees = User::all();
        return view('admin.leave',compact( 'leaves', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.addleave');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
      
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
        $leave = Leave::find($id);
    
        $leave->save();
        session()->flash('msg', 'Leave details updated');
        return back();
    }
    public function update_leave_status()
    {
            $leave = Leave::find($_REQUEST['leave_id']);
            $leave->status = $_REQUEST['status'];
            $leave->save();
            session()->flash('msg', 'Leave Status updated');
            return back();
    }
    public function create_csv()
    {
        $from = date('Y-m-d',strtotime($_REQUEST['from_date']));
        $to =  date('Y-m-d',strtotime($_REQUEST['to_date']));
        
       
        $leaves = Leave::where('employee_id',$_REQUEST['employee_id'])->whereBetween('from_date', [$from , $to ])->get();
       $fileName = 'leaves.csv';

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('From Date', 'To Date', 'Leave Type', 'Reason', 'Status');

        $callback = function() use($leaves, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($leaves as $leave) {
                $row['FromDate']  = $leave->from_date;
                $row['ToDate']    = $leave->to_date;
                $row['LeaveType']    = $leave->leave_type;
                $row['Reason']  = $leave->reason;
                $row['Status']  = $leave->status;
                fputcsv($file, array($row['FromDate'], $row['ToDate'], $row['LeaveType'], $row['Reason'], $row['Status']));
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leave = Leave::find($id);
        $leave->delete();
        session()->flash('msg', 'Leave deleted');
        return back();
    }
}
