<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Holidays;
use App\Models\Leave;
use App\Models\Client;
use App\Models\Attendance;
use Carbon\Carbon;
use DB;
class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    protected $records_per_page = '';

    public function _construct()
    {
        $this->records_per_page = config('app.records_per_page');
    }
    public function dashboard()
    {
        $employees_count = User::count();
        $project_count = Project::count();
        $clients_count = Client::count();
        $working_project_count = Project::where('status','In Progress')->count();
        $projects = Project::paginate($this->records_per_page);

        $today_birthday = User::select('firstname', 'lastname')->where('birthdate', date('Y-m-d'))->get();
        $today_leave    = Leave::whereDate('from_date', '<=', date("Y-m-d"))
                        ->whereDate('to_date', '>=', date("Y-m-d"))
                        ->where( 'status','Approved')
                        ->get();

        $upcoming_holiday = Holidays::whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();

        return view('admin.dashboard', compact( 'employees_count' ,'project_count', 'working_project_count','clients_count' ,'projects','today_birthday','today_leave','upcoming_holiday'));
    }

    public function get_employees()
    {
        $employees = User::all();
        return view('admin.employee', compact( 'employees' ));
    }
    public function get_employee_detail($id)
    {
        $employee = User::where('id', $id)->first();  
        return view('admin.employeedetail', compact( 'employee' ));
    }
    public function get_attendance_detail(Request $request)
    {

        if(isset($_REQUEST['employee']) && !empty($_REQUEST['employee']) )
        {
             
           $attendance = Attendance::where('user_id',$_REQUEST['employee'])
                        ->where('day', date('Y-m-d', strtotime($_REQUEST['attendance_date'])))
                        ->get();             
        }
        else if(isset($_REQUEST['attendance_date']) && !empty($_REQUEST['attendance_date']) )
        {
            if($_REQUEST['employee']){
                $attendance = Attendance::where('day', date('Y-m-d', strtotime($_REQUEST['attendance_date'])))
                 ->where('user_id',$_REQUEST['employee'])
                 ->get();      
            }
            else{
            $attendance = Attendance::where('day', date('Y-m-d', strtotime($_REQUEST['attendance_date'])))
                ->get();          
            }
        }
        else
        {
           $attendance = Attendance::where('day', date('Y-m-d'))->get();  
        }
        $employees = User::all();

        $attendancess = Attendance::select('day','present')
        ->whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))->get();
       /* echo "<pre>";
        print_r($attendancess);
        echo "</pre>";*/
        return view('admin.attendence', compact( 'attendance' ,'employees'));
    }
}

?>