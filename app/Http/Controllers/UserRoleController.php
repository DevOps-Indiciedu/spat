<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserRole;
use Illuminate\Support\Facades\DB;

class UserRoleController extends Controller
{
    public function index()
    {
    	$role['role'] = UserRole::all();
        return view('pages.user_role',$role);
    }

    public function insertOrupdate(Request $request)
    {
    	$request->validate([
    		'role'	=>	'required',
    	]);

    	$data = UserRole::updateOrCreate(
            [
                'id'	=>	$request->hiddenId,
            ],
            [
        		'role'	=>	$request->role,
    	    ]
        );

    	return response()->json($data);
    }

    public function destroy(Request $request)
    {
    	$rec = UserRole::find($request->id)->delete();
        if($rec):
            $response = response()->json(['code'=>200, 'message'=>'Data Deleted successfully'], 200);
        endif;    
        return $response;
    }

    public function edit($role_id)
    {
        $data = UserRole::findOrFail($role_id);
        return response()->json($data);
    }

    public function req1()
    {
        return view('pages.req1');
    }

    public function req2()
    {
        return view('pages.req2');
    }

    public function req3()
    {
        return view('pages.req3');
    }
}
