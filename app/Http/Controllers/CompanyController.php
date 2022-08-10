<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use File;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;


class CompanyController extends Controller
{
    public function index()
    {
        $company['company'] = DB::select('call GetAllCompanies('.Auth::user()->usermanagement->role_id.')');
        return view('pages.company',$company);
    }
    
    public function company_onboarding()
    {
        return view('pages.company_onboarding');
    }
    
    public function insertOrupdate(Request $request)
    {
        if($request->hiddenId == ""):
            $email = "required|email|unique:users";
        else:    
            $email = "required";
        endif;

    	$request->validate([
    		'company_name'	        =>	'required|unique:companies',
    		'company_contact_name'	=>	'required',
    		'company_phone'	        =>	'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
    		'email'	                =>	 $email,
    		'company_standard_id'	=>	'required',
    	]);
        

        if($request->hiddenId == ""):
        DB::beginTransaction();
        try {
            $company_name =  str_replace(' ', '_', $request->company_name);
            $company_folder_name =  strtolower($company_name);

            $user = DB::select('call InsertUsers(?,?,?,?)',
            [
                $request->company_contact_name,
                $request->email,
                Hash::make('secureism123'),
                Str::random(10)
            ]);

            // Create Default Location Admin Role 
            $locationAdmin = DB::select('call InsertRole("Location Admin",'. $user[0]->LAST_ID.')');
            // Clone Role Rights
            $role = DB::table('user_role_rights')->where('role_id', 2)->get();
            foreach($role as $role_actions):
                DB::insert('insert into user_role_rights (role_id,action_id,created_at,updated_at) values(?,?,?,?)',[$locationAdmin[0]->LAST_ID,$role_actions->action_id,date('Y-m-d h:i:s'),date('Y-m-d h:i:s')]);
            endforeach;	
            // Cloning End 

            // Mail Send User Passwordd Setup 
            if($user):
                $userEmail = User::findOrFail($user[0]->LAST_ID); 
                $body = [
                    'name'      => $userEmail->name,
                    'btn_url'   => url('verify-email').'/'.Crypt::encrypt($userEmail->remember_token).'/'.$userEmail->id,
                ];
                Mail::to($userEmail->email)->send(new WelcomeMail($body));
            endif;            
            $data = DB::select('call InsertCompany(?,?,?,?,?,?,?,?,?,?)',
            [
                $user[0]->LAST_ID,
                $request->company_name,
                $request->company_contact_name,
                $request->company_phone,
                $request->email,
                $request->company_website,
                $request->company_address,
                $request->company_standard_id,
                $request->company_max_users,
                $company_folder_name,
            ]);
            
            $user_manage = DB::select('call InsertUserManagment(?,?,?,?,?,?,?,?,?,?,?,?,?)',
            [
                $user[0]->LAST_ID,
                $request->company_contact_name,
                $request->email,
                $request->company_phone,
                $request->company_address,
                1,
                $data[0]->LAST_ID,
                0,
                0,
                2,
                '1',
                '',
                Auth::user()->id,
            ]);
            
            $path = public_path().'/companies/'.$company_folder_name;
            File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

            DB::commit();
        } catch (\Exception $e) {
            // return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            $data = $e->getMessage();
        }     
        else: 
            $data = DB::select('call UpdateCompany('.$request->hiddenId.', ?, ?)',
            [
                $request->company_name,
                $request->company_contact_name,
                $request->company_phone,
                $request->company_email,
                $request->company_website,
                $request->company_address,
                $request->company_standard,
                $request->company_max_users,
            ]);
            // $data = Company::updateOrCreate(
            //     [
            //         'id'	=>	$request->hiddenId,
            //     ],
            //     [
            //         'company'	=>	$request->company,
            //     ]
            // );
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

    public function block_company(Request $request)
    {
        if($request->block == '1'):
            $msg = "Account Unblocked Successfully";
            $block = '0';
        elseif($request->block == '0'):
            $msg = "Account Blocked Successfully";
            $block = '1';
        endif;

        try {
            // DB::beginTransaction();
            // try { 
                $rec = DB::select("CALL BlockCompany(".$request->id.",".$block.")");
                $response = response()->json(['code'=>200, 'message'=>$msg], 200);
            // DB::commit();   
            // } catch (\Exception $e) {
            //     $response = $e->getMessage();
            // }        
        } catch(Exception $e) {
            $response = response()->json(['code'=>404, 'message'=>'Account Blocking Unsuccessfully'], 404);
        }
        // $rec = Company::find($request->id)->delete();
        // if($rec):
        // endif;    
        return $response;
    }

    public function edit($company_id)
    {
        $data = DB::SELECT('call EditCompany('.$company_id.')');
        return $data;
        // $data = Company::findOrFail($company_id);
        // return response()->json($data);
    }

    public function insertOrupdateAssessor(Request $request)
    {
        
        if($request->hiddenId == ""):
            $email = "required|email|unique:users";
        else:    
            $email = "required";
        endif;

    	$request->validate([
    		'company_name'	        =>	'required',
    		'assessor_name'	        =>	'required',
    		'assessor_phone'	    =>	'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
    		'email'	                =>	 $email,
    		'assessor_creds'	    =>	'required',
    	]);
        

        if($request->hiddenId == ""):
        DB::beginTransaction();
        try {
            $user = DB::select('call InsertUsers(?,?,?,?)',
            [
                $request->assessor_name,
                $request->email,
                Hash::make('secureism123'),
                Str::random(10)
            ]);

            // Create Default Location Admin Role 
            $locationAdmin = DB::select('call InsertRole("Location Admin",'. $user[0]->LAST_ID.')');
            // Clone Role Rights
            $role = DB::table('user_role_rights')->where('role_id', 3)->get();
            foreach($role as $role_actions):
                DB::insert('insert into user_role_rights (role_id,action_id,created_at,updated_at) values(?,?,?,?)',[$locationAdmin[0]->LAST_ID,$role_actions->action_id,date('Y-m-d h:i:s'),date('Y-m-d h:i:s')]);
            endforeach;	
            // Cloning End 

            // Mail Send User Passwordd Setup 
            if($user):
                $userEmail = User::findOrFail($user[0]->LAST_ID); 
                $body = [
                    'name'      => $userEmail->name,
                    'btn_url'   => url('verify-email').'/'.Crypt::encrypt($userEmail->remember_token).'/'.$userEmail->id,
                ];
                Mail::to($userEmail->email)->send(new WelcomeMail($body));
            endif;
            
            $data = DB::select('call InsertAssessor(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
            [
                $user[0]->LAST_ID,
                $request->company_name,
                $request->company_website,
                $request->company_address,
                $request->assessor_name,
                $request->assessor_creds,
                $request->assessor_phone,
                $request->email,
                $request->qa_review_name,
                $request->qa_review_phone,
                $request->qa_review_email,
                $request->date_of_report,
                $request->time_assessment_start_date,
                $request->time_assessment_complete_date,
                $request->identity_start_date,
                $request->identity_complete_date,
                $request->identity_decription,
                $request->pci_dss_version,
                $request->disclose_qsac,
                $request->efforts_qsac,
            ]);
            $user_manage = DB::select('call InsertUserManagment(?,?,?,?,?,?,?,?,?,?,?,?,?)',
            [
                $user[0]->LAST_ID,
                $request->assessor_name,
                $request->email,
                $request->assessor_phone,
                $request->company_address,
                20,
                $data[0]->LAST_ID,
                0,
                0,
                3,
                '1',
                '',
                0,
            ]);
            // dd($user_manage);
            DB::commit();
        } catch (\Exception $e) {
            $data = $e->getMessage();
        }     
        else: 
            $data = DB::select('call UpdateCompany('.$request->hiddenId.', ?, ?)',
            [
                $request->company_name,
                $request->company_contact_name,
                $request->company_phone,
                $request->company_email,
                $request->company_website,
                $request->company_address,
                $request->company_standard,
                $request->company_max_users,
            ]);
            // $data = Company::updateOrCreate(
            //     [
            //         'id'	=>	$request->hiddenId,
            //     ],
            //     [
            //         'company'	=>	$request->company,
            //     ]
            // );
        endif;    

    	return response()->json($data);
    }

   
}
