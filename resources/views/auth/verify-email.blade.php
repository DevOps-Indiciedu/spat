<!-- Bootsyrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- Login CSS -->
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'login.css') }}">

<style>
    .backImg{
        content: "";
        background: url('{{ asset(MyApp::ASSET_IMG.'bg-new.png') }}');
        height: 100vh;
        background-size: 100% 100%;
        padding-top: 4rem;
        padding-left: 8rem;
    }
</style>
<section class="main">
    <div class="row">
        <div _ngcontent-att-c159="" class="col-md-4 rightSection">
        <div _ngcontent-att-c159="" class="login-wrap">
            <div _ngcontent-att-c159="" class="logodiv text-center">
                <img _ngcontent-att-c159="" src="{{ asset(MyApp::ASSET_IMG.'Secureism-logo.png') }}" alt="" class="t-logo">
            </div>
            <div _ngcontent-att-c159="" class="loginBtn" >
                <div class="p-3">
                    <h3 class="account-title">{{ __('Password Setup') }}</h3>
                    <div class="account-subtitle"><hr class="set-hrleft"><span>{{ __('Create New Password') }}</span><hr class="set-hrright"></div>
                </div>
                <div _ngcontent-att-c159="">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('create-password') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ Request::segment(2) }}">
                        <input type="hidden" name="id" value="{{ Request::segment(3) }}">
                        <input id="email" placeholder="Email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ get_user(Request::segment(3))->email }}" required autocomplete="email" readonly>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <input id="password" placeholder="New Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        <br>
                        <button _ngcontent-att-c159="" class="button btn btn-outline-dark text-center mb-2 lbtn">{{ __('Create Password') }}</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="footr-powerdby"><span>{{ __('Powered By') }}</span><a href="https://indiciedu.com.pk" target="_blank"><img src="https://indiciedu.com.pk/frontend/wp-content/uploads/2021/06/SVGindici-edu.svg" class="w-25 pl-2"></a></div>
        </div>
        <div _ngcontent-bkv-c159="" class="col-md-8 backImg">
        <div _ngcontent-bkv-c159="" class="loginBtn loginBtn2">
            <div _ngcontent-bkv-c159="" class="rightContText" style="line-height: 1;">
            <div _ngcontent-bkv-c159="" class="mt-1 redText"> {{ __('Working Better Together!') }} </div>
            <div _ngcontent-bkv-c159="" class="blueText">{{ __("If you can't measure it, you can't manage it.") }} </div>
            <!--<div _ngcontent-bkv-c159="" class="blueText"> Effective Monitoring, More Productivity. </div>-->
            </div>
            <div _ngcontent-bkv-c159="" class="text-right videoPadding py-1">
            <div _ngcontent-bkv-c159="" class="card card-v">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset(MyApp::ASSET_IMG.'team4.jpg') }}">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset(MyApp::ASSET_IMG.'attendance4.jpg') }}">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset(MyApp::ASSET_IMG.'leaves4.jpg') }}">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset(MyApp::ASSET_IMG.'project4.jpg') }}">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset(MyApp::ASSET_IMG.'task4.jpg') }}">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset(MyApp::ASSET_IMG.'chat4.jpg') }}">
                        </div>
                    </div>
                    </div>
            </div>
        </div>
        <div _ngcontent-bkv-c159="" class="rightContText" style="margin-top: -15px;">
            <h2 _ngcontent-bkv-c159="" class="mt-1 h2Text"> {{ __('GET FULL ACCESS TO PMS WITH THESE FEATURES') }} </h2>
        </div>
        <div _ngcontent-bkv-c159="" class="row p-3 rightContText" style="margin-top: -10px;">
            <div _ngcontent-bkv-c159="" class="text-center col-md-2 col-4" style=" line-height: 10px;margin-bottom: 10px;">
                <img _ngcontent-bkv-c159="" src="{{ asset(MyApp::ASSET_IMG.'teams.png') }}" class="text-center pb-1 footer-img">
                <br _ngcontent-bkv-c159="">
                <span _ngcontent-bkv-c159="" class="footer-img-text" style="font-weight: bold;">
                    {{ __('Manage') }}
                    <br _ngcontent-bkv-c159="">{{ __('Companies') }}
                </span>
            </div>
            <div _ngcontent-bkv-c159="" class="text-center col-md-2 col-4" style=" line-height: 10px;margin-bottom: 10px;">
                <img _ngcontent-bkv-c159="" src="{{ asset(MyApp::ASSET_IMG.'attendance.png') }}" class="text-center pb-1 footer-img">
                <br _ngcontent-bkv-c159="">
                <span _ngcontent-bkv-c159="" class="footer-img-text" style="font-weight: bold;">{{ __('Manage') }}
                    <br _ngcontent-bkv-c159="">{{ __('Departments') }}
                </span>
            </div>
            <div _ngcontent-bkv-c159="" class="text-center col-md-2 col-4" style=" line-height: 10px;margin-bottom: 10px;">
                <img _ngcontent-bkv-c159="" src="{{ asset(MyApp::ASSET_IMG.'leaves.png') }}" class="text-center pb-1 footer-img">
                <br _ngcontent-bkv-c159="">
                <span _ngcontent-bkv-c159="" class="footer-img-text" style="font-weight: bold;">{{ __('Manage') }} 
                    <br _ngcontent-bkv-c159="">{{ __('Users') }}</span>
                </div>
                <div _ngcontent-bkv-c159="" class="text-center col-md-2 col-4" style=" line-height: 10px;margin-bottom: 10px;">
                    <img _ngcontent-bkv-c159="" src="{{ asset(MyApp::ASSET_IMG.'projects.png') }}" class="text-center pb-1 footer-img">
                    <br _ngcontent-bkv-c159="">
                    <span _ngcontent-bkv-c159="" class="footer-img-text" style="font-weight: bold;">{{ __('Manage') }}  
                        <br _ngcontent-bkv-c159="">{{ __('Roles') }} </span>
                    </div>
                    <div _ngcontent-bkv-c159="" class="text-center col-md-2 col-4" style=" line-height: 10px;margin-bottom: 10px;">
                        <img _ngcontent-bkv-c159="" src="{{ asset(MyApp::ASSET_IMG.'tasks.png') }}" class="text-center pb-1 footer-img">
                        <br _ngcontent-bkv-c159="">
                        <span _ngcontent-bkv-c159="" class="footer-img-text" style="font-weight: bold;">{{ __('Manage') }}  
                            <br _ngcontent-bkv-c159="">{{ __('Tasks') }} </span>
                        </div>
                        <div _ngcontent-bkv-c159="" class="text-center col-md-2 col-4" style=" line-height: 10px;margin-bottom: 10px;">
                            <img _ngcontent-bkv-c159="" src="{{ asset(MyApp::ASSET_IMG.'group-chat') }}.png" class="text-center pb-1 footer-img">
                            <br _ngcontent-bkv-c159="">
                            <span _ngcontent-bkv-c159="" class="footer-img-text" style="font-weight: bold; word-break: break-all;">{{ __('Manage') }}  
                                <br _ngcontent-bkv-c159="">{{ __('Onboarding') }}
                            </span>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>