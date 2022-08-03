<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserRole;
use Illuminate\Support\Facades\DB;
Use Auth;
use Illuminate\Support\Facades\Crypt;

class UserRoleController extends Controller
{
    public function index()
    {
        if(Auth::user()->system_admin == 1):
            $userID = 0;
        else:
            $userID = Auth::user()->id;    
        endif;
    	$role['role'] = DB::select('call GetAllRoles('.$userID.')');
        return view('pages.user_role',$role);
    }

    public function insertOrupdate(Request $request)
    {
    	$request->validate([
    		'role'	=>	'required',
    	]);

        if($request->hiddenId == ""):
            $data = DB::select('call InsertRole(?,?)',
            [
                $request->role,
                Auth::user()->id
            ]);
        else: 
            $data = DB::select('call UpdateRole('.$request->hiddenId.', ?)',
            [
                $request->role,
            ]);
        endif;

    	return response()->json($data);
    }

    public function destroy(Request $request)
    {
    	try {
            $rec = DB::select('call DeleteRole('.$request->id.')');
            $response = response()->json(['code'=>200, 'message'=>'Data Deleted successfully'], 200);
    	} catch(Exception $e) {
            $response = response()->json(['code'=>404, 'message'=>'Data Not Deleted'], 404);
        }

        return $response;
    }

    public function edit($role_id)
    {
        $data = DB::SELECT('call EditRole('.$role_id.')');
        return $data;
    }

    public function role_rights($role_id)
    {
        if(Auth::user()->system_admin == 1):
            $where = "";
        else:
            $where = "WHERE user_role_rights.role_id =".Auth::user()->usermanagement->role_id;    
        endif;
        // $query = DB::select("select distinct id,title,parent_module_id from module where status = '1' order by id asc");
        $query = DB::select("SELECT DISTINCT(module.id) FROM `user_role_rights` LEFT JOIN action ON action.id = user_role_rights.action_id LEFT JOIN module ON module.id = action.module_id ".$where);
        $package_rights = array();
        foreach ($query as $mod) 
        {
            $action_arr = DB::SELECT("select m.id AS module_id, m.title as module_title, m.parent_module_id, a.id as action_id , a.title as action 
                                from action  a
                                inner join module m on m.id = a.module_id 
                                where
                                a.status = '1' and
                                a.module_id=".$mod->id);           
            foreach ($action_arr as $act_key => $act_value) 
            {
                $parent_module_arr = DB::SELECT("select title,id,parent_module_id from module 
                        where status = 1 AND id =".intval($act_value->parent_module_id)." ");
    
                if (count($parent_module_arr)  > 0)
                {
                    $package_rights[$parent_module_arr[0]->title][$act_value->module_title][] = array(
                            'action_id' => $act_value->action_id, 
                            'action_title' => $act_value->action, 
                            'module_id' => $act_value->module_id 
                            );
                }
                else
                {
                    $package_rights['NA'][$act_value->module_title][] = array(
                            'action_id' => $act_value->action_id, 
                            'action_title' => $act_value->action, 
                            'module_id' => $act_value->module_id 
                            );
                }
            }
            $selectedAct = DB::SELECT("select action_id from user_role_rights where role_id=".Crypt::decrypt($role_id));
            $sel2 = array();
            foreach($selectedAct as $sel)
            {
                $sel2[] = $sel->action_id;
            }
        }
        $page_data['package_rights'] = $package_rights;
        $page_data['sel2'] = $sel2;
        $page_data['role_id'] = Crypt::decrypt($role_id);
        return view('pages.role_rights',$page_data);
    }

    public function save_rights(Request $request)
    {
        $role_id = $request->role_id;
		$action_arr = $request->actions;
		DB::select('call DeleteRoleRights('.$role_id.')');
		
		$insert_arr['role_id'] = $role_id;
		$action_arr = $action_arr;
		
		foreach ($action_arr as $key => $value) 
		{		    
            $logs = DB::select('call InsertSystemLogs(?,?,?)',
            [
                Auth::id(),
                'inserted in user role right with action id - '.$value,
                date('Y-m-d H:i:s')
            ]);

            $data = DB::select('call InsertRoleRights(?,?)',
            [
                $role_id,
                $value,
            ]);
		}

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
