<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Auth;
class TaskController extends Controller
{
    public function index()
    {
        if(Auth::user()->system_admin == 1):
            $userID = 0;
        else:
            $userID = Auth::user()->id;    
        endif;
    	$task['task'] = DB::select('call GetAllTasks('.$userID.')');
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

        if($request->hiddenId == ""):
            $data = DB::select('call InsertTask(?,?,?,?,?,?,?,?,?,?,?)',
            [
                $request->project_id,
                $request->title,
                $request->description,
                $request->priority,
                $request->user_id,
                $request->start_datetime,
                $request->end_datetime,
                $request->end_datetime,
                $request->taskstatus_id,
                0,
                Auth::user()->id,
            ]);
        else: 
            $data = DB::select('call UpdateTask('.$request->hiddenId.',?,?,?,?,?,?,?,?,?,?)',
            [
                $request->project_id,
                $request->title,
                $request->description,
                $request->priority,
                $request->user_id,
                $request->start_datetime,
                $request->end_datetime,
                $request->end_datetime,
                $request->taskstatus_id,
                0,
            ]);
        endif;

    	// $data = Task::updateOrCreate(
        //     [
        //         'id'	=>	$request->hiddenId,
        //     ],
        //     [
        // 		'project_id'	=>	$request->project_id,
        // 		'task_title'	=>	$request->title,
        // 		'start_datetime'=>	$request->start_datetime,
        // 		'end_datetime'  =>	$request->end_datetime, 
        // 		'assign_to'     =>	$request->user_id, 
        // 		'priority'      =>	$request->priority, 
        // 		'status'        =>	$request->taskstatus_id, 
        // 		'task_des'      =>	$request->description, 
    	//     ]
        // );

    	return response()->json($data);
    }

    public function destroy(Request $request)
    {
        try {
            $rec = DB::select('call DeleteTask('.$request->id.')');
            $response = response()->json(['code'=>200, 'message'=>'Data Deleted successfully'], 200);
    	} catch(Exception $e) {
            $response = response()->json(['code'=>404, 'message'=>'Data Not Deleted'], 404);
        }

        return $response;
    }

    public function edit($task_id)
    {
        $data = DB::SELECT('call EditTask('.$task_id.')');
        return $data;
    }
}
