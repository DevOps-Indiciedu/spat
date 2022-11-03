<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\DB;
// use App\Rules\PhoneNumber;
use Validator;
use Auth;
use File;
use Illuminate\Support\Facades\Crypt;

class LocationController extends Controller
{
    public function index()
    {
        if(Auth::user()->system_admin == 1):
            $userID = 0;
        else:
            $userID = Auth::user()->id;    
        endif;    
    	$location['location'] = DB::select('call GetAllLocations('.$userID.')');
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

        if($request->hiddenId == ""):
            $companyFolder = getFolderName($request->company_id);
            $location_name =  str_replace(' ', '_', $request->name);
            $location_folder_name =  strtolower($location_name);
            $path = public_path().'/companies/'.$companyFolder.'/'.$location_folder_name;
            File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

            $data = DB::select('call InsertLocation(?,?,?,?,?)',
            [
                $request->company_id,
                $request->name,
                $request->address,
                $request->phone,
                Auth::user()->id,
            ]);
        else: 
            $data = DB::select('call UpdateLocation('.$request->hiddenId.', ?,?,?,?)',
            [
                $request->company_id,
                $request->name,
                $request->address,
                $request->phone,
            ]);
        endif;
    	return response()->json($data);
    }

    public function destroy(Request $request)
    {
        try {
            $rec = DB::select('call DeleteLocation('.$request->id.')');
            $response = response()->json(['code'=>200, 'message'=>'Data Deleted successfully'], 200);
    	} catch(Exception $e) {
            $response = response()->json(['code'=>404, 'message'=>'Data Not Deleted'], 404);
        }

        return $response;
    }

    public function edit($location_id)
    {
        $data = DB::SELECT('call EditLocation('.$location_id.')');
        return $data;
    }

    public function get_locations_by_companyID($company_id,$userID)
    {
        $output = '';
        $data = DB::select('call get_locations_by_companyID('.$company_id.','.Crypt::decrypt($userID).')');
        $output .= "<select class='form-control' name='location_id' id='location_id'>";
        $output .= "<option value=''>Select Location</option>";
        foreach($data as $location):
            $output .= "<option value='".$location->id."'>".$location->name."</option>";
        endforeach;    
        $output .= "</select>";
        echo $output;
    }

    public function get_locations_by_assessorID($company_id,$userID)
    {
        $output = '';
        $data = DB::select('call get_locations_by_companyID('.$company_id.','.Crypt::decrypt($userID).')');
        $output .= "<select class='form-control' name='assessor_location_id' id='assessor_location_id'>";
        $output .= "<option value=''>Select Location</option>";
        foreach($data as $location):
            $output .= "<option value='".$location->id."'>".$location->name."</option>";
        endforeach;    
        $output .= "</select>";
        echo $output;
    }

    
}
