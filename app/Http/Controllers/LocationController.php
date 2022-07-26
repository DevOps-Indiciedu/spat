<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\DB;
// use App\Rules\PhoneNumber;
use Validator;

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
    		'phone'	        =>	'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
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

    public function get_locations_by_companyID($company_id)
    {
        // $data = DB::select(
            //     'call get_locations_by_companyID(company_id)'
            // );
            // return response()->json($data);
        $output = '';
        $data = Location::where('company_id',$company_id)->get();
        $output .= "<select class='form-control' name='location_id' id='location_id'>";
        $output .= "<option value=''>Select Location</option>";
        foreach($data as $location):
            $output .= "<option value='".$location->id."'>".$location->name."</option>";
        endforeach;    
        $output .= "</select>";
        echo $output;
    }

    
}
