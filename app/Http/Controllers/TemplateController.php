<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Template;
use Auth;
use Illuminate\Support\Facades\Crypt;

class TemplateController extends Controller
{
    public function template($id)
    {   
        $data['template'] = DB::table('templates')->where("standard_id",Crypt::decrypt($id))->get();
    	return view('pages.template',$data);
    }

    public function insertOrupdate(Request $request)
    {
        if($request->hiddenId == ""):
            $data = new Template;
            $data->standard_id = Crypt::decrypt($request->standardID);
            $data->template_name = $request->templatename;
            $data->added_by = Auth::user()->id;
            $data->save();
        else:
            $data = Template::findOrFail($request->hiddenId)->update([
	    		'template_name'	=>	$request->templatename,
	    	]);
        endif;

        return response()->json($data);
    }

    public function destroy(Request $request){
        try {
            $rec = DB::table("templates")->where("id",$request->id)->delete();
            $response = response()->json(['code'=>200, 'message'=>'Data Deleted successfully'], 200);
    	} catch(Exception $e) {
            $response = response()->json(['code'=>404, 'message'=>'Data Not Deleted'], 404);
        }

        return $response;
    }

    public function edit($id){
        $data = DB::table('templates')->where('id',$id)->get();
        return $data;
    }
}
