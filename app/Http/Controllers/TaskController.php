<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Crypt;

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
    		'department_id' =>	'required',
    	]);

        if($request->hiddenId == ""):
            $data = DB::select('call InsertTask(?,?,?,?,?,?,?,?,?,?,?,?,?)',
            [
                $request->project_id,
                $request->department_id,
                Crypt::decrypt($request->reqId),
                $request->title,
                $request->description,
                '1',
                $request->user_id,
                $request->start_datetime,
                $request->end_datetime,
                $request->end_datetime,
                1,
                0,
                Auth::user()->id,
            ]);
        else: 
            $data = DB::select('call UpdateTask('.$request->hiddenId.',?,?,?,?,?,?,?,?,?,?,?,?)',
            [
                $request->project_id,
                $request->department_id,
                Crypt::decrypt($request->reqId),
                $request->title,
                $request->description,
                '1',
                $request->user_id,
                $request->start_datetime,
                $request->end_datetime,
                $request->end_datetime,
                1,
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
        // $data['depID'] = get_user($data[0]->assign_to)->department_id;
        return $data;
    }

    public function view_task_details($id,$reqID)
    {
        $data = DB::table('tasks')->where(array('project_id' => Crypt::decrypt($id), 'req_id' => Crypt::decrypt($reqID)))->get()->toArray();
        $output = '';
        $i = 1;
        foreach($data as $task):
            $output .= '
                <tr>
                    <td class="text-center">'.$i++.'</td>
                    <td class="text-center">'.get_user($task->assign_to)->username.'</td>
                    <td>'.$task->task_title.'</td>
                    <td class="text-center">'.DMY($task->created_at).'</td>
                    <td class="text-center">'.get_taskStatus($task->status)->title.'</td>
                    <td class="text-center">
                        <a href="#" data-id="'.$task->id.'" data-req-id="'.$reqID.'" class="btn btn-warning btn-sm edit_task" data-toggle="modal" data-target="#ObservationTaskModal">
                            Edit Task
                        </a>
                    </td>
                </tr>
            ';
        endforeach;
        echo $output;
    }

    
}
