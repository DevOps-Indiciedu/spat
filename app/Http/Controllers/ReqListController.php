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
        DB::select("DELETE FROM evaluations_list WHERE el_id <> 0");

        $request->validate([
            'req_list'    =>  'required',
            
        ]);

        if(is_array($request->req_list) && is_array($request->notreq_list))
        {
            $getlevel3=DB::table('req_lists')->where('id','<','80')->where('req_no','!=','guidence')->get()->toArray();
           
            foreach($getlevel3 as $list)
            {
                if(in_array($list->id,$request->req_list))
                {
                     $data = DB::insert('insert into evaluations_list (ass_id,req_id,description) values (?,?,?)',
                    [1,$list->id,""]);
                }
                else if(in_array($list->id,$request->notreq_list))
                {
               
                     $data = DB::insert('insert into evaluations_list (ass_id,req_id,description) values (?,?,?)',
                    [1,$list->id,"Not Applicable"]);
                

                }

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
            $table_return_data="";
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
                    $table_return_data.='<tr>
                                               <td><a href="'.asset(MyApp::ASSET_IMG.$name).'">'.$name.'</a></td>
                                               <td>Name</td>
                                               <td>'.date('d-m-Y H:i a').'</td>
                                               <td> <button class="btn upload"><i class="fa fa-cog"></i></button></td>
                                           </tr>';
                    $return_data.='  <div class="card-header d-flex justify-content-between">
                                        '.$name.'
                                    <a href="#" class="btn btn-success" style="padding:0px 5px 0px 5px;">Approved</a>
                                    </div>
                                    <div class="card-body d-flex justify-content-between">
                                            <p class="card-text"><b>Uploaded By: </b> Name  <span>'.date('d-m-Y').'</span>  <span>'.date('H:i a').'</span></p>
                                            <div>
                                             <button class="btn upload"><i class="fa fa-upload"></i></button>
                                             <button class="btn download"><i class="fa fa-download"></i></button>
                                            </div>
                                          </div>
                                  ';
                endforeach;
            endif;
            
            echo json_encode(array('data'=>$return_data,'table_data'=>$table_return_data));
        }    
        else
        {
            echo json_encode(array('data'=>"Data not submitted try again"));;
        }
        

    }
   
}
