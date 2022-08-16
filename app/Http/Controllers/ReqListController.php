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
use Auth;
use Illuminate\Support\Facades\Crypt;

class ReqListController extends Controller
{
    public function index()
    {
    	$getRows =DB::table('req_lists')->where(array('id'=>1))->get()->toArray();
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
        return view('pages.select_req_list',compact('getRows'));   
    }

    public function selected_observation($id)
    {
        $data['getRows'] = DB::table('req_lists')->where(array('id'=>1))->get()->toArray();
        return view('pages.selected_observations',$data);   
    }

    public function action_tracker($id)
    {
        
        $data['action_tracker'] = DB::table('evaluations_list')->where(array('ass_id' => Crypt::decrypt($id)))->get()->toArray();
        return view('pages.action_tracker',$data);
        
    }
     public function view_selected_req_list($id)
    {
        $getRows = DB::table('evaluations_list')->where(array('ass_id' => Crypt::decrypt($id),'elevel' => 3))->get()->toArray();
        return view('pages.view_selected_requirements',compact('getRows'));
        
    }
    public function submit_req_register_list(Request $request)
    {
        DB::select("DELETE FROM evaluations_list WHERE el_id <> 0");
        $projectID = Crypt::decrypt($request->project_id);

            $request->validate(['level'  =>  'required']);

            $level=DB::table('req_lists')->where(array('id'=>1))->get()->toArray();
            foreach($level as $level1)
            {
                if(in_array($level1->id,$request->notlevel))
                {
                  $data = DB::insert('insert into evaluations_list (ass_id,req_id,elevel,description) values (?,?,?,?)',
                    [$projectID,$level1->id,1,"Not Applicable"]);

                }
                else
                {

                    $data = DB::insert('insert into evaluations_list (ass_id,req_id,elevel,description) values (?,?,?,?)',
                        [$projectID,$level1->id,1,""]);


                } 
                $levelm2=DB::table('req_lists')->where(array("parent_id"=>$level1->id))->get()->toArray();
                    foreach($levelm2 as $level2)
                    {
                        if(in_array($level2->id,$request->notlevel))
                        {
                        $data = DB::insert('insert into evaluations_list (ass_id,req_id,elevel,description) values (?,?,?,?)',[$projectID,$level2->id,2,"Not Applicable"]);

                    }
                    else
                    {

                        $data = DB::insert('insert into evaluations_list (ass_id,req_id,elevel,description) values (?,?,?,?)',[$projectID,$level2->id,2,""]);


                    }   
                    $levelm3=DB::table('req_lists')->where(array("parent_id"=>$level2->id))->get()->toArray();
                        foreach($levelm3 as $level3)
                        {
                        if(in_array($level3->id,$request->notlevel))
                        {
                            $data = DB::insert('insert into evaluations_list (ass_id,req_id,elevel,description) values (?,?,?,?)',
                                [$projectID,$level3->id,3,"Not Applicable"]);

                        }
                        else
                        {

                            $data = DB::insert('insert into evaluations_list (ass_id,req_id,elevel,description) values (?,?,?,?)',
                                [$projectID,$level3->id,3,""]);


                        }  
                    }
                
                }
    
            }

            return response()->json($data);
        
        // $data = array();

        // if(is_array($request->req_list))
        // {
        //     $getlevel3 = DB::table('req_lists')->where('id','<','80')->where('req_no','!=','guidence')->get()->toArray();
        //     foreach($getlevel3 as $list)
        //     {
        //         if(in_array($list->id,$request->req_list))
        //         {
        //             $data = DB::insert('insert into evaluations_list (ass_id,req_id,description) values (?,?,?)',
        //             [$projectID,$list->id,""]);
        //         }
        //         if(!empty($request->notreq_list)):
        //             if(in_array($list->id,$request->notreq_list))
        //             {
        //                 $data = DB::insert('insert into evaluations_list (ass_id,req_id,description) values (?,?,?)',
        //                 [$projectID,$list->id,"Not Applicable"]);
        //             }
        //         endif;
        //     }
        // }
        // return response()->json($data);
    }
    public function submit_requirement_result(Request $request)
    {
        // Auditor Submit Request 
        if(Auth::user()->usermanagement->role_id == 3):
            $request->validate([
                'hiddenId'      =>    'required',
                'priority' =>    'required',
            ]);

            $db_return = DB::table('evaluations_list')
            ->where('el_id', $request->hiddenId)
            ->limit(1) 
            ->update(array('description' => $request->description, 'action' => $request->action, 'severity' => $request->priority));
            if($db_return):
                echo json_encode(array('code'=>200));
            endif;
        endif;

        // Auditee Submit Request 
        if(Auth::user()->usermanagement->role_id == 2):    
            $request->validate([
                'attachment'    =>  'required',
                'hiddenId'      =>    'required'
            ]);
            
            $return_data="";
            $table_return_data="";
            $attachments = $request->file('attachment');

            if(is_array($attachments)):
                foreach($attachments as $file):
                    $name = time().rand(1,100).'.'.$file->extension();
                    $img = \Image::make($file);
                    $img->save(public_path(getCompanyFolderName().'/'.$name),50);
                 
                    $data = DB::table('observation_images')->insert([
                        'observation_id' => $request->hiddenId,
                        'imagelink'     => getCompanyFolderName().'/'.$name,
                        'added_by'      => Auth::user()->id,
                        'created_at'    => date('Y-m-d h:i:s'),
                    ]);

                    $last_id = DB::getPdo()->lastInsertId();

                    $explodeImgName = explode("/",$name);
                    $table_return_data.='<tr class="rowImage-'.$last_id.'">
                                            <td><a href="'.asset(MyApp::ASSET_IMG.$name).'">'.end($explodeImgName).'</a></td>
                                            <td>'.get_user(Auth::user()->id)->username.'</td>
                                            <td>'.date('Y-m-d h:i:s').'</td>
                                            <td><button class="btn upload delete_observation_image" data-id="'.$last_id.'"><i class="fa fa-trash"></i></button></td>
                                        </tr>';
                    $return_data.='  <div class="card-header d-flex justify-content-between">
                                        '.end($explodeImgName);
                    $class = '';
                    if(Auth::user()->usermanagement->role_id == 3):
                        $class = "approve_document";
                    endif;
                    $return_data.='<a href="#" data-evaluation-id="'.Crypt::encrypt($request->hiddenId) .'" data-id="'.Crypt::encrypt($last_id).'" class="btn btn-warning '.$class.'" style="padding:0px 5px 0px 5px;font-size:12px;">Pending</a>';
                    $return_data.='</div>
                                    <div class="card-body d-flex justify-content-between">
                                        <p class="card-text"><b>Uploaded By: </b> '.get_user(Auth::user()->id)->username.'  <span>'.date('Y-m-d h:i:s').'</span> </p>
                                        <div>
                                            <a href="'.asset('public/'.getCompanyFolderName().'/'.$name).'" download="" class="btn download"><i class="fa fa-download"></i></a>
                                        </div>
                                    </div>
                                  ';
                endforeach;
            endif;
            echo json_encode(array('data'=>$return_data,'table_data'=>$table_return_data));
        
        endif;

    }

