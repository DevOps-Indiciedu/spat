<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    public function index()
    {
    	$department['department'] = Department::all();
        return view('pages.department',$department);
    }

    public function insertOrupdate(Request $request)
    {
    	$request->validate([
    		'department'	=>	'required',
    	]);

    	$data = Department::updateOrCreate(
            [
                'id'	=>	$request->hiddenId,
            ],
            [
        		'department'	=>	$request->department,
    	    ]
        );

    	return response()->json($data);
    }

    public function destroy(Request $request)
    {
    	$rec = Department::find($request->id)->delete();
        if($rec):
            $response = response()->json(['code'=>200, 'message'=>'Data Deleted successfully'], 200);
        endif;    
        return $response;
    }

    public function edit($department_id)
    {
        $data = Department::findOrFail($department_id);
        return response()->json($data);
    }
}
