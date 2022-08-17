<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Client;
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
        $projects = Project::paginate($this->records_per_page);
        return view('admin.dashboard', compact( 'employees_count' ,'project_count', 'clients_count' ,'projects'));
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
}

?>