    public function get_prev_uploaded_files(Request $request)
    {
        $table_return_data = '';
        $attachments = DB::table('observation_images')->where(array("observation_id"=>$request->id))->get();
        foreach($attachments as $image):
            $explodeImgName = explode("/",$image->imagelink);
            $table_return_data.='<tr class="rowImage-'.$image->obi_id.'">
                <td><a href="'.asset('public/'.$image->imagelink).'" target="_blank">'.end($explodeImgName).'</a></td>
                <td>'.get_user($image->added_by)->username.'</td>
                <td>'.$image->created_at.'</td>
                <td> <button class="btn upload delete_observation_image" data-id="'.$image->obi_id.'"><i class="fa fa-trash"></i></button></td>
            </tr>';
        endforeach;

        echo json_encode(array('table_data'=>$table_return_data));
    }

    public function delete_observation_image(Request $request)
    {
    	try {
            $rec = DB::table('observation_images')->where('obi_id', $request->id)->delete();
            $response = response()->json(['code'=>200, 'message'=>'File Deleted successfully'], 200);
    	} catch(Exception $e) {
            $response = response()->json(['code'=>404, 'message'=>'Data Not Deleted'], 404);
        }    
        return $response;
    }

    public function observation_action_edit($id)
    {
        $data = DB::table('evaluations_list')->where(array('el_id' => $id))->get()->toArray();
        return $data;
    }

    public function approve_document(Request $request)
    {
        $obsID = Crypt::decrypt($request->id);
        $evaluationID = Crypt::decrypt($request->evaluation_id);

        $reject = DB::table('observation_images')
            ->where('observation_id', $evaluationID)
            ->update(array('document_status' => 2));
    
        if($reject):
            $aproved = DB::table('observation_images')
            ->where('obi_id', $obsID)
            ->update(array('document_status' => 1));
            
            DB::table('evaluations_list')
            ->where('el_id', $evaluationID)
            ->update(array('status' => 1));

            $response = response()->json(['code'=>200, 'message'=>'successfully'], 200);
        else:
            $response = response()->json(['code'=>404, 'message'=>'Data Not Deleted'], 404);
        endif;
        return $response;
    }
   
}
