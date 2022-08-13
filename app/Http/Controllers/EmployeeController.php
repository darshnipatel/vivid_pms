<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\Holidays;
use App\Models\Project;
class EmployeeController extends Controller
{
    protected $records_per_page;
    public function __construct(){

        $this->records_per_page = config('app.records_per_page');
    }

    public function getLeavePage()
    {
        $leaves = Leave::where('employee_id', Auth()->user()->id)->paginate( $this->records_per_page );
        return view('user.addleave', compact( 'leaves'));
    }
    public function addLeave(Request $request)
    {
        $this->validate($request, [
            'from_date' => 'required',
            'to_date' => 'required',
            'reason' => 'required',
        ]);
       
        $input = $request->all();
        $input['employee_id'] = Auth()->user()->id;
        $input['from_date'] = date('Y-m-d h:i:s', strtotime($input['from_date'])) ;
        $input['to_date'] = date('Y-m-d h:i:s', strtotime($input['to_date'])) ;
        Leave::create($input);
        $leaves = Leave::paginate(  $this->records_per_page );
        return view('user.addleave', compact( 'leaves' ));
    }

    public function getholidaysPage()
    {
        $holidays = Holidays::all();
        return view('user.holidays', compact( 'holidays'));
    }
    public function getProjectPage()
    {
        $emp_id = Auth()->user()->id;
        $projects = Project::where('employee_id' , $emp_id)->paginate(  $this->records_per_page );
        return view('user.project', compact( 'projects'));
    }
    public function getAttendencePage()
    {
        $emp_id = Auth()->user()->id;
        $attendence = Attendence::where('employee_id' , $emp_id)->paginate( $this->records_per_page );
        return view('user.attendence', compact( 'attendence'));
    }
}
