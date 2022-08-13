<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Client;
use App\Models\User;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::paginate(3);
        $clients = Client::all();
        $employees = User::all();
        return view('admin.project',compact( 'projects' , 'clients', 'employees' ));

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
            'project_name' => 'required',
            'rate' => 'required',
            'employee_id' => 'required',
            'rate' => 'required',
        ]);
      
        $input = $request->all();
        $input['start_date'] = date('Y-m-d h:i:s', strtotime($input['start_date'])) ;
        $input['end_date'] = date('Y-m-d h:i:s', strtotime($input['end_date'])) ;
        $files = $request->file('project_files');
        $upload_array = array();
       
        foreach($files as $file){
                // Get filename with the extension
                $filenameWithExt = $file->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $file->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $file->storeAs('public/uploads',$fileNameToStore);
                $upload_array[] = $fileNameToStore;
                //Storage::delete('/public/uploads/'.$project->attached_files);
        }
        $input['attached_files']= implode(",",$upload_array);
        Project::create($input);
        
        session()->flash('msg', 'Project Created');
        return redirect()->route('project.index');
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
        $project = Project::find($id);
        $project->project_name = $request->project_name;
        $project->client_id = $request->client_id;
        $project->start_date =  date('Y-m-d h:i:s', strtotime($request->start_date)) ;
        $project->end_date =  date('Y-m-d h:i:s', strtotime($request->end_date)) ;
        $project->priority = $request->priority;
        $project->rate = $request->rate;
        $project->type = $request->type;
        $project->employee_id = $request->employee_id;
        $project->technology = $request->technology;
        $project->description = $request->description;

        $files = $request->file('edit_project_files');
        
        $upload_array = array();
        if($files){

            foreach($files as $file){
                    // Get filename with the extension
                    $filenameWithExt = $file->getClientOriginalName();
                    //Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $file->getClientOriginalExtension();
                    // Filename to store
                    $fileNameToStore = $filename.'_'.time().'.'.$extension;
                    // Upload Image
                    $path = $file->storeAs('public/uploads',$fileNameToStore);
                    $upload_array[] = $fileNameToStore;
                    //Storage::delete('/public/uploads/'.$project->attached_files);
            }
            $project->attached_files = implode(",",$upload_array);
        }
        $project->save();
        session()->flash('msg', 'Project details updated');
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
        $project = Project::find($id);
        $project->delete();
        session()->flash('msg', 'Project deleted');
        return back();
    }
}
