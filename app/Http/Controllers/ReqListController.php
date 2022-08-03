<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Company;
use App\Models\ReqList;
use Image;
use MyApp;
class ReqListController extends Controller
{
    public function index()
    {
    	$getRows =DB::table('req_lists')->where(array('id'=>1))->get()->toArray();
        //print_r($listall);
        //return view('pages.requirements_view',['category' => $listall]);
        return view('pages.requirements_view',compact('getRows'));
        
    }
    public function standards()
    {
        $data['standards'] =DB::table('company_standards')->get();
        return view('pages.standards',$data);
    }
     public function select_req_list()
    {
        $getRows =DB::table('req_lists')->where(array('id'=>1))->get()->toArray();
        //print_r($listall);
        //return view('pages.requirements_view',['category' => $listall]);
        return view('pages.select_req_list',compact('getRows'));
        
    }
     public function view_selected_req_list()
    {
        $getRows =DB::table('evaluations_list')->where(array('ass_id'=>1))->get()->toArray();
        //print_r($listall);
        //return view('pages.requirements_view',['category' => $listall]);
        return view('pages.view_selected_requirements',compact('getRows'));
        
    }
    public function submit_req_register_list(Request $request)
    {
        $request->validate([
            'req_list'    =>  'required',
            
        ]);

        if(is_array($request->req_list))
        {
            foreach($request->req_list as $list)
            {
                 $data = DB::insert('insert into evaluations_list (ass_id,req_id,description) values (?,?,?)',
                [
                    1,
                    $list,
                    ""
                  
                ]);
            }
        }


       

        return response()->json($data);
    }
    public function submit_requirement_result(Request $request)
    {
        $request->validate([
            'description'    =>  'required',
            'hiddenId'      =>    'required'
        ]);

       $db_return= DB::table('evaluations_list')
        ->where('el_id', $request->hiddenId)  // find your user by their email
        ->limit(1)  // optional - to ensure only one record is updated.
        ->update(array('description' => $request->description));

        if($db_return)
        {
            $return_data="";
            $attachments=$request->file('attachment');
            if(is_array($attachments)):
                foreach($attachments as $file):
                    $name = time().rand(1,100).'.'.$file->extension();
                    $img = \Image::make($file);
                    $img->save(public_path('observation_images/'.$name),50);
                 
                    $data = DB::insert('insert into observation_images (observation_id,imagelink) values (?,?)',
                    [
                        $request->hiddenId,
                        $name
                      
                    ]);
                    $return_data.='<a href="'.asset(MyApp::ASSET_IMG.$name).'">'.$name."</a><br>";
                endforeach;
            endif;
            $return_data.="<br>".$request->description;
            echo json_encode(array('data'=>$return_data));
        }    
        else
        {
            echo json_encode(array('data'=>"Data not submitted try again"));;
        }
        

    }
   
}
