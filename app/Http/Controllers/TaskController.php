<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
    	$task['task'] = Task::all();
        return view('pages.task',$task);
    }

    public function insertOrupdate(Request $request)
    {
    	$request->validate([
    		'project_id'	=>	'required',
    		'title'	        =>	'required',
    		'start_datetime'=>	'required',
    		'end_datetime'  =>	'required',
    		'user_id'       =>	'required',
    		'priority'       =>	'required',
    		'taskstatus_id'  =>	'required',
    	]);

    	$data = Task::updateOrCreate(
            [
                'id'	=>	$request->hiddenId,
            ],
            [
        		'project_id'	=>	$request->project_id,
        		'task_title'	=>	$request->title,
        		'start_datetime'=>	$request->start_datetime,
        		'end_datetime'  =>	$request->end_datetime, 
        		'assign_to'     =>	$request->user_id, 
        		'priority'      =>	$request->priority, 
        		'status'        =>	$request->taskstatus_id, 
        		'task_des'      =>	$request->description, 
    	    ]
        );

    	return response()->json($data);
    }

    public function destroy(Request $request)
    {
    	$rec = Task::find($request->id)->delete();
        if($rec):
            $response = response()->json(['code'=>200, 'message'=>'Data Deleted successfully'], 200);
        endif;    
        return $response;
    }

    public function edit($task_id)
    {
        $data = Task::findOrFail($task_id);
        return response()->json($data);
    }
}
