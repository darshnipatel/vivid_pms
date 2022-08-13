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
    public function dashboard()
    {
        $employees_count = User::count();
        $project_count = Project::count();
        $clients_count = Client::count();
        
        return view('admin.dashboard', compact( 'employees_count' ,'project_count', 'clients_count' ));
    }

    public function get_employees()
    {
        $employees = User::all();
        return view('admin.employee', compact( 'employees' ));
    }
    public function get_employee_detail($id)
    {
        $employee = User::where('id', $id);
        return view('admin.employee-detail', compact( 'employee' ));
    }
}

?>