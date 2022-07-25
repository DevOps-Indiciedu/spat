<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserManagement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index()
    {
    	$user['user'] = UserManagement::all();
        return view('pages.user_management',$user);
    }

    public function insertOrupdate(Request $request)
    {
        if($request->hiddenId == ""):
            $email = "required|email|unique:users";
        else:    
            $email = "required";
        endif;    
    	$request->validate([
    		'name'	            =>	'required',
    		'email'             =>   $email,
    		'phone'	            =>	'required',
    		'designation_id'	=>	'required',
    		'company_id'	    =>	'required',
    		'location_id'	    =>	'required',
    		'department_id'	    =>	'required',
    		'role_id'	        =>	'required',
    		'status'	        =>	'required',
    	]);
        // if (!$validator->fails()) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make('secureism123'),
            ]);
        // }
    	$data = UserManagement::updateOrCreate(
            [
                'id'	=>	$request->hiddenId,
            ],
            [
        		'user_id'	    =>	$user->id,
        		'name'	        =>	$request->name,
        		'email'	        =>	$request->email,
        		'phone'	        =>	$request->phone,
        		'address'	    =>	$request->address,
        		'designation_id'=>	$request->designation_id,
        		'company_id'	=>	$request->company_id,
        		'location_id'	=>	$request->location_id,
        		'department_id'	=>	$request->department_id,
        		'role_id'	    =>	$request->role_id,
        		'status'	    =>	$request->status,
        		'image'	        =>	$request->role,
    	    ]
        );

    	return response()->json($data);
    }

    public function destroy(Request $request)
    {
    	$rec = UserManagement::find($request->id)->delete();
        if($rec):
            $response = response()->json(['code'=>200, 'message'=>'Data Deleted successfully'], 200);
        endif;    
        return $response;
    }

    public function edit($usermanagement_id)
    {
        $data = UserManagement::findOrFail($usermanagement_id);
        return response()->json($data);
    }
}
