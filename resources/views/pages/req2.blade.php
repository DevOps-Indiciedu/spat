
<!-- Page Content  -->
@extends('layouts.app')
<head>
    <style>
        #accordion-1 table, th,td {
          width:0px;
        }
        .navbar-list li img{
            margin-top: 40% !important;
         }
    </style>
</head>
@section('content')
<!-- Page Content  -->
<div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="iq-right-fixed rounded iq-card iq-card iq-card-block iq-card-stretch iq-card-height" style="height:250px;">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Activity timeline</h4>
                           </div>
                           <!-- <div class="iq-card-header-toolbar d-flex align-items-center">
                              <div class="dropdown">
                                 <span class="dropdown-toggle text-primary" id="dropdownMenuButton4" data-toggle="dropdown">
                                 View All
                                 </span>
                                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                    <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                    <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                    <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                    <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                 </div>
                              </div>
                           </div> -->
                        </div>
                        <div class="iq-card-body" style="box-sizing:border-box;">
                          
                           <div class="container">
                              <div class="row">
                                 <ul class="breadcrumb">
                                    <li class="completed"><a href="{{ url('req1') }}" data-toggle="popover-hover" title="Requirement 1" data-content="Install and maintain a firewall configuration to protect cardholder data">Req # 1</a></li>
                                    <li class="active"><a href="{{ url('req2') }}" data-toggle="popover-hover" title="Requirement 2" data-content="Do not use vendor-supplied defaults for system passwords and other security parameters">Req # 2</a></li>
                                    <li><a href="{{ url('req3') }}" data-toggle="popover-hover" title="Requirement 3" data-content="Protect stored cardholder data">Req # 3</a></li>
                                    <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 4" data-content="Encrypt transmission of cardholder data across open, public networks">Req # 4</a></li>
                                    <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 5" data-content="Protect all systems against malware and regularly update anti-virus software or programs">Req # 5</a></li>
                                    <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 6" data-content="Develop and maintain secure systems and applications">Req # 6</a></li>
                                    <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 7" data-content="Restrict access to cardholder data by business need to know">Req # 7</a></li>
                                    <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 8" data-content="Identify and authenticate access to system components">Req # 8</a></li>
                                    <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 9" data-content="Restrict physical access to cardholder data">Req # 9</a></li>
                                    <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 10" data-content="Track and monitor all access to network resources and cardholder data">Req # 10</a></li>
                                    <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 11" data-content="Regularly test security systems and processes">Req # 11</a></li>
                                    <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 12" data-content="Maintain a policy that addresses information security for all personnel">Req # 12</a></li>
                                 </ul>
                              </div>
                           </div>
                           <div class="container">
                              <div class="row" style="background-color: #f3f3f3; margin-top: 20px;">
                                 <h6 style="padding: 10px;">Requirement 2 : <span>Do not use vendor-supplied defaults for system passwords and other security parameters </span></h6>
                              </div>
                           </div>
                        </div>
                     
                     </div>
                  </div>
                  <div class="col-sm-12 col-lg-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Build and Maintain a Secure Network and Systems</h4>
                           </div>
                        </div>
                        <div id="accordion">
                              <div class="card">
                                <div class="card-header" id="heading-1">
                                  <h5 class="mb-0">
                                    <a role="button" id="req1" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                       Requirement 2 : 	  Do not use vendor-supplied defaults for system passwords and other security parameters
                                    </a>
                                  </h5>
                                </div>
                                
                              </div>
                              <!-- <div class="card">
                                <div class="card-header" id="heading-2">
                                  <h5 class="mb-0">
                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                      Item 2
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapse-2" class="collapse" data-parent="#accordion" aria-labelledby="heading-2">
                                  <div class="card-body">
                                    Text 2
                                  </div>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-header" id="heading-3">
                                  <h5 class="mb-0">
                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                      Item 3
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapse-3" class="collapse" data-parent="#accordion" aria-labelledby="heading-3">
                                  <div class="card-body">
                                    Text 3
                                  </div>
                                </div>
                              </div> -->
                            </div>
                        
                     </div>
                  </div>     
               </div>
            </div>
         </div>
@endsection