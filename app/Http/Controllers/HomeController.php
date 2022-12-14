<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Attendance;
use App\Models\Leave;
use App\Models\Holidays;
use Carbon\Carbon;
use DB;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $records_per_page = '';

    public function _construct()
    {
        $this->middleware('auth');
        $this->records_per_page = config('app.records_per_page');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // DB::enableQueryLog();
        $today_birthday = User::select('firstname', 'lastname')->where('birthdate', date('Y-m-d'))->get();
        $today_leave    = Leave::whereDate('from_date', '<=', date("Y-m-d"))
                        ->whereDate('to_date', '>=', date("Y-m-d"))
                        ->where( 'status','Approved')
                        ->get();

        $upcoming_holiday = Holidays::whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        //$quries = DB::getQueryLog();
        //dd($quries);
        $user_id = Auth()->user()->id;
        $punch = Session::get('punch_in');
        $attendance = Attendance::where('user_id',$user_id)->where('day',date('Y-m-d'))->get()->first();
        $projects = Project::where('employee_id', $user_id)->paginate($this->records_per_page);
        $panding_projects = Project::where('employee_id', $user_id)
                            ->where('status','In Progress')->count();
        $leaves = Leave::select( DB::raw("DATEDIFF(to_date,from_date) AS days"))->where('employee_id', $user_id)->get();
        
        $leave_taken = 0;
        foreach($leaves as $leave){
            $leave_taken = $leave_taken + $leave->days;
        }
        return view('user.dashboard', compact('projects' ,'attendance' ,'today_birthday' ,'today_leave' ,'upcoming_holiday' ,'panding_projects','leave_taken'));
    }
}
