<!-- Page Content  -->
@extends('layouts.app')

@section('content')
<!-- Page Content  -->
<div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-2">
                     <div class="iq-right-fixed rounded iq-card iq-card iq-card-block iq-card-stretch iq-card-height">
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
                        <div class="iq-card-body">
                           <ul class="iq-timeline">
                              <li>
                                 <div class="timeline-dots" id="timeline-dots0"></div>
                                 <a href="{{ route('req1') }}"><h6 class="float-left mb-1">Requirement 1</h6></a>
                                 <div class="d-inline-block w-100">
                                 </div>
                              </li>
                              <li>
                                 <div class="timeline-dots activereq" id="timeline-dots1"></div>
                                 <a href="{{ route('req2') }}"><h6 class="float-left mb-1">Requirement 2</h6></a>
                                 <div class="d-inline-block w-100">
                                 </div>
                              </li>
                              <li>
                                 <div class="timeline-dots" id="timeline-dots2"></div>
                                 <a href="{{ route('req3') }}"><h6 class="float-left mb-1">Requirement 3</h6></a>
                                 <div class="d-inline-block w-100">
                                 </div>
                              </li>
                              <li>
                                 <div class="timeline-dots" id="timeline-dots3"></div>
                                 <h6 class="float-left mb-1">Requirement 4</h6>
                                 <div class="d-inline-block w-100">
                                 </div>
                              </li>
                              <li>
                                 <div class="timeline-dots" id="timeline-dots4"></div>
                                 <h6 class="float-left mb-1">Requirement 5</h6>
                                 <div class="d-inline-block w-100">
                                 </div>
                              </li>
                              <li>
                                 <div class="timeline-dots" id="timeline-dots5"></div>
                                 <h6 class="float-left mb-1">Requirement 6</h6>
                                 <div class="d-inline-block w-100">
                                 </div>
                              </li>
                              <li>
                                 <div class="timeline-dots" id="timeline-dots6"></div>
                                 <h6 class="float-left mb-1">Requirement 7</h6>
                                 <div class="d-inline-block w-100">
                                 </div>
                              </li>
                              <li>
                                 <div class="timeline-dots" id="timeline-dots7"></div>
                                 <h6 class="float-left mb-1">Requirement 8</h6>
                                 <div class="d-inline-block w-100">
                                 </div>
                              </li>
                              <li>
                                 <div class="timeline-dots" id="timeline-dots8"></div>
                                 <h6 class="float-left mb-1">Requirement 9</h6>
                                 <div class="d-inline-block w-100">
                                 </div>
                              </li>
                              <li>
                                 <div class="timeline-dots" id="timeline-dots9"></div>
                                 <h6 class="float-left mb-1">Requirement 10</h6>
                                 <div class="d-inline-block w-100">
                                 </div>
                              </li>
                              <li>
                                 <div class="timeline-dots" id="timeline-dots10"></div>
                                 <h6 class="float-left mb-1">Requirement 11</h6>
                                 <div class="d-inline-block w-100">
                                 </div>
                              </li>
                              <li>
                                 <div class="timeline-dots" id="timeline-dots11"></div>
                                 <h6 class="float-left mb-1">Requirement 12</h6>
                                 <div class="d-inline-block w-100">
                                 </div>
                              </li>
                              <!-- <li>
                                 <div class="timeline-dots" id="timeline-dots1"></div>
                                 <h6 class="float-left mb-1">Mega event</h6>
                                 <small class="float-right mt-1">15 November 2019</small>
                                 <div class="d-inline-block w-100">
                                    <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                                 </div>
                              </li> -->
                           </ul>
                        </div>
                     
                     </div>
                  </div>
                  <div class="col-sm-12 col-lg-10">
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