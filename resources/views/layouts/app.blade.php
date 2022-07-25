<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SPAT') }}</title>
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
                           <!-- <i class="ri-arrow-right-s-line iq-arrow-right"></i> -->
                        </a>
                        <!-- <ul id="dashboard" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="index.html">Dashboard 1</a></li>
                           <li><a href="dashboard1.html">Dashboard 2</a></li>
                           <li><a href="analytics.html">Analytics</a></li>
                           <li><a href="tracking.html">Tracking</a></li>
                           <li><a href="web-analytics.html">Web Analytics</a></li>
                           <li><a href="patient-dashboard.html">Patient</a></li>
                           <li><a href="ticket-booking.html">Ticket Booking</a></li>
                           <li class="active"><a href="sales-dashboard.html">Sales Dashboard</a></li>
                           <li><a href="course-dashboard.html">Course Dashboard</a></li>
                           <li><a href="finance-dashboard.html">Finance Dashboard</a></li>
                           <li><a href="employee-dashboard.html">Employee Dashboard</a></li>
                        </ul> -->
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
                                <a href="{{ route('company') }}">
                                    <span>User Management</span>
                                </a>
                           </li>
                           <li>
                                <a href="{{ route('company') }}">
                                    <span>Task Management</span>
                                </a>
                           </li>
                           <!-- <li><a href="chat.html">Chat</a></li>
                           <li><a href="todo.html">Todo</a></li>
                           <li><a href="calendar.html">Calendar</a></li>
                           <li>
                              <a href="#user-info" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><span>User</span>
                                 <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                              </a>
                               <ul id="user-info" class="iq-submenu iq-submenu-data collapse">
                                 <li><a href="profile.html">User Profile</a></li>
                                 <li><a href="profile-edit.html">User Edit</a></li>
                                 <li><a href="add-user.html">User Add</a></li>
                                 <li><a href="user-list.html">User List</a></li>
                              </ul>
                           </li> -->
                        </ul>
                     </li>
                     <li>
                        <a href="{{ route('view_requirements') }}" class="iq-waves-effect collapsed"><i class="ri-record-circle-line"></i>
                        <span>PCI DSS Standard</span></a>
                        <!-- <ul id="dashboard" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="index.html">Dashboard 1</a></li>
                           <li><a href="dashboard1.html">Dashboard 2</a></li>
                           <li><a href="analytics.html">Analytics</a></li>
                           <li><a href="tracking.html">Tracking</a></li>
                           <li><a href="web-analytics.html">Web Analytics</a></li>
                           <li><a href="patient-dashboard.html">Patient</a></li>
                           <li><a href="ticket-booking.html">Ticket Booking</a></li>
                           <li class="active"><a href="sales-dashboard.html">Sales Dashboard</a></li>
                           <li><a href="course-dashboard.html">Course Dashboard</a></li>
                           <li><a href="finance-dashboard.html">Finance Dashboard</a></li>
                           <li><a href="employee-dashboard.html">Employee Dashboard</a></li>
                        </ul> -->
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
                     <!-- <li>
                        <a href="#ui-elements" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-pencil-ruler-line"></i><span>UI Elements</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="ui-elements" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle" style="height: 300px; overflow-y: scroll;">
                           <li><a href="ui-colors.html">colors</a></li>
                           <li><a href="ui-typography.html">Typography</a></li>
                           <li><a href="ui-alerts.html">Alerts</a></li>
                           <li><a href="ui-badges.html">Badges</a></li>
                           <li><a href="ui-breadcrumb.html">Breadcrumb</a></li>
                           <li><a href="ui-buttons.html">Buttons</a></li>
                           <li><a href="ui-cards.html">Cards</a></li>
                           <li><a href="ui-carousel.html">Carousel</a></li>
                           <li><a href="ui-embed-video.html">Video</a></li>
                           <li><a href="ui-grid.html">Grid</a></li>
                           <li><a href="ui-images.html">Images</a></li>
                           <li><a href="ui-list-group.html">list Group</a></li>
                           <li><a href="ui-media-object.html">Media</a></li>
                           <li><a href="ui-modal.html">Modal</a></li>
                           <li><a href="ui-notifications.html">Notifications</a></li>
                           <li><a href="ui-pagination.html">Pagination</a></li>
                           <li><a href="ui-popovers.html">Popovers</a></li>
                           <li><a href="ui-progressbars.html">Progressbars</a></li>
                           <li><a href="ui-tabs.html">Tabs</a></li>
                           <li><a href="ui-tooltips.html">Tooltips</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#forms" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-profile-line"></i><span>Forms</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="forms" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="form-layout.html">Form Elements</a></li>
                           <li><a href="form-validation.html">Form Validation</a></li>
                           <li><a href="form-switch.html">Form Switch</a></li>
                           <li><a href="form-chechbox.html">Form Checkbox</a></li>
                           <li><a href="form-radio.html">Form Radio</a></li>
                           <li>
                              <a href="#forms-wizard" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><span>Forms Wizard</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                              <ul id="forms-wizard" class="iq-submenu collapse iq-submenu-data">
                                 <li><a href="form-wizard.html">Simple Wizard</a></li>
                                 <li><a href="form-wizard-validate.html">Validate Wizard</a></li>
                                 <li><a href="form-wizard-vertical.html">Vertical Wizard</a></li>
                              </ul>
                           </li>
                            <li>
                              <a href="#tables" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><span>Table</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                              <ul id="tables" class="iq-submenu collapse iq-submenu-data">
                                 <li><a href="tables-basic.html">Basic Tables</a></li>
                                 <li><a href="data-table.html">Data Table</a></li>
                                 <li><a href="table-editable.html">Editable Table</a></li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <li>
                        <a href="#Pages" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-record-circle-line"></i><span>Pages</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="Pages" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li>
                              <a href="#charts" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><span>Charts</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                              <ul id="charts" class="iq-submenu iq-submenu-data collapse">
                                 <li><a href="chart-morris.html">Morris Chart</a></li>
                                 <li><a href="chart-high.html">High Charts</a></li>
                                 <li><a href="chart-am.html">Am Charts</a></li>
                                 <li><a href="chart-apex.html">Apex Chart</a></li>
                              </ul>
                           </li>
                           <li>
                              <a href="#icons" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><span>Icons</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                              <ul id="icons" class="iq-submenu iq-submenu-data collapse">
                                 <li><a href="icon-dripicons.html">Dripicons</a></li>
                                 <li><a href="icon-fontawesome-5.html">Font Awesome 5</a></li>
                                 <li><a href="icon-lineawesome.html">line Awesome</a></li>
                                 <li><a href="icon-remixicon.html">Remixicon</a></li>
                                 <li><a href="icon-unicons.html">unicons</a></li>
                              </ul>
                           </li>
                           <li>
                              <a href="#authentication" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><span>Authentication</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                              <ul id="authentication" class="iq-submenu iq-submenu-data collapse">
                                 <li><a href="sign-in.html">Login</a></li>
                                 <li><a href="sign-up.html">Register</a></li>
                                 <li><a href="pages-recoverpw.html">Recover Password</a></li>
                                 <li><a href="pages-confirm-mail.html">Confirm Mail</a></li>
                                 <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                              </ul>
                           </li>
                           <li>
                              <a href="#map" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><span>Maps</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                              <ul id="map" class="iq-submenu iq-submenu-data collapse">
                                 <li><a href="pages-map.html">Google Map</a></li>
                                 <li><a href="#">Vector Map</a></li>
                              </ul>
                           </li>
                           <li>
                              <a href="#ecommerce" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><span>eCommerce</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                              <ul id="ecommerce" class="iq-submenu iq-submenu-data collapse" data-parent="#iq-sidebar-toggle">
                                 <li><a href="product.html">Product</a></li>
                                 <li><a href="itemdetails.html">Item Details</a></li>
                                 <li><a href="checkout.html">Checkout</a></li>
                              </ul>
                           </li>
                           <li>
                              <a href="#extra-pages" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><span>Extra Pages</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                              <ul id="extra-pages" class="iq-submenu iq-submenu-data collapse" data-parent="#iq-sidebar-toggle">
                                 <li><a href="pages-timeline.html">Timeline</a></li>
                                 <li><a href="pages-invoice.html">Invoice</a></li>
                                 <li><a href="blank-page.html">Blank Page</a></li>
                                 <li><a href="pages-error.html">Error 404</a></li>
                                 <li><a href="pages-error-500.html">Error 500</a></li>
                                 <li><a href="pages-pricing.html">Pricing</a></li>
                                 <li><a href="pages-pricing-one.html">Pricing 1</a></li>
                                 <li><a href="pages-maintenance.html">Maintenance</a></li>
                                 <li><a href="pages-comingsoon.html">Coming Soon</a></li>
                                 <li><a href="pages-faq.html">Faq</a></li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <li>
                        <a href="#menu-design" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-menu-3-line"></i><span>Menu Design</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="menu-design" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="sales-dashboard.html">Horizontal menu</a></li>
                           <li><a href="employee-dashboard.html">Horizontal Top Menu</a></li>
                           <li><a href="course-dashboard.html">Two Sidebar</a></li>
                           <li><a href="finance-dashboard.html">Vertical block menu</a></li>
                        </ul>
                     </li> -->
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
                        <li class="nav-item">
                           <a class="search-toggle iq-waves-effect" href="#"><i class="ri-search-line"></i></a>
                           <form action="#" class="search-box">
                              <input type="text" class="text search-input" placeholder="Type here to search..." />
                           </form>
                        </li>
                        <li class="nav-item dropdown">
                           <a href="#" class="search-toggle iq-waves-effect">
                              <i class="ri-mail-line"></i>
                              <span class="badge badge-pill badge-primary badge-up count-mail">3</span>
                           </a>
                           <div class="iq-sub-dropdown">
                              <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3">
                                       <h5 class="mb-0 text-white">All Messages<small class="badge  badge-light float-right pt-1">5</small></h5>
                                    </div>
                                    <a href="#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="{{ asset(MyApp::ASSET_IMG.'user/01.jpg') }}" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Nik Emma Watson</h6>
                                             <small class="float-left font-size-12">13 Jun</small>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="images/user/02.jpg" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Lorem Ipsum Watson</h6>
                                             <small class="float-left font-size-12">20 Apr</small>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="images/user/03.jpg" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Why do we use it?</h6>
                                             <small class="float-left font-size-12">30 Jun</small>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="images/user/04.jpg" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Variations Passages</h6>
                                             <small class="float-left font-size-12">12 Sep</small>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="images/user/05.jpg" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Lorem Ipsum generators</h6>
                                             <small class="float-left font-size-12">5 Dec</small>
                                          </div>
                                       </div>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </li>
                        <li class="nav-item">
                           <a href="#" class="iq-waves-effect"><i class="ri-shopping-cart-2-line"></i></a>
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
                                       <h5 class="mb-0 text-white">All Notifications<small class="badge  badge-light float-right pt-1">4</small></h5>
                                    </div>
                                    <a href="#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">New Order Recieved</h6>
                                             <small class="float-right font-size-12">23 hrs ago</small>
                                             <p class="mb-0">Lorem is simply</p>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="images/user/01.jpg" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Emma Watson Nik</h6>
                                             <small class="float-right font-size-12">Just Now</small>
                                             <p class="mb-0">95 MB</p>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="images/user/02.jpg" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">New customer is join</h6>
                                             <small class="float-right font-size-12">5 days ago</small>
                                             <p class="mb-0">Jond Nik</p>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40" src="images/small/jpg.svg" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Updates Available</h6>
                                             <small class="float-right font-size-12">Just Now</small>
                                             <p class="mb-0">120 MB</p>
                                          </div>
                                       </div>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </li>
                        <li class="nav-item iq-full-screen"><a href="#" class="iq-waves-effect" id="btnFullscreen"><i class="ri-fullscreen-line"></i></a></li>
                     </ul>
                  </div>
                  <ul class="navbar-list">
                     <li>
                        <a href="#" class="search-toggle iq-waves-effect bg-primary text-white"><img src="{{ asset(MyApp::ASSET_IMG.'user/1.jpg') }}" class="img-fluid rounded" alt="user"></a>
                        <div class="iq-sub-dropdown iq-user-dropdown">
                           <div class="iq-card shadow-none m-0">
                              <div class="iq-card-body p-0 ">
                                 <div class="bg-primary p-3">
                                    <h5 class="mb-0 text-white line-height">Hello Nik jone</h5>
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
                                 <a href="profil-edit.html" class="iq-sub-card iq-bg-primary-success-hover">
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
                                 </a>
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

        <main class="py-4">
            @yield('content')
        </main>

        </div>
      <!-- Wrapper END -->
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