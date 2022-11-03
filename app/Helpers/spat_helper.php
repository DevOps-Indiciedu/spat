<?php

    use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\File;
	use Illuminate\Support\Facades\Crypt;

	function company_standards($select = 0)
    {
        $output = '';
		$output .= "<select class='form-control' name='company_standard_id' id='company_standard_id'>";
		$output .= "<option value=''>Select Standrad</option>";	
			$company = DB::table('company_standards')->get();
			foreach ($company as $row) :
				$selected = '';
				if ($select == $row->id) :
					$selected = "selected";
				endif;	
				$output .= "<option value='".$row->id."' ".$selected.">".$row->standard_name."</option>";
			endforeach;	

		$output .= "</select>";

		return $output;
    }

	function get_company_standards($id = 0)
    {
		$company_standards = DB::table('company_standards')->where('id', $id)->first();	
		return $company_standards;
    }

	function company_dropdown($select = 0)
    {
		if(Auth::user()->system_admin == 1 || auth()->user()->usermanagement->role_id == 1):
			$company = DB::table('companies')->get();	
		else:
			if(auth()->user()->usermanagement->role_id == 3):
				$company = DB::table('assessor')->where('id',auth()->user()->usermanagement->company_id)->get();
			else:	
				$company = DB::table('companies')->where('id',auth()->user()->usermanagement->company_id)->get();	
			endif;
		endif;
        $output = '';
		$output .= "<select class='form-control' name='company_id' id='company_id'>";
		// $output .= "<option value=''>Select Company</option>";	
			foreach ($company as $row) :
				$selected = '';
				if ($select == $row->id) :
					$selected = "selected";
				endif;	
				$output .= "<option value='".$row->id."' data-u-id='".Crypt::encrypt($row->user_id)."' ".$selected.">".$row->company_name."</option>";
			endforeach;	

		$output .= "</select>";

		return $output;
    }

	function get_company($id = 0)
    {
		if(auth()->user()->usermanagement->role_id == 3):
			$company = DB::table('assessor')->where('id', $id)->first();	
		else:
			$company = DB::table('companies')->where('id', $id)->first();	
		endif;
		return $company;
    }

	function company_types($select = 0)
    {
        $output = '';
		$output .= "<select class='form-control' name='company_type' id='company_type'>";
		$output .= "<option value=''>Select Type</option>";	
		        $spselected = "";
		        $mrselected = "";
				if ($select == 'Service Provider') :
					$spselected = "selected";
				endif;
				if ($select == 'Merchant') :
					$mrselected = "selected";
				endif;
				$output .= "<option value='1' ".$spselected.">Service Provider</option>";
		        $output .= "<option value='2' ".$mrselected.">Merchant</option>";

		$output .= "</select>";

		return $output;
    }

	function assessors($select = 0)
    {
		if(Auth::user()->system_admin == 1 || auth()->user()->usermanagement->role_id == 1):
			$company = DB::table('assessor')->get();	
		else:
			$company = DB::table('assessor')->where('id',auth()->user()->usermanagement->company_id)->get();	
		endif;
        $output = '';
		$output .= "<select class='form-control' name='assessor_id' id='assessor_id'>";
		$output .= "<option value=''>Select Audit Organisation</option>";	
			foreach ($company as $row) :
				$selected = '';
				if ($select == $row->id) :
					$selected = "selected";
				endif;	
				$output .= "<option value='".$row->id."' data-u-id='".Crypt::encrypt($row->user_id)."' ".$selected.">".$row->company_name."</option>";
			endforeach;	

		$output .= "</select>";

		return $output;
    }

	function get_assessor($id = 0)
    {
		$assessor = DB::table('assessor')->where('id', $id)->first();	
		return $assessor;
    }

	

	function location_dropdown($select = 0,$where = "")
    {
		if(Auth::user()->system_admin == 1 || auth()->user()->usermanagement->role_id == 1):
			$company = DB::table('locations')->get();
		else:
			if($where != ""):
				$company = DB::table('locations')->where($where)->where("added_by",auth()->user()->id)->get();	
			else:			
				$company = DB::table('locations')->where("added_by",auth()->user()->id)->get();	
			endif;
		endif;	

        $output = '';
		$output .= "<select class='form-control' name='location_id' id='location_id'>";
		$output .= "<option value=''>Select Location</option>";	
			
				foreach ($company as $row) :
				$selected = '';
				if ($select == $row->id) :
					$selected = "selected";
				endif;	
				$output .= "<option value='".$row->id."' ".$selected.">".$row->name."</option>";
			endforeach;	

		$output .= "</select>";

		return $output;
    }

	function get_location($id = 0)
    {

		$location = DB::table('locations')->where('id', $id)->first();	
		return $location;		
    }

	function department_dropdown($select = 0,$where = "")
    {
		if(Auth::user()->system_admin == 1 || auth()->user()->usermanagement->role_id == 1):
			$company = DB::table('departments')->get();
		else:
			if($where != ""):
				$company = DB::table('departments')->where($where)->where("added_by",auth()->user()->id)->get();	
			else:			
				$company = DB::table('departments')->where("added_by",auth()->user()->id)->get();	
			endif;
		endif;	

        $output = '';
		$output .= "<select class='form-control' name='department_id' id='department_id'>";
		$output .= "<option value=''>Select Department</option>";	
			foreach ($company as $row) :
				$selected = '';
				if ($select == $row->id) :
					$selected = "selected";
				endif;	
				$output .= "<option value='".$row->id."' ".$selected.">".$row->department."</option>";
			endforeach;	

		$output .= "</select>";

		return $output;
    }

	function get_department($id = 0)
    {

		$department = DB::table('departments')->where('id', $id)->first();	
		return $department;
    }

	function user_role_dropdown($select = 0,$where = "")
    {
		if(Auth::user()->system_admin == 1):
			$company = DB::table('user_roles')->get();
		else:
			if($where != ""):
				$company = DB::table('user_roles')->where($where)->where("added_by",auth()->user()->id)->get();	
			else:			
				$company = DB::table('user_roles')->where("added_by",auth()->user()->id)->get();	
			endif;
		endif;	

        $output = '';
		$output .= "<select class='form-control' name='role_id' id='role_id'>";
		$output .= "<option value=''>Select Role</option>";	
			foreach ($company as $row) :
				$selected = '';
				if ($select == $row->id) :
					$selected = "selected";
				endif;	
				$output .= "<option value='".$row->id."' ".$selected.">".$row->role."</option>";
			endforeach;	
		$output .= "</select>";
		return $output;
    }

	function get_role($id = 0)
    {

		$role = DB::table('user_roles')->where('id', $id)->first();	
		return $role;
    }

	function designation_dropdown($select = 0,$where = "")
    {
		if(Auth::user()->system_admin == 1):
			$company = DB::table('designations')->get();
		else:
			if($where != ""):
				$company = DB::table('designations')->where($where)->where("added_by",auth()->user()->id)->get();	
			else:			
				$company = DB::table('designations')->where("added_by",auth()->user()->id)->get();	
			endif;
		endif;

        $output = '';
		$output .= "<select class='form-control' name='designation_id' id='designation_id'>";
		$output .= "<option value=''>Select Designation</option>";	
			foreach ($company as $row) :
				$selected = '';
				if ($select == $row->id) :
					$selected = "selected";
				endif;	
				$output .= "<option value='".$row->id."' ".$selected.">".$row->title."</option>";
			endforeach;	

		$output .= "</select>";
		return $output;
    }

	function get_designation($id = 0)
    {

		$designation = DB::table('designations')->where('id', $id)->first();	
		return $designation;
    }

	function status_dropdown($select = 1)
    {
		$status = array(
			'1'	=>	'Active',
			'0'	=>	'Inactive',
		);
        $output = '';
		$output .= "<select class='form-control' name='status' id='status'>";
		// $output .= "<option value=''>Select Status</option>";	
			for($i = 0; $i < count($status); $i++) :
				$selected = '';
				if($select == $i) :
					$selected = "selected";
				endif;	
				$output .= "<option value='".$i."' ".$selected.">".$status[$i]."</option>";
			endfor;	

		$output .= "</select>";

		return $output;
    }

	function status($id = 0)
	{
		$status = array(
			'1'	=>	'Active',
			'0'	=>	'Inactive',
		);

		return $status[$id];
	}

	function DMY($date)
	{
		return date("d-m-Y",strtotime($date));
	}

	function taskStatus_dropdown($select = 0,$where = "")
    {
        $output = '';
		$output .= "<select class='form-control' name='taskstatus_id' id='taskstatus_id'>";
		$output .= "<option value=''>Select Status</option>";	
			if($where != ""):
				$company = DB::table('task_statuses')->where($where)->get();	
			else:			
				$company = DB::table('task_statuses')->get();	
			endif;
				foreach ($company as $row) :
				$selected = '';
				if ($select == $row->id) :
					$selected = "selected";
				endif;	
				$output .= "<option value='".$row->id."' ".$selected.">".$row->title."</option>";
			endforeach;	

		$output .= "</select>";

		return $output;
    }

	function get_taskStatus($id = 0)
    {

		$designation = DB::table('task_statuses')->where('id', $id)->first();	
		return $designation;
    }

	function users_dropdown($select = 0,$where = "")
    {
		if(Auth::user()->system_admin == 1):
			$user = DB::table('users')
                    ->join('user_management', 'user_management.user_id', '=', 'users.id')
                    ->select('users.name','users.id')
                    ->where('user_management.status', '1')
                    ->where($where)
                    ->get();
		else:
			// $company = DB::table('designations')->where('added_by',auth()->user()->id)->get();	
			$user = DB::table('users')
                    ->join('user_management', 'user_management.user_id', '=', 'users.id')
                    ->select('users.name','users.id')
                    ->where('user_management.status', '1')
                    ->where('users.id','<>',Auth::user()->id)
                    ->where('user_management.company_id',auth()->user()->usermanagement->company_id)
                    ->get();
		endif;
        $output = '';
		$output .= "<select class='form-control' name='user_id' id='user_id'>";
		$output .= "<option value=''>Select User</option>";	
			// if($where != ""):
			// 	$user = DB::table('users')
            //         ->join('user_management', 'user_management.user_id', '=', 'users.id')
            //         ->select('users.name','users.id')
            //         ->where('user_management.status', '1')
            //         ->where($where)
            //         ->get();
			// else:			
			// 	$user = DB::table('users')
            //         ->join('user_management', 'user_management.user_id', '=', 'users.id')
            //         ->select('users.name','users.id')
            //         ->where('user_management.status', '1')
            //         ->get();
			// endif;
				foreach ($user as $row) :
				$selected = '';
				if ($select == $row->id) :
					$selected = "selected";
				endif;	
				$output .= "<option value='".$row->id."' ".$selected.">".$row->name."</option>";
			endforeach;	

		$output .= "</select>";

		return $output;
    }

	function get_user($id = 0)
    {

		$user = DB::table('users')
                    ->join('user_management', 'user_management.user_id', '=', 'users.id')
                    ->select('users.*','user_management.*','user_management.name as username')
					->where('user_management.status', '1')
					->where('users.id', $id)
                    ->first();
		return $user;
    }

	function priority_dropdown($select = 0)
    {
		$priority = array(
			'1'	=>	'High',
			'2'	=>	'Medium',
			'3'	=>	'Low',
		);
        $output = '';
		$output .= "<select class='form-control' name='priority' id='priority'>";
		$output .= "<option value=''>Select Priority</option>";	
			for($i = 1; $i <= count($priority); $i++) :
				$selected = '';
				if ($select == $i) :
					$selected = "selected";
				endif;	
				$output .= "<option value='".$i."' ".$selected.">".$priority[$i]."</option>";
			endfor;	

		$output .= "</select>";

		return $output;
    }

	function priority($id = 0)
	{
		$status = array(
			'1'	=>	'High',
			'2'	=>	'Medium',
			'3'	=>	'Low',
		);

		return $status[$id];
	}

	function deleteFile($folder = "",$image = "")
	{
		if ($image != "" && $folder != ""):
			$destination = 'public/'.$folder.'/'.$image;
			if (File::exists($destination)) :
				File::delete($destination);
			endif;
		endif;
	}

	function userRighs()
	{
		$rightsArrPush = array();
		$admin = Auth::user()->system_admin;
		if($admin == '0'):
			$role_id = Auth::user()->usermanagement->role_id;
			$query_result = DB::table('user_role_rights')
						->join('action', 'action.id', '=', 'user_role_rights.action_id')
						->select('action.code')
						// ->select('action.title','action.code','action.id AS action_id','user_role_rights.id','user_role_rights.role_id')
						->where('action.status', '1')
						->where('user_role_rights.role_id',$role_id)
						// ->value('code');
						->get();
			if(sizeof($query_result) > 0):
				foreach($query_result as $row):
					$rightsArrPush[] = $row->code;
				endforeach;
			endif;
			return $rightsArrPush;
		else:
			return 'sys-adimin';
		endif;		
	}

	function userRightGranted($actionCode = array())
	{
		$rightsArr = userRighs();
		$proceed = "";
		if($rightsArr == "sys-adimin"):
			$proceed = true;
		else:	
			if (gettype($actionCode) == 'array'):
				foreach ($actionCode as $key => $value):
					if (in_array($value,$rightsArr)):
						$proceed = true;
					endif;
				endforeach;
			else:
				if (in_array($actionCode,$rightsArr)):
					$proceed = true;
				endif;
			endif;
		endif;

		return $proceed;
	}

	function getFolderName($company_id = 0)
    {
		$companyFolder = DB::table('companies')->where('id', $company_id)->value('company_folder_name');	
		return $companyFolder;
    }

	function userStatus($user_id = 0)
    {
		$status = DB::table('user_management')->where('user_id', $user_id)->value('status');	
		return $status;
    }

	function auditeeType_dropdown($select = 0)
    {
		$type = array(
			'1'	=>	'External',
			'2'	=>	'Internal',
		);
        $output = '';
		$output .= "<select class='form-control' name='type' id='type'>";
		$output .= "<option value=''>Select Type</option>";	
			for($i = 1; $i <= count($type); $i++) :
				$selected = '';
				if ($select == $i) :
					$selected = "selected";
				endif;	
				$output .= "<option value='".$i."' ".$selected.">".$type[$i]."</option>";
			endfor;	

		$output .= "</select>";

		return $output;
    }

	function auditeeType($id = 0)
	{
		$type = array(
			'1'	=>	'External',
			'2'	=>	'Internal',
		);

		return $type[$id];
	}

	function projects_dropdown($select = 0,$where = "")
    {
		if(Auth::user()->system_admin == 1):
			$projects = DB::table('projects')->where('status','1')->get();
		else:
			$projects = DB::table('projects')->where('status','1')->where('auditee_id',auth()->user()->usermanagement->company_id)->get();
		endif;
        $output = '';
		$output .= "<select class='form-control' name='project_id' id='project_id'>";
		$output .= "<option value=''>Select Project</option>";	
			// if($where != ""):
			// 	$company = DB::table('projects')->where($where)->get();	
			// else:			
			// 	$company = DB::table('projects')->where('status','1')->get();	
			// endif;
				foreach ($projects as $row) :
				$selected = '';
				if ($select == $row->id) :
					$selected = "selected";
				endif;	
				$output .= "<option value='".$row->id."' ".$selected.">".$row->project_title."</option>";
			endforeach;	

		$output .= "</select>";

		return $output;
    }

	function get_project($id = 0)
    {
		$projects = DB::table('projects')->where('id', $id)->first();	
		return $projects;
    }

	function getCompanyFolderName()
	{
		$userID = $userID = Auth::user()->id;;
		if($userID):
			$locID = get_user($userID)->location_id;
			$companyID = get_user($userID)->company_id;
			if($locID == 0):
				// Company Admin
				$FolderName = getFolderName($companyID);
			else:
				// Location Admin 	
				$CompanyFolderName = getFolderName($companyID);
				$getLocation = get_location($locID);
				$location_name =  str_replace(' ', '_', $getLocation->name);
            	$location_folder_name =  strtolower($location_name);
				$FolderName = $CompanyFolderName.'/'.$location_folder_name;
			endif;

			return 'companies/'.$FolderName;
		endif;	
	}

	function get_reqNo($id = 0)
    {
		$req = DB::table('req_lists')->where('id', $id)->value('req_no');	
		return $req;
    }

	function EmailExpireTime()
	{
		return date('Y-m-d H:i:s',strtotime('+60 minutes',strtotime(date('Y-m-d H:i:s'))));
	}

	function checkLinkExpire($userID)
	{
		$user = DB::table('users')->where("id",$userID)->value('reset_link_expire');
		return $user;
	}

	function getRoleType($roleID)
	{
		$type = DB::table('user_roles')->where("id",$roleID)->value('type');
		return $type;
	}

	function yesno_dropdown($select = "")
    {
		$type = array(
			'0'	=>	'No',
			'1'	=>	'Yes',
		);
        $output = '';
		$output .= "<select class='form-control' name='yesno_id' id='yesno_id'>";
		$output .= "<option value=''>Select Project Plan Template</option>";	
			for($i = 0; $i < count($type); $i++) :
				$selected = '';
				if ($select == $i) :
					$selected = "selected";
				endif;	
				$output .= "<option value='".$i."' ".$selected.">".$type[$i]."</option>";
			endfor;	

		$output .= "</select>";

		return $output;
    }

	function yesno($id = 0)
	{
		$type = array(
			'1'	=>	'Yes',
			'0'	=>	'No',
		);

		return $type[$id];
	}

	function packages_dropdown($select = 0)
    {
		$company = DB::table('packages')->get();	
	
        $output = '';
		$output .= "<select class='form-control' name='package_id' id='package_id'>";
	 	$output .= "<option value=''>Select Package</option>";	
			foreach ($company as $row) :
				$selected = '';
				if ($select == $row->package_id) :
					$selected = "selected";
				endif;	
				$output .= "<option value='".$row->package_id."' ".$selected.">".$row->title."</option>";
			endforeach;	

		$output .= "</select>";

		return $output;
    }

	function get_package($id = 0)
    {
		$package = DB::table('packages')->where('package_id', $id)->first();	
		return $package;
    }

	function package_types_dropdown($select = 0)
    {
        $output = '';
		$output .= "<select class='form-control' name='package_type' id='package_type'>";
		$output .= "<option value=''>Select Type</option>";	
		        $monthly = "";
		        $quaterly = "";
		        $yearly =   "";
				if ($select == 'Monthly') :
					$monthly = "selected";
				endif;
				if ($select == 'Quaterly') :
					$quaterly = "selected";
				endif;
				if ($select == 'Yearly') :
					$yearly = "selected";
				endif;
				$output .= "<option value='Monthly' ".$monthly.">Monthly</option>";
		        $output .= "<option value='Quaterly' ".$quaterly.">Quaterly</option>";
		        $output .= "<option value='Yearly' ".$yearly.">Yearly</option>";

		$output .= "</select>";

		return $output;
    }

	function detectFileExtension($filename)
	{
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		switch ($ext) {
				case "jpg":
					$extOutput = "Image";
				break;
				case "png":
					$extOutput = "Image";
				break;
				case "jpeg":
					$extOutput = "Image";
				break;
				case "docx":
					$extOutput = "Word File";
				break;
				case "pdf":
					$extOutput = "PDF File";
				break;
				case "xlsx":
					$extOutput = "Excel File";
				break;
				case "txt":
					$extOutput = "Text File";
				break;
			default:
			$extOutput = $ext;
		}
		return $extOutput;
	}

	function checkTaskExistToTeq($projectID,$reqID,$type)
	{
		$task = DB::table("tasks")->where('project_id',$projectID)->where('req_id',$reqID);
		if($type == 1):
			if($task->count()>0):
				return true;
			else:
				return false;	
			endif;
		elseif($type == 2):
			return $task->first();
		endif;
	}

	function getAdminInfo($userID,$type)
	{
		$companyID = get_user($userID)->company_id;
		$admin = DB::table("user_management")->where('company_id',$companyID)->where('role_id',$type)->first();
		return $admin;
	}

	function getAccountType($type)
	{
		switch ($type) {
			case "1":
				$extOutput = "Super Admin";
			break;
			case "2":
				$extOutput = "Auditee";
			break;
			case "3":
				$extOutput = "Auditor";
			break;
			case "4":
				$extOutput = "Location Admin";
			break;
			case "5":
				$extOutput = "Lead Assessor";
			break;
			case "6":
				$extOutput = "QA Assessor";
			break;
			case "7":
				$extOutput = "Employee";
			break;
		default:
		$extOutput = $ext;
	}
	return $extOutput;

	}

	function get_Doc_type_Options($select = 0)
    {	
		$company = DB::table('doc_types')->get();	
        $output = '';
		$output .= "<select class='form-control select2' name='doc_type' id='doc_type'>";
		$output .= "<option value=''>Select Document Type</option>";	
			foreach ($company as $row) :
				$selected = '';
				if ($select == $row->dt_title) :
					$selected = "selected";
				endif;	
				$output .= "<option value='".$row->dt_title."'  ".$selected.">".$row->dt_title."</option>";
			endforeach;	

		$output .= "</select>";

		return $output;
    }

	function getAuditObservationStatus($evaluationID)
	{
		$data = DB::table("audit_observations")->where('evaluation_id',$evaluationID)->first();
		return $data;
	}

	function auditObservationStatus($id)
	{
		$status = array(
			'1'	=>	"In Place",
			'2'	=>	"In Place w/ CCW",
			'3'	=>	"Not Applicable",
			'4'	=>	"Not Tested",
			'5'	=>	"Not in Place",
		);

		return $status[$id];
	}

	
?>