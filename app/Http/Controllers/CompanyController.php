<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index()
    {
    	$company['company'] = DB::select('call GetAllCompanies()');
        return view('pages.company',$company);
    }

    public function insertOrupdate(Request $request)
    {
    	$request->validate([
    		'company'	=>	'required',
    	]);

    	$data = Company::updateOrCreate(
            [
                'id'	=>	$request->hiddenId,
            ],
            [
        		'company'	=>	$request->company,
    	    ]
        );

    	return response()->json($data);
    }

    public function destroy(Request $request)
    {
    	$rec = Company::find($request->id)->delete();
        if($rec):
            $response = response()->json(['code'=>200, 'message'=>'Data Deleted successfully'], 200);
        endif;    
        return $response;
    }

    public function edit($company_id)
    {
        $data = Company::findOrFail($company_id);
        return response()->json($data);
    }
}
