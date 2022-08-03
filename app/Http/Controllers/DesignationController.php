<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;
use Illuminate\Support\Facades\DB;
use Auth;
class DesignationController extends Controller
{
    public function index()
    {
        if(Auth::user()->system_admin == 1):
            $userID = 0;
        else:
            $userID = Auth::user()->id;    
        endif;
    	$designation['designation'] =   DB::select('call GetAllDesignations('.$userID.')');
        return view('pages.designation',$designation);
    }

    public function insertOrupdate(Request $request)
    {
        $request->validate([
    		'designation'	=>	'required',
    	]);

        if($request->hiddenId == ""):
            $data = DB::select('call InsertDesignation(?,?,?)',
            [
                $request->designation,
                '1',
                Auth::user()->id,
            ]);
        else: 
            $data = DB::select('call UpdateDesignation('.$request->hiddenId.', ?,?)',
            [
                $request->designation,
                '1'
            ]);
        endif;

    	return response()->json($data);
    }

    public function destroy(Request $request)
    {
        try {
            $rec = DB::select('call DeleteDesignation('.$request->id.')');
            $response = response()->json(['code'=>200, 'message'=>'Data Deleted successfully'], 200);
    	} catch(Exception $e) {
            $response = response()->json(['code'=>404, 'message'=>'Data Not Deleted'], 404);
        }
    	// $rec = Designation::find($request->id)->delete();
        // if($rec):
        //     $response = response()->json(['code'=>200, 'message'=>'Data Deleted successfully'], 200);
        // endif;    
        return $response;
    }

    public function edit($designation_id)
    {
        $data = DB::SELECT('call EditDesignation('.$designation_id.')');
        return $data;
    }
}
