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
    		'company'	=>	'required',
    	]);

    	$data = Task::updateOrCreate(
            [
                'id'	=>	$request->hiddenId,
            ],
            [
        		'company'	=>	$request->company,
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
