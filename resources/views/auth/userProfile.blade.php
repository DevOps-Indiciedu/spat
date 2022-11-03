@extends('layouts.app')

@section('content')
<!-- Page Content  -->
<div id="content-page" class="content-page mt-4 pt-5">
    <div class="container-fluid mt-4 pt-5">
    <form action="" id="userProfileUpdate" method="POST" enctype="multipart/form-data">
        @csrf 
        <div class="row" style="justify-content: center;align-items: center;">
            <div class="col-sm-4 col-lg-3 mt-4 pt-3">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">{{ __('My Profile') }}</h4>
                        </div>
                    </div>
                    <div class="iq-card-body text-center">
                        <div class="form-group row align-items-center">
                            <div class="col-md-12">
                                <div class="profile-img-edit">
                                @if(auth()->user()->usermanagement->profile_image != "")
                                    <img src="{{ asset(MyApp::PROFILE.auth()->user()->usermanagement->profile_image) }}" class="profile-pic" alt="{{ auth()->user()->usermanagement->profile_image }}" style="border-radius: 50% !important;width: 100%;height: 100%;">
                                @else
                                <img class="profile-pic" src="{{ asset(MyApp::DEFAULT_IMG) }}" alt="profile-pic" style="border-radius: 50% !important;width: 100%;height: 100%;">
                                @endif
                                    <div class="p-image">
                                        <i class="ri-pencil-line upload-button"></i>
                                        <input class="file-upload" type="file" name="image" accept="image/*">
                                        <input type="hidden" name="hiddenProfile" value="{{ auth()->user()->usermanagement->profile_image }}">
                                    </div>
                                </div>
                                @if(auth()->user()->two_factor_secret && auth()->user()->usermanagement->two_factor_enabled == 1)
                                <div class="twit-feed">
                                    <p>Two Factor Authentication (Enabled) <span><i class="ri-check-fill"></i> </span></p>
                                </div>
                                @else
                                <div class="twit-feed">
                                    <p>Two Factor Authentication (Disabled) 
                                        <!-- <span><i class="ri-check-fill"></i> </span> -->
                                    </p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-lg-6 mt-4 pt-3">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">{{ __('My Profile') }}</h4>
                            </div>
                        </div>
                        <div class="iq-card-body row">
                            <div class="form-group col-lg-6">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
                                <span id="pemailErr" class="text-danger"></span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ auth()->user()->name }}">
                                <span id="pnameErr" class="text-danger"></span>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="old_password">Old Password</label>
                                <input type="password" id="old_password" name="old_password" class="form-control" value="" autocomplete="off">
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="new_password">New Password</label>
                                <br>
                                <small>Password Format: Lengtgh Min 8 character , 1 Upper Letter , 1 Lower Letter , 1 Symbol , 1 Digit</small>
                                <span class="password-validate text-danger" style="font-weight:500;font-size: 13px;display: flex;flex-direction: column-reverse; position: relative;" role="alert"></span>
                                <input type="password" id="new_password" name="new_password" class="form-control">
                                <span id="passErr" class="text-danger"></span>
                            </div>
                            <div class="form-group col-lg-12">
                                <button type="submit" class="btn btn-primary float-right">Update Profile</button>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


@include('pages.ajax.userAjax')
<script>
    $("#form_loader").css("display","none !important");
    $("#new_password").on("keyup",function(){
        var pass = $(this).val();
        if(pass != ""){
            $.ajax({
                url:"{{ route('password-validation') }}",
                type : 'POST',
                data:{
                    "_token": "{{ csrf_token() }}",
                    'password' : pass
                },
                success:function(data) {
                    if(data == "")
                    {
                        $(".password-validate").removeClass('text-danger');
                        $(".password-validate").addClass('text-success');
                        $(".password-validate").text('Password Accepted');
                        $(".password-validate").css({"top": "36px", "left": "80%"});
                    }
                },error:function(err)
                {
                    $(".password-validate").removeClass('text-success');
                    $(".password-validate").addClass('text-danger');
                    // $(".password-validate").text('Password Accepted');
                    $(".password-validate").css({"top": "", "left": ""});

                    $(".password-validate").html("<li>"+err.responseJSON.errors.password[0]+"</li><li>"+err.responseJSON.errors.password[1]+"</li><li>"+err.responseJSON.errors.password[2]+"</li><li>"+err.responseJSON.errors.password[3]+"</li>");

                    // $(".password-validate > li:contains(undefined)").contents().filter(function () {
                    //     return $(this).parent("li");
                    // }).remove();
                    $(".password-validate > li:contains(undefined)").filter(function () {
                        return $(this).parent("li");
                    }).remove();
                }
            });
        }else{
            // $("#loc_data").html("<select class='form-control'><option value=''>Select Location</option></select>");
        }
    });
</script>
@endsection