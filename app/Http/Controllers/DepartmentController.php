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
    		'company_id'	=>	'required',
    		'location_id'	=>	'required',
    		'department'	=>	'required',
    	]);

    	$data = Department::updateOrCreate(
            [
                'id'	=>	$request->hiddenId,
            ],
            [
        		'company_id'	=>	$request->company_id,
        		'location_id'	=>	$request->location_id,
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

    public function get_department_by_companyID($company_id,$location_id)
    {
        // $data = DB::select(
            //     'call get_locations_by_companyID(company_id)'
            // );
            // return response()->json($data);
        $output = '';
        $data = Department::where('company_id',$company_id)->where('location_id',$location_id)->get();
        $output .= "<select class='form-control' name='department_id' id='department_id'>";
        $output .= "<option value=''>Select Department</option>";
        foreach($data as $department):
            $output .= "<option value='".$department->id."'>".$department->department."</option>";
        endforeach;    
        $output .= "</select>";
        echo $output;
    }
}
