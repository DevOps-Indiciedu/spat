<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Company;
use App\Models\ReqList;
class ReqListController extends Controller
{
    public function index()
    {
    	$getRows =DB::table('req_lists')->get()->toArray();
        //print_r($listall);
        //return view('pages.requirements_view',['category' => $listall]);
        return view('pages.requirements_view',compact('getRows'));
        
    }

   
}
