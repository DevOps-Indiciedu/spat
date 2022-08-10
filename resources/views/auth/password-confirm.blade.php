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
        <div _ngcontent-att-c159="" class="col-md-12 rightSection">
        <div _ngcontent-att-c159="" class="login-wrap" style="position: relative;top: 22%;padding: 25px;width:500px !important;background:white;">
            <div _ngcontent-att-c159="" class="logodiv text-center">
                <img _ngcontent-att-c159="" src="{{ asset(MyApp::ASSET_IMG.'Secureism-logo.png') }}" alt="" class="t-logo">
            </div>
            <div _ngcontent-att-c159="" class="loginBtn">
                <div class="p-3">
                    <h3 class="account-title">{{ __('Confirm Password') }}</h3>
                    <div class="account-subtitle"><hr class="set-hrleft"><span>{{ __('Please confirm your password before continuing.') }}</span><hr class="set-hrright"></div>
                </div>
                <div _ngcontent-att-c159="">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="row mb-3">
                            <input  type="password" placeholder="Password" name="password" class="form-control mb-0 @error('password') is-invalid @enderror" required autocomplete="current-password">
                            <br>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-0">
                            <button type="submit" class="button btn btn-outline-dark text-center mb-2 lbtn">
                                {{ __('Confirm Password') }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="footr-powerdby">
                <span>{{ __('Powered By') }}</span>
                <a href="https://indiciedu.com.pk" target="_blank">
                    <img src="https://indiciedu.com.pk/frontend/wp-content/uploads/2021/06/SVGindici-edu.svg" width="100">
                </a>
            </div>
        </div>
    </div>
</section>
