<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Attendance;
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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth()->user()->id;
       // Session::put('punch_in','');
        $punch = Session::get('punch_in');
        $attendance = '';
        if($punch)
        {
            $attendance = Attendance::where('user_id',$user_id)->where('day',date('Y-m-d'))->get()->first();
        }
        $this->records_per_page = config('app.records_per_page');
      
        $projects = Project::where('employee_id', $user_id)->paginate($this->records_per_page);
      
        return view('user.dashboard', compact('projects' ,'punch' ,'attendance'));
    }
}
