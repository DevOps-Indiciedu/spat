<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\DB;
use Auth;
class DepartmentController extends Controller
{
    public function index()
    {
        if(Auth::user()->system_admin == 1):
            $userID = 0;
        else:
            $userID = Auth::user()->id;    
        endif;
    	$department['department'] = DB::select('call GetAllDepartments('.$userID.')');
        return view('pages.department',$department);
    }

    public function insertOrupdate(Request $request)
    {
    	$request->validate([
    		'company_id'	=>	'required',
    		'location_id'	=>	'required',
    		'department'	=>	'required',
    	]);

        if($request->hiddenId == ""):
            $data = DB::select('call InsertDepartment(?,?,?,?)',
            [
                $request->company_id,
                $request->location_id,
                $request->department,
                Auth::user()->id,
            ]);
        else: 
            $data = DB::select('call UpdateDepartment('.$request->hiddenId.', ?,?,?)',
            [
                $request->company_id,
                $request->location_id,
                $request->department,
            ]);
        endif;

    	return response()->json($data);
    }

    public function destroy(Request $request)
    {
    	try {
            $rec = DB::select('call DeleteDepartment('.$request->id.')');
            $response = response()->json(['code'=>200, 'message'=>'Data Deleted successfully'], 200);
    	} catch(Exception $e) {
            $response = response()->json(['code'=>404, 'message'=>'Data Not Deleted'], 404);
        }    
        return $response;
    }

    public function edit($department_id)
    {
        $data = DB::SELECT('call EditDepartment('.$department_id.')');
        return $data;
    }

    public function get_department_by_companyID($company_id,$location_id)
    {
        // $data = DB::select(
            //     'call get_locations_by_companyID(company_id)'
            // );
            // return response()->json($data);
        $output = '';
        $data = DB::select('call get_departments_by_companyID('.$company_id.','.$location_id.')');
        $output .= "<select class='form-control' name='department_id' id='department_id'>";
        $output .= "<option value=''>Select Department</option>";
        foreach($data as $department):
            $output .= "<option value='".$department->id."'>".$department->department."</option>";
        endforeach;    
        $output .= "</select>";
        echo $output;
    }
}
