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


class PackageSubscriptionController extends Controller
{
    public function index()
    {
       $packages=DB::table('package_subscriptions')->get()->toArray();
       return view('pages.package_subscription',array('list'=>$packages));
    }
     public function insertOrupdate(Request $request)
    {
    	$request->validate([
    		'company_id'	=>	'required',
    		'package_id'	=>	'required',
    		'start_date'=>   'required',
    		'end_date'	=>	'required',
    	
    	]);

        if($request->hiddenId == ""):
            $data = DB::select('insert into package_subscriptions (company_id,package_id,start_date,end_date) values(?,?,?,?)',
            [
                $request->company_id,
                $request->package_id,
                $request->start_date,
                $request->end_date
            ]);
        else: 
            $data = DB::select('update package_subscriptions set company_id=?,package_id=?,start_date=?,end_date=? where ps_id=?',
            [
                 $request->company_id,
                $request->package_id,
                $request->start_date,
                $request->end_date,
                $request->hiddenId
            ]);
        endif;

    	return response()->json($data);
    }
     public function destroy(Request $request)
    {
    	try {
            $rec = DB::select('delete from package_subscriptions where ps_id=?',[$request->id]);
            $response = response()->json(['code'=>200, 'message'=>'Data Deleted successfully'], 200);
    	} catch(Exception $e) {
            $response = response()->json(['code'=>404, 'message'=>'Data Not Deleted'], 404);
        }    
        return $response;
    }

    public function edit($id)
    {
        $data = DB::SELECT('select * from package_subscriptions where ps_id=?',[$id]);
        return $data;
    }

}