<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\Projects;
use Illuminate\Support\Facades\Crypt;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects['projects'] = DB::select('call GetAllProjects()');
        return view('pages.projects',$projects);
    }

    public function insertOrupdate(Request $request)
    {
    	$request->validate([
    		'company_standard_id'	=>	'required',
    		'project_title'	        =>	'required',
    		'company_id'	        =>	'required',
    		'assessor_id'	        =>	'required',
    		'auditor_id'	        =>	'required',
    		'type'	                =>	'required',
    	]);

        if($request->hiddenId == ""):
            $data = DB::select('call InsertProject(?,?,?,?,?,?,?,?,?,?,?,?,?)',
            [
                $request->company_standard_id,
                $request->project_title,
                $request->company_id,
                $request->assessor_id,
                $request->auditor_id,
                $request->start_date,
                $request->end_date,
                $request->implement_start_date,
                $request->implement_end_date,
                $request->certificate_valid_from,
                $request->certificate_valid_to,
                $request->type,
                '1',
            ]);
            
            // Project Logs 
            DB::select('call InsertProjectLogs('.$data[0]->LAST_ID.','.$request->auditor_id.')');
        else: 
            
            $check_data = Projects::findOrFail($request->hiddenId);
            if($check_data->auditor_id != $request->auditor_id):
                // Project Logs 
                DB::select('call InsertProjectLogs('.$request->hiddenId.','.$request->auditor_id.')');
            endif;    
            $data = DB::select('call UpdateProject('.$request->hiddenId.',?,?,?,?,?,?,?,?,?,?,?,?,?)',
            [
                $request->company_standard_id,
                $request->project_title,
                $request->company_id,
                $request->assessor_id,
                $request->auditor_id,
                $request->start_date,
                $request->end_date,
                $request->implement_start_date,
                $request->implement_end_date,
                $request->certificate_valid_from,
                $request->certificate_valid_to,
                $request->type,
                '1',
            ]);
    
        endif;

    	return response()->json($data);
    }

    public function edit($project_id)
    {
        $data = DB::SELECT('call EditProject('.$project_id.')');
        return $data;
    }

    public function destroy(Request $request)
    {
        try {
            $rec = DB::select('call DeleteProject('.$request->id.')');
            $response = response()->json(['code'=>200, 'message'=>'Data Deleted successfully'], 200);
    	} catch(Exception $e) {
            $response = response()->json(['code'=>404, 'message'=>'Data Not Deleted'], 404);
        }

        return $response;
    }

    public function project_list()
    {
        if(auth()->user()->usermanagement->role_id == 2):
            $projects['projects'] = DB::select('call GetAllAuditeeProjectList('.Auth::user()->id.')');
        elseif(auth()->user()->usermanagement->role_id == 3):
            $projects['projects'] = DB::select('call GetAllAuditorProjectList('.Auth::user()->id.')');
        endif;    
        return view('pages.project_list',$projects);
    }

    public function get_users_by_auditor_company($auditor_id)
    {
        $output = '';
        $data = DB::select('SELECT user_management.user_id,user_management.name FROM `assessor` LEFT JOIN user_management ON user_management.added_by = assessor.user_id WHERE assessor.id = '.$auditor_id.' AND user_management.added_by <> 0');
        $output .= "<select class='form-control' name='auditor_id' id='auditor_id'>";
        $output .= "<option value=''>Select Auditor</option>";
        foreach($data as $auditor_user):
            $output .= "<option value='".$auditor_user->user_id."'>".$auditor_user->name."</option>";
        endforeach;    
        $output .= "</select>";
        echo $output;
    }

    public function project_logs($id)
    {
        $project_logs['project_logs'] = DB::select('call GetProjectLogs('.Crypt::decrypt($id).')');
        return view('pages.project_logs',$project_logs);
    }
}
