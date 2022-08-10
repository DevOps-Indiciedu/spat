<title>Two Factor Authentication | {{ config('app.name', 'SPAT') }}</title>
<!-- Bootsyrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<!-- Login CSS -->
<link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'login.css') }}">
<script src="{{ asset(MyApp::ASSET_SCRIPT.'jquery.min.js') }}"></script>

<style>
    .backImg{
        content: "";
        background: url('{{ asset(MyApp::ASSET_IMG.'bg-new.png') }}');
        height: 100vh;
        background-size: 100% 100%;
        padding-top: 4rem;
        padding-left: 8rem;
    }
    .D-2FA{
        display: flex;
        justify-content: space-around;
        font-weight:600;
    }
</style>
<section class="main">
    <div class="row">
        <div _ngcontent-att-c159="" class="col-md-12 rightSection">
        <div _ngcontent-att-c159="" class="login-wrap" style="position: relative;top: @if(auth()->user()->two_factor_secret)@if(auth()->user()->twoFactorQrCodeSvg()) 10% @endif @else 20% @endif;padding: 25px;width:500px !important;background:white;">
            <div _ngcontent-att-c159="" class="logodiv text-center">
                <img _ngcontent-att-c159="" src="{{ asset(MyApp::ASSET_IMG.'Secureism-logo.png') }}" alt="" class="t-logo">
            </div>
            <div _ngcontent-att-c159="" class="loginBtn">
                <div class="p-3">
                @if(auth()->user()->two_factor_secret)
                    @if(auth()->user()->twoFactorQrCodeSvg())
                    <h3 class="account-title">{{ __('Scan QR Code') }}</h3>
                    <div class="account-subtitle"><hr class="set-hrleft"><span>{{ __('You can Scan This Code Only Using Authenticator App On Your Mobile') }}</span><hr class="set-hrright"></div>
                    <a class="D-2FA" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en&gl=US" target="_blank">Download Authenticator App</a>
                    @endif
                @else
                    <h3 class="account-title">{{ __('Enable Two Factor Authentication') }}</h3>
                    <div class="account-subtitle"><hr class="set-hrleft"><span>{{ __('Please Complete This Step Then You Can Access Your Dashboard') }}</span><hr class="set-hrright"></div>
                @endif
                </div>
                <div _ngcontent-att-c159="" class="text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(auth()->user()->two_factor_secret)
                        @if(auth()->user()->twoFactorQrCodeSvg())
                        {!! auth()->user()->twoFactorQrCodeSvg() !!}
                        @else
                        <form action="user/two-factor-authentication" method="POST">
                            @csrf 
                            <button _ngcontent-att-c159="" class="button btn btn-outline-dark text-center mb-2 lbtn">{{ __('Get QR') }}</button>
                        </form>
                        @endif
                    <!-- @method('DELETE') -->
                    <!-- {!! auth()->user()->twoFactorQrCodeSvg() !!} -->
                        <!-- <form action="user/two-factor-authentication" method="POST">
                            @csrf 
                            <button _ngcontent-att-c159="" class="button btn btn-outline-dark text-center mb-2 lbtn">{{ __('Enable 2FA') }}</button>
                        </form> -->
                    @else
                        <form action="user/two-factor-authentication" method="POST">
                            @csrf 
                            <button _ngcontent-att-c159="" class="button btn btn-outline-dark text-center mb-2 lbtn">{{ __('Proceed Next') }}</button>
                        </form>
                    @endif
                </div>
            </div>
            <div class="footr-powerdby">
            @if(auth()->user()->two_factor_secret)
                @if(auth()->user()->twoFactorQrCodeSvg())
                    <p>Please Scan Code </p>
                    <form action="{{ url('2fa-challenge') }}" method="GET">
                        <button type="submit" _ngcontent-att-c159="" class="button btn btn-outline-dark text-center mb-2 lbtn">{{ __('Enter Code Here') }}</button>
                    </form>
                @endif
            @endif
            <br><br>
                <span>{{ __('Powered By') }}</span>
                <a href="https://indiciedu.com.pk" target="_blank">
                    <img src="https://indiciedu.com.pk/frontend/wp-content/uploads/2021/06/SVGindici-edu.svg" width="100">
                </a>
            </div>
        </div>
    </div>
</section>

<script>
    setTimeout(function() { 
        $(".alert").hide();
    }, 2000);
</script>