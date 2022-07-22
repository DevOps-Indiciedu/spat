<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function index()
    {
    	$location['location'] = Location::all();
        return view('pages.location',$location);
    }

    public function insertOrupdate(Request $request)
    {
    	$request->validate([
    		'company_id'	=>	'required',
    		'name'	        =>	'required',
    		'address'	    =>	'required',
    		'phone'	        =>	'required',
    	]);

    	$data = Location::updateOrCreate(
            [
                'id'	=>	$request->hiddenId,
            ],
            [
        		'company_id'	=>	$request->company_id,
        		'name'	        =>	$request->name,
        		'address'	    =>	$request->address,
        		'phone'	        =>	$request->phone,
    	    ]
        );
    	return response()->json($data);
    }

    public function destroy(Request $request)
    {
    	$rec = Location::find($request->id)->delete();
        if($rec):
            $response = response()->json(['code'=>200, 'message'=>'Data Deleted successfully'], 200);
        endif;    
        return $response;
    }

    public function edit($location_id)
    {
        $data = Location::findOrFail($location_id);
        return response()->json($data);
    }
}
