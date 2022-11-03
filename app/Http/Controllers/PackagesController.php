<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Company;
use App\Models\User;
use App\Models\UserManagement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use File;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;


class PackagesController extends Controller
{
    public function index()
    {
       $packages=DB::table('packages')->get()->toArray();
       return view('pages.packages',array('packages'=>$packages));
    }
     public function insertOrupdate(Request $request)
    {
    	$request->validate([
    		'title'	=>	'required',
    		'max_users'	=>	'required',
    		'max_locations'=>   'required',
    		'max_locations_users'	=>	'required',
    		'package_type'	=>	'required',
    		'package_amount'	=>	'required',
    	]);

        if($request->hiddenId == ""):
            $data = DB::select('insert into packages (title,max_users,max_locations,max_locations_users,package_type,package_amount) values(?,?,?,?,?,?)',
            [
                $request->title,
                $request->max_users,
                $request->max_locations,
                $request->max_locations_users,
                $request->package_type,
                $request->package_amount
            ]);
        else: 
            $data = DB::select('update packages set title=?,max_users=?,max_locations=?,max_locations_users=?,package_type=?,package_amount=? where package_id=?',
            [
                $request->title,
                $request->max_users,
                $request->max_locations,
                $request->max_locations_users,
                $request->package_type,
                $request->package_amount,
                $request->hiddenId
            ]);
        endif;

    	return response()->json($data);
    }
     public function destroy(Request $request)
    {
    	try {
            $rec = DB::select('delete from packages where package_id=?',[$request->id]);
            $response = response()->json(['code'=>200, 'message'=>'Data Deleted successfully'], 200);
    	} catch(Exception $e) {
            $response = response()->json(['code'=>404, 'message'=>'Data Not Deleted'], 404);
        }    
        return $response;
    }

    public function edit($department_id)
    {
        $data = DB::SELECT('select * from packages where package_id=?',[$department_id]);
        return $data;
    }
     public function get_package_amount($package_id)
    {
      
       
         $data = DB::SELECT('select * from packages where package_id=?',[$package_id]);
         if(!empty($data[0]->package_amount))
         {
             $data=$data[0];
             echo $data->package_amount." PKR";
         }
         else
         {
             echo"0 PKR";
         }
         
         
       
    }
}