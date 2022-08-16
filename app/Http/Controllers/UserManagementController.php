<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserManagement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;


class UserManagementController extends Controller
{
    public function index()
    {
        
        if(Auth::user()->system_admin == 1):
            $userID = 0;
        else:
            $userID = Auth::user()->id;    
        endif;
    	$user['user'] = DB::select('call GetAllUsers('.$userID.')');
        return view('pages.user_management',$user);
    }

    public function insertOrupdate(Request $request)
    {
        if($request->hiddenId == ""):
            $email = "required|email|unique:users";
        else:    
            $email = "required";
        endif;    
        
        $request->validate([
            'name'	            =>	'required',
            'email'             =>   $email,
            'phone'	            =>	'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'designation_id'	=>	'required',
            'company_id'	    =>	'required',
            'location_id'	    =>	'required',
            'department_id'	    =>	'required',
            'role_id'	        =>	'required',
            'status'	        =>	'required',
        ]);
            if ($request->hiddenId == "") {
                DB::beginTransaction();
                try {  
                $user = DB::select('call InsertUsers(?,?,?,?)',
                [
                    $request->name,
                    $request->email,
                    Hash::make('secureism123'),
                    Str::random(10)
                ]);
    
                // Mail Send User Passwordd Setup 
                if($user):
                    $userEmail = User::findOrFail($user[0]->LAST_ID); 
                    $body = [
                        'name'      => $userEmail->name,
                        'btn_url'   => url('verify-email').'/'.Crypt::encrypt($userEmail->remember_token).'/'.$userEmail->id,
                    ];
                    Mail::to($userEmail->email)->send(new WelcomeMail($body));
                endif;                 
                
                    $files = [];
                    $x = 50;
                    if($request->hasfile('image')):
                        $file = $request->file('image');
                        $name = time().rand(1,100).'.'.$file->extension();
                        $img = \Image::make($file);
                        $img->save(public_path('profile_images/'.$name),$x);
                        $profile_image = $name;
                    else:
                        $profile_image = $request->hiddenProfile;
                    endif;
                    $data = DB::select('call InsertUserManagment(?,?,?,?,?,?,?,?,?,?,?,?,?)',
                        [
                            $user[0]->LAST_ID,
                            $request->name,
                            $request->email,
                            $request->phone,
                            $request->address,
                            $request->designation_id,
                            $request->company_id,
                            $request->location_id,
                            $request->department_id,
                            $request->role_id,
                            $request->status,
                            "",
                            Auth::user()->id,
                        ]);
                    DB::commit();
                
                } catch (\Exception $e) {
                    $data = $e->getMessage();
                }
            }else{
                // DB::transaction(function () {  
                    $user = DB::select('call UpdateUsers('.$request->hiddenId.',?,?)',
                        [
                            $request->name,
                            $request->email,
                        ]);  
                
                    $files = [];
                    $x = 50;
                    if($request->hasfile('image')):
                        $file = $request->file('image');
                        deleteFile('profile_images',$request->hiddenProfile);
                        $name = time().rand(1,100).'.'.$file->extension();
                        $img = \Image::make($file);
                        $img->save(public_path('profile_images/'.$name),$x);
                        $profile_image = $name;
                    else:
                        $profile_image = $request->hiddenProfile;
                    endif;

                    $data = DB::select('call UpdateUserManagment('.$request->hiddenId.',?,?,?,?,?,?,?,?,?,?,?)',
                        [
                            $request->name,
                            $request->email,
                            $request->phone,
                            $request->address,
                            $request->designation_id,
                            $request->company_id,
                            $request->location_id,
                            $request->department_id,
                            $request->role_id,
                            $request->status,
                            $profile_image,
                        ]);
                // });
            }
        return response()->json($data);
    }

    public function destroy(Request $request)
    {
    	// $rec = UserManagement::find($request->id)->delete();
        // if($rec):
        //     $response = response()->json(['code'=>200, 'message'=>'Data Deleted successfully'], 200);
        // endif;    
        // return $response;
        try {
            $rec = DB::select('call DeleteUserManagment('.$request->id.')');
            $response = response()->json(['code'=>200, 'message'=>'Data Deleted successfully'], 200);
    	} catch(Exception $e) {
            $response = response()->json(['code'=>404, 'message'=>'Data Not Deleted'], 404);
        }

        return $response;
    }

