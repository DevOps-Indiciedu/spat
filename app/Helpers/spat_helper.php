<?php

    use Illuminate\Support\Facades\DB;

    function company_dropdown($select = 0)
    {
        $output = '';
		$output .= "<select class='form-control' name='company_id' id='company_id'>";
		$output .= "<option value=''>Select Company</option>";	
			$company = DB::table('companies')->get();	
			foreach ($company as $row) :
				$selected = '';
				if ($select == $row->id) :
					$selected = "selected";
				endif;	
				$output .= "<option value='".$row->id."' ".$selected.">".$row->company."</option>";
			endforeach;	

		$output .= "</select>";

		return $output;
    }

	function get_company($id = 0)
    {

		$company = DB::table('companies')->where('id', $id)->first();	
		return $company;
    }

	function location_dropdown($select = 0,$where = "")
    {
        $output = '';
		$output .= "<select class='form-control' name='location_id' id='location_id'>";
		$output .= "<option value=''>Select Location</option>";	
			if($where != ""):
				$company = DB::table('locations')->where($where)->get();	
			else:			
				$company = DB::table('locations')->get();	
			endif;
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
        $output = '';
		$output .= "<select class='form-control' name='department_id' id='department_id'>";
		$output .= "<option value=''>Select Department</option>";	
			if($where != ""):
				$company = DB::table('departments')->where($where)->get();	
			else:			
				$company = DB::table('departments')->get();	
			endif;
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
        $output = '';
		$output .= "<select class='form-control' name='role_id' id='role_id'>";
		$output .= "<option value=''>Select Role</option>";	
			if($where != ""):
				$company = DB::table('user_roles')->where($where)->get();	
			else:			
				$company = DB::table('user_roles')->get();	
			endif;
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
        $output = '';
		$output .= "<select class='form-control' name='designation_id' id='designation_id'>";
		$output .= "<option value=''>Select Designation</option>";	
			if($where != ""):
				$company = DB::table('designations')->where($where)->get();	
			else:			
				$company = DB::table('designations')->get();	
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
				if ($select == $i) :
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
        $output = '';
		$output .= "<select class='form-control' name='user_id' id='user_id'>";
		$output .= "<option value=''>Select User</option>";	
			if($where != ""):
				$user = DB::table('users')
                    ->join('user_management', 'user_management.user_id', '=', 'users.id')
                    ->select('users.name','users.id')
                    ->where('user_management.status', '1')
                    ->where($where)
                    ->get();
			else:			
				$user = DB::table('users')
                    ->join('user_management', 'user_management.user_id', '=', 'users.id')
                    ->select('users.name','users.id')
                    ->where('user_management.status', '1')
                    ->get();
			endif;
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
	}

	
?>