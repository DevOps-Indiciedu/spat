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

    
    public function view_selected_req_list($id)
    {
        if(Auth::user()->usermanagement->belong_to == 1 && Auth::user()->usermanagement->account_type == 7):
            // $getRows = DB::query("SELECT evaluations_list.* FROM `evaluations_list` LEFT JOIN tasks ON tasks.req_id = evaluations_list.el_id WHERE evaluations_list.ass_id = '".Crypt::decrypt($id)."' AND tasks.assign_to = '".Auth::user()->id."'");
            // dd($getRows);
            $getRows = DB::table('evaluations_list')
                    ->join('tasks', 'tasks.req_id', '=', 'evaluations_list.req_id')
                    ->select('evaluations_list.*')
                    ->where("evaluations_list.ass_id",Crypt::decrypt($id))
                    ->where("tasks.assign_to",Auth::user()->id)
                    ->get();
        else:
            $getRows = DB::table('evaluations_list')->where(array('ass_id' => Crypt::decrypt($id),'elevel' => 2))->get()->toArray();
        endif;
        return view('pages.view_selected_requirements',compact('getRows'));
    }

    public function audit_observation($id)
    {
        $getRows = DB::table('evaluations_list')->where(array('ass_id' => Crypt::decrypt($id),'elevel' => 2))->get()->toArray();
        return view('pages.audit_observation',compact('getRows'));
    }

    public function submit_req_register_list(Request $request)
    {
        
        $projectID = Crypt::decrypt($request->project_id);
        DB::select("DELETE FROM evaluations_list WHERE ass_id=".$projectID);
            $request->validate(['level'  =>  'required']);

            $level=DB::table('req_lists')->where(array('id'=>1))->get()->toArray();
            foreach($level as $level1)
            {
                if(is_array($request->notlevel) && in_array($level1->id,$request->notlevel))
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
                        if(empty($level2->req_no[4]) || !is_numeric($level2->req_no[4]))
                        {
                            
                            if(is_array($request->notlevel) && in_array($level2->id,$request->notlevel))
                            {
                            $data = DB::insert('insert into evaluations_list (ass_id,req_id,elevel,description) values (?,?,?,?)',[$projectID,$level2->id,2,"Not Applicable"]);

                            }
                            else
                            {
        
                                $data = DB::insert('insert into evaluations_list (ass_id,req_id,elevel,description) values (?,?,?,?)',[$projectID,$level2->id,2,""]);
        
        
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
        if(Auth::user()->usermanagement->belong_to == 2):
            $request->validate([
                'hiddenId'      =>    'required',
            ]);

            $db_return = DB::table('evaluations_list')
            ->where('el_id', $request->hiddenId)
            ->limit(1) 
            ->update(array('description' => $request->description, 'action' => $request->action, 'severity' => 1));
            if($db_return):
                DB::table('evaluations_list')->where('el_id',$request->hiddenId)->update(array('status' => 3 ));
                echo json_encode(array('code'=>200));
            endif;
        endif;

        // Auditee Submit Request 
        if(Auth::user()->usermanagement->belong_to == 1):    
            $request->validate([
                'attachment'    =>  'required',
                'hiddenId'      =>    'required'
            ]);
            
            $return_data="";
            $table_return_data="";
            $attachments = $request->file('attachment');

            if(is_array($attachments)):
                // if($request->type == "reUpload"):
                    // Update Previous Attachments Status 
                // endif;
                // DB::table('observation_images')->where('observation_id',$request->hiddenId)->where('document_status',0)->update(array('document_status' => 2));
                foreach($attachments as $file):
                    $name = time().rand(1,100).'.'.$file->extension();
                    // $img = \Image::make($file);
                    // $img->save(public_path(getCompanyFolderName().'/'.$name),50);

                    $file->getClientOriginalExtension();
                    $file->move(public_path(getCompanyFolderName().'/'),$name);
                 
                    // DB::query('insert into observation_images (observation_id,imagelink,added_by,created_at) values (?,?,?,?)',
                    $data = DB::table('observation_images')->insert([
                        'observation_id' => $request->hiddenId,
                        'file_description' => $request->file_description,
                        'imagelink'     => getCompanyFolderName().'/'.$name,
                        'added_by'      => Auth::user()->id,
                        'created_at'    => date('Y-m-d h:i:s'),
                    ]);
                    // Status Update 
                    DB::table('evaluations_list')->where('el_id',$request->hiddenId)->update(array('status' => 2 ));

                    $last_id = DB::getPdo()->lastInsertId();
                    
                    $explodeImgName = explode("/",$name);
                    $table_return_data.='<tr class="rowImage-'.$last_id.'">
                                            <td><a href="'.asset(MyApp::ASSET_IMG.$name).'">'.$request->file_description.'</a></td>
                                            <td>'.get_user(Auth::user()->id)->username.'</td>
                                            <td>'.date('Y-m-d h:i:s').'</td>
                                            <td><button class="btn upload delete_observation_image" data-id="'.$last_id.'"><i class="fa fa-trash"></i></button></td>
                                        </tr>';
                    $return_data.='  <div class="card-header d-flex justify-content-between">
                                        '.$request->file_description;
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

    public function submit_requirement_result_details(Request $request)
    {
        // Auditor Submit Request 
        if(Auth::user()->usermanagement->belong_to == 2):
            $request->validate([
                'hiddenId'      =>    'required',
                'description'   =>    'required',
                'action'        =>    'required',
            ]);

            $db_return = DB::table('observation_images')
            ->where('obi_id', $request->hiddenId)
            ->limit(1) 
            ->update(array('details' => $request->description, 'action' => $request->action, 'observation_by' =>  Auth::user()->id, 'observation_date' => date("Y-m-d h:i:s")));
            if($db_return):
                DB::table('observation_images')->where('obi_id',$request->hiddenId)->update(array('document_status' => 2));
                DB::table('evaluations_list')->where('el_id',$request->hiddenElId)->update(array('status' => 3 ));
                echo json_encode(array('code'=>200));
            endif;
        endif;
    }

    public function get_prev_uploaded_files(Request $request)
    {
        $table_return_data = '';
        // end($explodeImgName)
        $attachments = DB::table('observation_images')->where(array("observation_id"=>$request->id))->orderByDesc('observation_images.obi_id')->limit(1)->get();
        foreach($attachments as $image):
            $explodeImgName = explode("/",$image->imagelink);
            $table_return_data.='<tr class="rowImage-'.$image->obi_id.'">
                <td><a href="'.asset('public/'.$image->imagelink).'" target="_blank">'.$image->file_description.'</a></td>
                <td>'.get_user($image->added_by)->username.'</td>
                <td>'.$image->created_at.'</td>
                <td>';
                if($image->details == "" && $image->action == ""):
                    $table_return_data.='<button class="btn upload delete_observation_image" data-id="'.$image->obi_id.'"><i class="fa fa-trash"></i></button>';
                endif;
                $table_return_data.='</td>
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
            ->where('obi_id', $obsID)
            ->update(array('document_status' => 1));
    
        if($reject):
            // $aproved = DB::table('observation_images')
            // ->where('obi_id', $obsID)
            // ->update(array('document_status' => 1));
            
            // DB::table('evaluations_list')
            // ->where('el_id', $evaluationID)
            // ->update(array('status' => 1));

            $response = response()->json(['code'=>200, 'message'=>'successfully'], 200);
        else:
            $response = response()->json(['code'=>404, 'message'=>'Data Not Deleted'], 404);
        endif;
        return $response;
    }

    public function approve_clouse(Request $request)
    {
        $evaluationID = Crypt::decrypt($request->evaluation_id);
        $resultQuery = DB::table('evaluations_list')->where('el_id', $evaluationID);
       
        if($resultQuery->count()):    
            DB::table('evaluations_list')
                ->where('el_id', $evaluationID)
                ->update(array('status' => 1));
            $aproved = DB::table('observation_images')
                ->where('observation_id', $evaluationID)
                ->where('document_status', 0)
                ->update(array('document_status' => 2));

            // Task Status Complete 
            $getEva = $resultQuery->get();
            DB::table('tasks')
                ->where('project_id', $getEva[0]->ass_id)
                ->where('req_id', $getEva[0]->req_id)
                ->update(array('status' => 2));

            $response = response()->json(['code'=>200, 'message'=>'successfully'], 200);
        else:
            $response = response()->json(['code'=>404, 'message'=>'Error'], 404);
        endif;
        return $response;
    }

    public function submit_doc_type(Request $request)
    {
        // Auditor Submit Request 
        
            $request->validate([
                'hiddenElId'      =>    'required',
                'doc_type'      =>    'required',
            ]);

            $db_return = DB::table('evaluations_list')
            ->where('el_id', $request->hiddenElId)
            ->limit(1) 
            ->update(array('doc_type' => $request->doc_type));
           echo json_encode(array('code'=>200));
       
    }

    public function auditor_observations($id,$rid)
    {
        $data['action_tracker'] = DB::table('evaluations_list')->where(array('ass_id' => Crypt::decrypt($id), 'req_id' => $rid))->get()->toArray();
        return view('pages.action_tracker',$data);
    }

    public function action_tracker($id)
    {
        
        $data['action_tracker'] = DB::table('evaluations_list')->where(array('ass_id' => Crypt::decrypt($id)))->get()->toArray();
        return view('pages.action_tracker',$data);
        
        // echo  response()->json([
        //     'html' => view('pages.action_tracker',$data)->render()
        // ]);
    }

    public function submit_search_selected(Request $request)
    {
            $request->validate([
                'selectedval'    =>  'required',
                'hiddenId'      =>    'required'
            ]);
            
            
        foreach($request->selectedval as $f):
            $imgdata=DB::table('observation_images')->where(array("obi_id"=>$f))->get()->first();
            if(!empty($imgdata))
            {
                
             $data = DB::table('observation_images')->insert([
                        'observation_id' => $request->hiddenId,
                        'file_description' => $imgdata->file_description,
                        'imagelink'     => $imgdata->imagelink,
                        'added_by'      => Auth::user()->id,
                        'created_at'    => date('Y-m-d h:i:s'),
                    ]);
            }
             
        endforeach;
         echo json_encode(array('code'=>200));
    }

    public function search_document(Request $request)
    {
        $request->validate([
            'value'      =>    'required',
        ]);

        // $level = DB::query("SELECT * FROM observation_images WHERE added_by = '".Auth::user()->id."' AND file_description LIKE '%".$request->value."%'");
        $level=DB::table('observation_images')->where('added_by',Auth::user()->id)->where('file_description','like','%'.$request->value.'%')->get()->toArray();
        foreach($level as $level1)
        {
            echo"<tr>";
            echo"<td>";
            echo$level1->file_description;
            echo"</td>";
            echo"<td>";
            echo'<a href="'.asset('public/'.$level1->imagelink) .'"><i class="fa fa-download"></i></a>';
            echo"</td>";
            echo"<td>";
            echo'<input type="checkbox" name="selectedval[]" value="'.$level1->obi_id.'">';
            echo"</td>";
            echo"</tr>";
        }
        
    }

    public function audit_observation_submit(Request $request)
    {
        if($request->updateType == '1'):
            $data = DB::table('audit_observations')->where("evaluation_id",Crypt::decrypt($request->auditID))->update([
                'evaluation_id' => Crypt::decrypt($request->auditID),
                'clouse_status' => $request->observation_type,
                'comment'       => $request->audit_comment,
                'audit_by'      => Auth::user()->id,
                'updated_at'    => date("Y-m-d h:i:s"),
            ]);
            if($request->observation_type == 3):
                DB::table('evaluations_list')
                    ->where('el_id', Crypt::decrypt($request->auditID))
                    ->update(array('description' => "Not Applicable"));
            endif;
            echo json_encode(array('code'=>200));
        else:
            if($request->observation_type == 3):
                $data = DB::table('audit_observations')->insert([
                    'evaluation_id' => Crypt::decrypt($request->auditID),
                    'clouse_status' => $request->observation_type,
                    'comment'       => $request->audit_comment,
                    'audit_by'      => Auth::user()->id,
                    'created_at'    => date("Y-m-d h:i:s"),
                ]);
                DB::table('evaluations_list')
                    ->where('el_id', Crypt::decrypt($request->auditID))
                    ->update(array('description' => "Not Applicable"));
                echo json_encode(array('code'=>200));
            elseif($request->observation_type == 5):
                $data = DB::table('audit_observations')->insert([
                    'evaluation_id' => Crypt::decrypt($request->auditID),
                    'clouse_status' => $request->observation_type,
                    'comment'       => "Re-open Requirement Clouse",
                    'audit_by'      => Auth::user()->id,
                    'created_at'    => date("Y-m-d h:i:s"),
                ]);
                // Evaluation Status Update 
                DB::table('evaluations_list')
                    ->where('el_id', Crypt::decrypt($request->auditID))
                    ->update(array('status' => 4));
                // Evidence Reject 
                DB::table('observation_images')
                    ->where('observation_id', Crypt::decrypt($request->auditID))
                    ->update(array('document_status' => 2));
                // Task Status Pending
                    // Get Evaakuation Row 
                    $evaluationRow = DB::table('evaluations_list')
                    ->where('el_id', Crypt::decrypt($request->auditID))
                    ->get();

                    DB::table('tasks')
                    ->where('project_id',$evaluationRow[0]->ass_id)
                    ->where('req_id',$evaluationRow[0]->req_id)
                    ->update(array('status' => 0));

                echo json_encode(array('code'=>200));    
            else:
                $request->validate([
                    'audit_comment'         =>  'required',
                    'auditID'               =>    'required',
                    'observation_type'      =>    'required',
                ]);    

                $data = DB::table('audit_observations')->insert([
                    'evaluation_id' => Crypt::decrypt($request->auditID),
                    'clouse_status' => $request->observation_type,
                    'comment'       => $request->audit_comment,
                    'audit_by'      => Auth::user()->id,
                    'created_at'    => date("Y-m-d h:i:s"),
                ]);
                echo json_encode(array('code'=>200));
            endif;
        endif;
    }

    function filter_record_evidence_tracker($id,Request $request)
    {
        $getRows = DB::table('evaluations_list')->where(array('ass_id' => Crypt::decrypt($id),'elevel' => 2,'status' => $request->status))->get()->toArray();
        return view('pages.view_selected_requirements',compact('getRows'));
    }
    
   
}
