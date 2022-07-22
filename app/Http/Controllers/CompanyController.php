<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
    	$company['company'] = Company::all();
        return view('pages.company',['category' => $company]);
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
    	$rec = Company::find($request->id);
		$rec->delete();
        return redirect()->route('category')->with('success','Category deleted successfully');
    }

    public function edit($company_id)
    {
        $data = Company::findOrFail($company_id);
        return response()->json($data);
    }
}