    public function edit($usermanagement_id)
    {
        $data = DB::SELECT('call EditUserManagment('.$usermanagement_id.')');
        return $data;
    }

    public function profile()
    {
        return view('auth.userProfile');
    }

    public function create_password(Request $request)
    {
        $request->validate([
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
            'email'     =>  'required|email',
            // 'password'  => 'required|string|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        ]);
        // Password Format (Zeeshan123@)
        $token = Crypt::decrypt($request->token);
        $user = DB::table('users')->where('id',$request->id)->where('email',$request->email)->where('remember_token',$token)->first();
        // dd($user);
        if($user->email_verified_at == NULL):
            // DB::enableQueryLog();
            $data = DB::table('users')->where('id',$request->id)->update([
	    		'password'			=>	Hash::make($request->password),
	    		'email_verified_at'	=>	date("Y-m-d h:i:s"),
	    	]);
            // dd(DB::getQueryLog());
            return redirect()->route('login')->with('success','Password created successfully');
        else:
            return redirect()->route('login')->with('error','Token has been expired');
        endif;    
    }

    public function profile_update(Request $request)
    {
        $request->validate([
            'name'            =>  'required',
            'email'           =>  'required',
        ]);

        $x = 50;
        if($request->hasfile('image')):
            $file = $request->file('image');
            deleteFile('profile_images',$request->hiddenProfile);
            $name = time().rand(1,100).'.'.$file->extension();
            $img = \Image::make($file);
            $img->save(public_path('profile_images/'.$name),$x);
            $profile_image = $name;
        else:
            $profile_image = $request->hiddenProfile;
        endif;

        $user = User::find(Auth::user()->id);
        if($request->old_password != "" && $request->new_password != ""):
            $request->validate([
                'new_password'            =>  'required|string|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            ]);
            if($user->password == Hash::make($request->old_password)):
                $new_password = Hash::make($request->new_password);
                DB::beginTransaction();
                try {
                    User::where("id",Auth::user()->id)->update(['name' => $request->name, 'password' => $new_password]);
                    $data = UserManagement::where("user_id",Auth::user()->id)->update(['name' => $request->name,'profile_image' => $profile_image]);
                    DB::commit();
                    return Redirect::back()->with('success','Profile Updated Successfully');
                } catch (\Exception $e) {
                    $data = $e->getMessage();
                }         
            endif;
        else:
            DB::beginTransaction();
            try {
                User::where("id",Auth::user()->id)->update(['name' => $request->name]);
                $data = UserManagement::where("user_id",Auth::user()->id)->update(['name' => $request->name,'profile_image' => $profile_image]);
            DB::commit();
            } catch (\Exception $e) {
                $data = $e->getMessage();
            } 
        endif;

        return response()->json($data);
    }

    public function TwoFactorPermission($userID,$status)
    {
        
        if($userID != "" && $status != ""):
            $data = DB::table('user_management')->where('user_id',$userID)->update([
	    		'two_factor_enabled'=>	intval($status),
	    		'updated_at'	    =>	date("Y-m-d h:i:s"),
	    	]);
            $data_user = DB::table('users')->where('id',$userID)->update([
	    		'two_factor_secret' =>	'',
	    		'updated_at'	    =>	date("Y-m-d h:i:s"),
	    	]);
            $response = response()->json(['code'=>200, 'message'=>'2FA Enabled successfully'], 200);
        else:
            $response = response()->json(['code'=>500, 'message'=>'System Error'], 500);
        endif;    
    }

    public function DisableTwoFactorPermission($userID,$status)
    {
        
        if($userID != "" && $status != ""):
            $data = DB::table('user_management')->where('user_id',$userID)->update([
	    		'two_factor_disabled_access'    =>	intval($status),
	    		'updated_at'	                =>	date("Y-m-d h:i:s"),
	    	]);
            $data_user = DB::table('users')->where('id',$userID)->update([
	    		'two_factor_secret'         =>	'',
	    		'two_factor_recovery_codes' =>	'',
	    		'updated_at'	            =>	date("Y-m-d h:i:s"),
	    	]);
            $response = response()->json(['code'=>200, 'message'=>'2FA Enabled successfully'], 200);
        else:
            $response = response()->json(['code'=>500, 'message'=>'System Error'], 500);
        endif;    
    }
}
