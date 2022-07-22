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

	function DMY($date)
	{
		return date("d-m-Y",strtotime($date));
	}
?>