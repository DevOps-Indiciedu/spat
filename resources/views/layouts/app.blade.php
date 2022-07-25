<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SPAT') }}</title>
    @auth
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'bootstrap.min.css') }}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'typography.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'responsive.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @else
    <!-- Bootsyrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- Login CSS -->
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'login.css') }}">
    @endauth
    

    <!-- jQuery  -->
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'jquery.min.js') }}"></script>
    <!-- Sweet Alert  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
</head>
<body>
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        <div class="loader">
            <div class="cube">
                <div class="sides">
                    <div class="top"></div>
                    <div class="right"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="front"></div>
                    <div class="back"></div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- loader END -->

    <div id="app">
        <!-- Wrapper Start -->
      <div class="wrapper">
        @auth
         <!-- TOP Nav Bar -->
         <div class="iq-top-navbar">
            <div class="iq-navbar-custom d-flex align-items-center justify-content-between">
               <div class="iq-sidebar-logo">
                  <div class="top-logo">
                     <a href="{{ url('home') }}" class="logo">
                     <img src="{{ asset(MyApp::ASSET_IMG.'Secureism-logo.png') }}" class="img-fluid" alt="">
                     <!-- <span>Sofbox</span> -->
                     </a>
                  </div>
               </div>
               <div class="iq-menu-horizontal">
                  <nav class="iq-sidebar-menu">                     
                  <ul id="iq-sidebar-toggle" class="iq-menu d-flex">
                     <li class="active">
                        <a href="{{ url('home') }}" class="iq-waves-effect collapsed"><i class="ri-home-4-line"></i><span>Dashboard</span></a>
                     </li>
                     <li>
                        <a href="#" class="iq-waves-effect collapsed"><i class="ri-record-circle-line"></i><span>Manage</span></a>
                        <ul id="menu-level" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li>
                                <a href="{{ route('company') }}">
                                    <span>Company Management</span>
                                </a>
                           </li>
                           <li>
                                <a href="{{ route('designation') }}">
                                    <span>Designation Management</span>
                                </a>
                           </li>
                           <li>
                                <a href="{{ route('location') }}">
                                    <span>Location Management</span>
                                </a>
                           </li>
                           <li>
                                <a href="{{ route('department') }}">
                                    <span>Department Management</span>
                                </a>
                           </li>
                           <li>
                                <a href="{{ route('user_role') }}">
                                    <span>Role Management</span>
                                </a>
                           </li>
                           <li>
                                <a href="{{ route('user') }}">
                                    <span>User Management</span>
                                </a>
                           </li>
                           <li>
                                <a href="{{ route('task') }}">
                                    <span>Task Management</span>
                                </a>
                           </li>
                        </ul>
                     </li>
                     <li>
                        <a href="{{ route('view_requirements') }}" class="iq-waves-effect collapsed"><i class="ri-record-circle-line"></i>
                        <span>PCI DSS Standard</span></a>
                     </li>
                     <li>
                        <a href="{{ route('company_onboarding') }}" class="iq-waves-effect collapsed"><i class="ri-record-circle-line"></i>
                        <span>Company Onboarding</span></a>
                     </li>
                     <li>
                        <a href="#" class="iq-waves-effect collapsed"><i class="ri-record-circle-line"></i>
                        <span>Requirements</span></a>
                        <ul id="dashboard" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="{{ route('req1') }}">Requirement 1</a></li>
                           <li><a href="{{ route('req2') }}">Requirement 2</a></li>
                           <li><a href="{{ route('req3') }}">Requirement 3</a></li>
                        </ul>
                     </li>
                  </ul>
               </nav>
               </div>
               <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="ri-menu-3-line"></i>
                  </button>
                  <div class="iq-menu-bt align-self-center">
                     <div class="wrapper-menu">
                        <div class="line-menu half start"></div>
                        <div class="line-menu"></div>
                        <div class="line-menu half end"></div>
                     </div>
                  </div>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav ml-auto navbar-list">

                        <li class="nav-item dropdown">
                           <a href="#" class="search-toggle iq-waves-effect">
                              <i class="ri-mail-line"></i>
                              <span class="badge badge-pill badge-primary badge-up count-mail">0</span>
                           </a>
                           <div class="iq-sub-dropdown">
                              <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3">
                                       <h5 class="mb-0 text-white">All Messages<small class="badge  badge-light float-right pt-1">0</small></h5>
                                    </div>
                                    <!-- <a href="#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="{{ asset(MyApp::ASSET_IMG.'user/01.jpg') }}" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Nik Emma Watson</h6>
                                             <small class="float-left font-size-12">13 Jun</small>
                                          </div>
                                       </div>
                                    </a> -->
                                    
                                 </div>
                              </div>
                           </div>
                        </li>
                        <li class="nav-item">
                           <a href="#" class="search-toggle iq-waves-effect">
                              <i class="ri-notification-2-line"></i>
                              <span class="bg-danger dots"></span>
                           </a>
                           <div class="iq-sub-dropdown">
                              <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0 ">
                                    <div class="bg-danger p-3">
                                       <h5 class="mb-0 text-white">All Notifications<small class="badge  badge-light float-right pt-1">0</small></h5>
                                    </div>
                                    <!-- <a href="#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">New Order Recieved</h6>
                                             <small class="float-right font-size-12">23 hrs ago</small>
                                             <p class="mb-0">Lorem is simply</p>
                                          </div>
                                       </div>
                                    </a> -->
                                 </div>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </div>
                  <ul class="navbar-list">
                     <li>
                        <a href="#" class="search-toggle iq-waves-effect bg-primary text-white"><img src="{{ asset(MyApp::ASSET_IMG.'user/1.jpg') }}" class="img-fluid rounded" alt="user"></a>
                        <div class="iq-sub-dropdown iq-user-dropdown">
                           <div class="iq-card shadow-none m-0">
                              <div class="iq-card-body p-0 ">
                                 <div class="bg-primary p-3">
                                    <h5 class="mb-0 text-white line-height">{{ Auth::user()->name }}</h5>
                                    <span class="text-white font-size-12">Available</span>
                                 </div>
                                 <a href="profil.html" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-primary">
                                          <i class="ri-file-user-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">My Profile</h6>
                                          <p class="mb-0 font-size-12">View personal profile details.</p>
                                       </div>
                                    </div>
                                 </a>
                                 <!-- <a href="profil-edit.html" class="iq-sub-card iq-bg-primary-success-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-success">
                                          <i class="ri-profile-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Edit Profile</h6>
                                          <p class="mb-0 font-size-12">Modify your personal details.</p>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="account-settin.html" class="iq-sub-card iq-bg-primary-danger-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-danger">
                                          <i class="ri-account-box-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Account settings</h6>
                                          <p class="mb-0 font-size-12">Manage your account parameters.</p>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="privacy-settin.html" class="iq-sub-card iq-bg-primary-secondary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-secondary">
                                          <i class="ri-lock-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Privacy Settings</h6>
                                          <p class="mb-0 font-size-12">Control your privacy parameters.</p>
                                       </div>
                                    </div>
                                 </a> -->
                                 <div class="d-inline-block w-100 text-center p-3">
                                    <a class="iq-bg-danger iq-sign-btn" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();  document.getElementById('logout-form').submit();" role="button">{{ __('Sign out') }}<i class="ri-login-box-line ml-2"></i></a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                        
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
               </nav>
            </div>
         </div>
        @endauth
         <!-- TOP Nav Bar END -->
        <?php /* ?>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <?php */ ?>

        <!-- <main class="py-4"> -->
            @yield('content')
        <!-- </main> -->

        </div>
      <!-- Wrapper END -->
      @auth
      <!-- Footer -->
      <footer class="bg-white iq-footer">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-6">
                  <ul class="list-inline mb-0">
                     <li class="list-inline-item"><a href="privacy-polic.html">Privacy Policy</a></li>
                     <li class="list-inline-item"><a href="terms-of-servic.html">Terms of Use</a></li>
                  </ul>
               </div>
               <div class="col-lg-6 text-right">
                  Copyright 2022 <a href="#">Secureism</a> All Rights Reserved.
               </div>
            </div>
         </div>
      </footer>
      <!-- Footer END -->
      @endauth
    </div>

    
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'popper.min.js') }}"></script>
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'bootstrap.min.js') }}"></script>
    <!-- Appear JavaScript -->
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'jquery.appear.js') }}"></script>
    <!-- Countdown JavaScript -->
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'countdown.min.js') }}"></script>
    <!-- Counterup JavaScript -->
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'waypoints.min.js') }}"></script>
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'jquery.counterup.min.js') }}"></script>
    <!-- Wow JavaScript -->
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'wow.min.js') }}"></script>
    <!-- Apexcharts JavaScript -->
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'apexcharts.js') }}"></script>
    <!-- Slick JavaScript -->
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'slick.min.js') }}"></script>
    <!-- Select2 JavaScript -->
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'select2.min.js') }}"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'owl.carousel.min.js') }}"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'jquery.magnific-popup.min.js') }}"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'smooth-scrollbar.js') }}"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'chart-custom.js') }}"></script>
    <!-- Custom JavaScript -->
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'custom.js') }}"></script>

</body>
</html>