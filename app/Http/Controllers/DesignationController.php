<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;
use Illuminate\Support\Facades\DB;

class DesignationController extends Controller
{
    public function index()
    {
    	$designation['designation'] =  Designation::all();
        return view('pages.designation',$designation);
    }

    public function insertOrupdate(Request $request)
    {
    	$request->validate([
    		'designation'	=>	'required',
    	]);

    	$data = Designation::updateOrCreate(
            [
                'id'	=>	$request->hiddenId,
            ],
            [
        		'title'	=>	$request->designation,
    	    ]
        );

    	return response()->json($data);
    }

    public function destroy(Request $request)
    {
    	$rec = Designation::find($request->id)->delete();
        if($rec):
            $response = response()->json(['code'=>200, 'message'=>'Data Deleted successfully'], 200);
        endif;    
        return $response;
    }

    public function edit($designation_id)
    {
        $data = Designation::findOrFail($designation_id);
        return response()->json($data);
    }
}
