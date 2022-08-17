<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

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
        $this->records_per_page = config('app.records_per_page');
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
        $projects = Project::where('employee_id', $user_id)->paginate($this->records_per_page);
        
        return view('user.dashboard', compact('projects'));
    }
}
