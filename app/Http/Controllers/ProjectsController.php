<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\Projects;
use Illuminate\Support\Facades\Crypt;
use PDF;

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
    		'location_id'	        =>	'required',
    		'assessor_id'	        =>	'required',
    		'assessor_location_id'	        =>	'required',
    		'auditor_id'	        =>	'required',
    		'type'	                =>	'required',
    	]);
        
        
        if($request->hiddenId == ""):
            if($request->has('same_qa')):
                $auditor_qa_id = $request->auditor_id;
            else:
                $auditor_qa_id = $request->auditor_qa_id;
            endif;
            DB::beginTransaction();
            try {
                $data = DB::select('call InsertProject(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
                [
                    $request->company_standard_id,
                    $request->project_title,
                    $request->company_id,
                    $request->location_id,
                    $request->assessor_id,
                    $request->assessor_location_id,
                    $request->auditor_id,
                    $auditor_qa_id,
                    $request->start_date,
                    $request->end_date,
                    $request->implement_start_date,
                    $request->implement_end_date,
                    $request->certificate_valid_from,
                    $request->certificate_valid_to,
                    $request->type,
                    '1',
                    $request->yesno_id,
                ]);

                $templates = DB::table("templates")->where('standard_id',$request->company_standard_id)->get();
                foreach($templates as $temp_name):
                     DB::table('project_planning')->insert(array('project_id' => $data[0]->LAST_ID, 'template_name' => $temp_name->template_name,'added_by' => Auth::user()->id));
                endforeach;
                
                // Project Logs 
                DB::select('call InsertProjectLogs('.$data[0]->LAST_ID.','.$request->auditor_id.')');
                DB::commit();
            } catch (\Exception $e) {
                // return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                $data = $e->getMessage();
            } 
        else: 
            
            $check_data = Projects::findOrFail($request->hiddenId);
            if($check_data->auditor_id != $request->auditor_id):
                // Project Logs 
                DB::select('call InsertProjectLogs('.$request->hiddenId.','.$request->auditor_id.')');
            endif;    
            if($request->has('same_qa')):
                $auditor_qa_id = $request->auditor_id;
            else:
                $auditor_qa_id = $request->auditor_qa_id;
            endif;
            $data = DB::select('call UpdateProject('.$request->hiddenId.',?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
            [
                $request->company_standard_id,
                $request->project_title,
                $request->company_id,
                $request->location_id,
                $request->assessor_id,
                $request->assessor_location_id,
                $request->auditor_id,
                $auditor_qa_id,
                $request->start_date,
                $request->end_date,
                $request->implement_start_date,
                $request->implement_end_date,
                $request->certificate_valid_from,
                $request->certificate_valid_to,
                $request->type,
                '1',
                $request->yesno_id,
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
        if(auth()->user()->usermanagement->role_id != 2 && auth()->user()->usermanagement->role_id != 3):
            if(Auth::user()->usermanagement->belong_to == 1):
                $projects['projects'] = DB::select('SELECT projects.*, companies.user_id AS com_id FROM `projects` LEFT JOIN companies ON companies.id = projects.auditee_id 
                WHERE projects.auditee_location_id = "'.auth()->user()->usermanagement->location_id.'"');
            endif;

            if(Auth::user()->usermanagement->belong_to == 2):
                $projects['projects'] = DB::select('SELECT projects.*, companies.user_id AS com_id FROM `projects` LEFT JOIN companies ON companies.id = projects.auditee_id LEFT JOIN user_management ON user_management.role_id = "'.auth()->user()->usermanagement->role_id.'" WHERE projects.auditor_qa_id = "'.auth()->user()->id.'" OR projects.auditor_id = "'.auth()->user()->id.'" ');
            endif;
        endif;
    
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
        $data = DB::select('SELECT user_management.user_id,user_management.name,user_management.role_id FROM `assessor` LEFT JOIN user_management ON user_management.added_by = assessor.user_id WHERE user_management.location_id = '.$auditor_id.'');
        // Assessor Lead 
        $output .= "<div class='col-lg-6 col-sm-6'><label for='auditor_id'>Select Assessor Lead</label><select class='form-control' name='auditor_id' id='auditor_id'>";
        $output .= "<option value=''>Select Assessor Lead</option>";
        foreach($data as $auditor_user):
            if(getRoleType($auditor_user->role_id) == 2):
                $output .= "<option value='".$auditor_user->user_id."'>".$auditor_user->name."</option>";
            endif;
        endforeach;    
        $output .= "</select></div>";
        // Assessor QA 
        $output .= "<div class='col-lg-6 col-sm-6'><label for='auditor_qa_id'>Select Assessor QA</label><span class='float-right mt-1'><input type='checkbox' name='same_qa' id='same_qa'> Same As Lead Assessor</span><select class='form-control' name='auditor_qa_id' id='auditor_qa_id'>";
        $output .= "<option value=''>Select Assessor QA</option>";
        foreach($data as $auditor_user):
            if(getRoleType($auditor_user->role_id) == 3):
                $output .= "<option value='".$auditor_user->user_id."'>".$auditor_user->name."</option>";
            endif;        
        endforeach;    
        $output .= "</select></div>";

        echo $output;
    }

    public function project_logs($id)
    {
        $project_logs['project_logs'] = DB::select('call GetProjectLogs('.Crypt::decrypt($id).')');
        return view('pages.project_logs',$project_logs);
    }

    public function project_planning($id)
    {
        $checkRecord = DB::table("project_planning")->where("project_id",Crypt::decrypt($id));
        // if($checkRecord->count() > 0):
        // else:
            $data['saved_templates'] = $checkRecord->get();
            $standard_id = get_project(Crypt::decrypt($id))->standard_id;
            $data['templates'] = DB::table("templates")->where('standard_id',$standard_id)->get();
        // endif;
        
        return view('pages.project_planning',$data);
    }

    public function save_planning(Request $request)
    {
        foreach($request->templates as $temp_name):
            $data = DB::table('project_planning')->insert(array('project_id' => Crypt::decrypt($request->projectId), 'template_name' => $temp_name,'added_by' => Auth::user()->id));
        endforeach;
        return response()->json($data);
    }

    public function add_project_planning_task(Request $request)
    {
        $request->validate([
    		'task_title'	=>	'required',
    		'start_date'	=>	'required',
    		'end_date'	    =>	'required',
    		'user_id'	    =>	'required',
    		'taskstatus_id'	=>	'required',
    		'department_id'	=>	'required',
    	]);
        
        
        if($request->hiddenId == ""):
            $data = DB::table('project_planning')->insert(
                array(
                    'project_id'            =>  Crypt::decrypt($request->projectId),
                    'department_id'         =>  $request->department_id,
                    'template_name'         =>  $request->task_title,
                    'start_date'            =>  $request->start_date,
                    'end_date'              =>  $request->end_date,
                    'responsible_user'      =>  $request->user_id,
                    'status'                =>  $request->taskstatus_id,
                    'added_by'              =>  Auth::user()->id
                )
            );
        else:
            $data = DB::table('project_planning')->where('id',$request->hiddenId)->update(
                array(
                    'project_id'            =>  Crypt::decrypt($request->projectId),
                    'department_id'         =>  $request->department_id,
                    'template_name'         =>  $request->task_title,
                    'start_date'            =>  $request->start_date,
                    'end_date'              =>  $request->end_date,
                    'responsible_user'      =>  $request->user_id,
                    'status'                =>  $request->taskstatus_id,
                    'added_by'              =>  Auth::user()->id
                )
            );
        endif;

        return response()->json($data);
    }

    public function getTaskdata($task_id)
    {
        $data = DB::table('project_planning')->where('id',$task_id)->get();
        // $data['depID'] = get_user($data[0]->responsible_user)->department_id;
        return $data;
    }

    public function task_delete(Request $request){
        try {
            $rec = DB::table("project_planning")->where("id",$request->id)->delete();
            $response = response()->json(['code'=>200, 'message'=>'Data Deleted successfully'], 200);
    	} catch(Exception $e) {
            $response = response()->json(['code'=>404, 'message'=>'Data Not Deleted'], 404);
        }

        return $response;
    }

    public function task_status_update(Request $request)
    {
        $request->validate([
    		'taskStatusUpdt'	=>	'required',
    	]);

        $data = DB::table('project_planning')->where('id',Crypt::decrypt($request->statusId))->update(
            array(
                'status' =>  $request->taskStatusUpdt,
            )
        );

        return response()->json($data);
    }

    public function project_report($id)
    {
        $project_report['getChart'] = false;
        $project_report['project_detail'] = DB::SELECT('call EditProject('.Crypt::decrypt($id).')');
        $project_report['project_evidence'] = DB::SELECT('SELECT evaluations_list.*,req_lists.req_no,req_lists.description as requirement FROM evaluations_list LEFT JOIN req_lists ON req_lists.id = evaluations_list.req_id WHERE evaluations_list.ass_id = "'.Crypt::decrypt($id).'" AND evaluations_list.elevel = 2 ');
        $project_report['pdfTemplate'] = "pages.reports.pci_dss_status_report_template";
        return view('pages.reports.project_report',$project_report);
        // $pdf = PDF::loadView('pages.reports.project_report',$project_report);
        // return $pdf->download('PCI DSS Status Report.pdf');
    }

    public function pciDSSReportPDF($id)
    {
        $project_report['getChart'] = true;
        $project_report['project_detail'] = DB::SELECT('call EditProject('.Crypt::decrypt($id).')');
        $project_report['project_evidence'] = DB::SELECT('SELECT evaluations_list.*,req_lists.req_no,req_lists.description as requirement FROM evaluations_list LEFT JOIN req_lists ON req_lists.id = evaluations_list.req_id WHERE evaluations_list.ass_id = "'.Crypt::decrypt($id).'"');
        $pdf = PDF::loadView('pages.reports.pci_dss_status_report_template',$project_report);
        $pdf->setPaper('a4', 'portrait');
        $pdf->set_option('defaultMediaType', 'all');
        $pdf->set_option('isFontSubsettingEnabled', true);
        $fileName = "PCI_DSS_Status_Report-".date("Y-m-d h:i:s");
        return $pdf->download($fileName.'.pdf');
        // return view('pages.reports.pci_dss_status_report_template',$project_report);
    }

    public function saveCapturedChart(Request $request)
    {
        $image = $request->image;
        $image = explode(";", $image)[1];
        $image = explode(",", $image)[1];
        $image = str_replace(" ", "+", $image);
        $image = base64_decode($image);
        file_put_contents("capturedChart.jpeg", $image);
    }

    public function get_users_by_depId($id)
    {
        $getUser = get_user(Auth::user()->id);
        $users = DB::table("user_management")->where("company_id",$getUser->company_id)->where("department_id",$id)->where("status","1")->get();
        $output = '';
		$output .= "<select class='form-control' name='user_id' id='user_id'>";
        if($users):
		$output .= "<option value=''>Select User</option>";	
			foreach ($users as $row) :	
				$output .= "<option value='".$row->user_id."'>".$row->name."</option>";
			endforeach;	
        else:
			$output .= "<option value='".Auth::user()->id."'>".Auth::user()->name."</option>";
        endif;
        $output .= "</select>";
		return $output;
    }

}
