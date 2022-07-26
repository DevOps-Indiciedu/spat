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

        if($request->hiddenId == ""):
            $data = DB::select('call InsertCompany(?, ?, ?)',
            [
                $request->company,
                date('Y-m-d H:i:s'),
                date('Y-m-d H:i:s'),
            ]);
        else: 
            // $data = DB::select('call UpdateCompany(?, ?, ?)',
            // [
            //     $request->company,
            //     date('Y-m-d H:i:s'),
            //     date('Y-m-d H:i:s'),
            // ]);
            $data = Company::updateOrCreate(
                [
                    'id'	=>	$request->hiddenId,
                ],
                [
                    'company'	=>	$request->company,
                ]
            );
        endif;    

    	return response()->json($data);
    }

    public function destroy(Request $request)
    {
        try {
            $rec = DB::select('call DeleteCompany('.$request->id.')');
            $response = response()->json(['code'=>200, 'message'=>'Data Deleted successfully'], 200);
    	} catch(Exception $e) {
            $response = response()->json(['code'=>404, 'message'=>'Data Not Deleted'], 404);
        }
            // $rec = Company::find($request->id)->delete();
        // if($rec):
        // endif;    
        return $response;
    }

    public function edit($company_id)
    {
        $data = Company::findOrFail($company_id);
        return response()->json($data);
    }
}
