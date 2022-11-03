@extends('layouts.app')
@section('content')
<style>
   .nav-pills .nav-link.active, .nav-pills .show>.nav-link{
      background-color: #be1e2d;
   }
   .nav-link {
      display: block;
      padding: 1rem 1rem;
      border: 1px solid #be1e2d;
      box-shadow: 0px 0px 12px 5px #9b9b9b3d;
   }
</style>

      <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.bootstrap4.min.css">
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script> 

         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 col-lg-12">
                     <div class="iq-card">
                        @if(Auth::user()->usermanagement->belong_to == 2)
                        <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab-1" role="tablist">
                           <li class="nav-item">
                              <a href="{{url('view_selected_req_list').'/'.Request::segment(2)}}" class="nav-link active">
                                 <h4 class="text-white">Evidence Tracker</h4>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="{{url('audit_observation').'/'.Request::segment(2)}}" class="nav-link">
                                 <h4>Audit Observation ({{date("Y")}})</h4>
                              </a>
                           </li>
                        </ul>
                        @else
                        @endif
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">{{ __('Summary of Findings') }}</h4>
                           </div>
                        </div>
                        
                        <div class="iq-card-body">
                           <form action="{{ url('filter_record_evidence_tracker/'.Request::segment(2)) }}" method="get">
                              <div class="form-group">
                                 <label for="">Select Clouse Status</label>
                                 <select name="status" class="form-control" id="">
                                    <option value="">Select Status</option>
                                    <option value="0">Pending</option>
                                    <option value="1">Closed</option>
                                    <option value="2">Review Pending</option>
                                    <option value="3">Action Pending</option>
                                    <option value="4">Re Open</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <button type="submit" class="btn btn-primary">Filter</button>
                                 @if(Route::currentRouteName() == "filter_record_evidence_tracker")
                                 <a href="{{ url('view_selected_req_list/'.Request::segment(2)) }}" type="submit" class="btn btn-dark">Remove Filter</a>
                                 @endif
                              </div>

                           </form>
                        </div>
                        <div class="iq-card-body">
                           <table id="example" class="table table-striped table-bordered" style="width:100%">
                              <thead>
                                  <tr style="background-color: #be1e2d;">
                                      <th width="1%">Sr#.</th>
                                      <th width="8%">Req#</th>
                                      <th width="38%">Testing Procedure</th>
                                      @if(Auth::user()->usermanagement->role_id == 2)
                                      <th width="10%">Assigned To</th>
                                      @else
                                      <th width="10%">Assigned To</th>
                                      @endif
                                      <th width="8%">Evidence Type</th>
                                      <th width="40%">Evidence File</th>
                                  </tr>
                              </thead>
                              <tbody>
                                 @php $i = 1 @endphp
                                 @foreach($getRows as $level1)
                                 @php  $getlevel2=DB::table('req_lists')->where(array("id"=>$level1->req_id))->get()->first();@endphp
                                 @php $attachments=DB::table('observation_images')->where(array("observation_id"=>$level1->el_id))->orderBy("observation_images.obi_id","DESC")->get()->toArray(); @endphp
                                 <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td class="text-center" style="font-size:12px;">{{ get_reqNo(1) }}</td>
                                    <td>{{ $getlevel2->req_no }} {{ $getlevel2->description }}</td>
                                    
                                    <td class="text-center">
                                       @if($level1->description=='Not Applicable')
                                       <p>---</p>
                                       @else
                                          @if(Auth::user()->usermanagement->belong_to == 2 || Auth::user()->usermanagement->belong_to == 1 && Auth::user()->usermanagement->account_type == 7)
                                          <b>{{ @get_user(checkTaskExistToTeq($level1->ass_id,$level1->req_id,2)->assign_to)->username }}</b>
                                          @endif
                                          @if(Auth::user()->usermanagement->role_id == 2 || Auth::user()->usermanagement->account_type == 4)
                                                @if(checkTaskExistToTeq($level1->ass_id,$level1->req_id,1))
                                                   @if($level1->status != 1)
                                                   <a href="#" data-id="{{ checkTaskExistToTeq($level1->ass_id,$level1->req_id,2)->id }}" data-req-id="{{ Crypt::encrypt($level1->req_id) }}" class="edit_task p-2 text-danger" data-toggle="modal" data-target="#ObservationTaskModal">
                                                   @endif      
                                                      {{ @get_user(checkTaskExistToTeq($level1->ass_id,$level1->req_id,2)->assign_to)->username }}
                                                   @if($level1->status != 1)
                                                      <i class="fa fa-edit"></i>
                                                   </a>
                                                   @endif
                                                   <!-- <span class="badge badge-@if(checkTaskExistToTeq($level1->ass_id,$level1->req_id,2)->status == 1)primary @elseif(checkTaskExistToTeq($level1->ass_id,$level1->req_id,2)->status == 2)success @endif mb-2" style="font-size: 9px;"> -->
                                                   <!-- {!! get_taskStatus(checkTaskExistToTeq($level1->ass_id,$level1->req_id,2)->status)->title !!} -->
                                                   <!-- </span> -->
                                                @else
                                                <button class="btn btn-danger btn-sm addTask" data-project-id="{{ $level1->ass_id }}" data-req-id="{{ Crypt::encrypt($level1->req_id) }}" data-toggle="modal" data-target="#ObservationTaskModal">Assign To</button>
                                                @endif
                                             
                                          @endif
                                       @endif
                                    </td>
                                    <td class="text-center">
                                        @if($level1->description=='Not Applicable')
                                          ---
                                        @else
                                             @if(empty($level1->doc_type))
                                                @if(Auth::user()->usermanagement->role_id == 2 || Auth::user()->usermanagement->account_type == 4)
                                                    <button class="btn btn-info btn-sm "  type="button" data-toggle="modal" data-target="#doc_type_modal" onclick="set_id_doc_type({{ $level1->el_id }})">Select Type</button>
                                                @endif
                                             @else
                                            {{ $level1->doc_type }} 
                                          @endif
                                        @endif
                                    </td>
                                    <td>
                                       @if($level1->description!='Not Applicable')
                                            @php $EvidenceClass = 'margin-bottom:32px;'; @endphp
                                          <p style="display: block;{{ $EvidenceClass }}">
                                             <span class="float-right">
                                                <b class="mr-1">Status:</b>
                                                @if($level1->status == 1)
                                                   <button class="badge badge-success mt-1" style="border: #00ca00 !important;">Closed</button>
                                                </span>
                                                @elseif($level1->status == 2)
                                                <button class="badge badge-primary float-right mt-1 @if(Auth::user()->usermanagement->belong_to == 2) approveClouse @endif" data-evaluation-id="{{ Crypt::encrypt($level1->el_id) }}" style="background-color: #007bff !important;border: #007bff !important;">Review Pending </button>
                                                @elseif($level1->status == 3)
                                                <button class="badge badge-warning float-right mt-1 @if(Auth::user()->usermanagement->belong_to == 2) approveClouse @endif" data-evaluation-id="{{ Crypt::encrypt($level1->el_id) }}" style="border: #ffd400 !important;">Action Pending</button>
                                                @elseif($level1->status == 4)
                                                <button class="badge badge-info float-right mt-1 @if(Auth::user()->usermanagement->belong_to == 2) approveClouse @endif" data-evaluation-id="{{ Crypt::encrypt($level1->el_id) }}" style="border: #ffd400 !important;">Re Open</button>
                                                @else
                                                <button class="badge badge-danger float-right mt-1" style="border: #be1e2d !important;">Pending</button>
                                                @endif
                                             </span>   
                                          </p>
                                          <!-- Evidence Upload Location Admin Or Assigned User -->
                                          
                                          @if(Auth::user()->usermanagement->account_type == 4 || Auth::user()->usermanagement->belong_to == 1)
                                             @if(checkTaskExistToTeq($level1->ass_id,$level1->req_id,1) && $level1->doc_type != "")
                                                @if($level1->status != 1)
                                                @php $EvidenceClass = ''; @endphp
                                                <button class="btn btn-info btn-sm hide-w-Approved-{{ $level1->el_id }}" style="position: relative;top: -30px;" type="button" data-toggle="modal" data-target="#evidencemodal" onclick="set_id({{ $level1->el_id }})">Upload New Files</button>
                                                @endif
                                             @endif
                                          <!-- <button class="btn btn-success btn-sm auditorObservation hide-w-Approved-{{ $level1->el_id }}"  type="button" data-toggle="modal" data-target="#auditorObservation" data-id="{{ Request::segment(2) }}" data-rid="{{ $level1->req_id }}">Auditor Observation</button> -->
                                          @elseif(Auth::user()->usermanagement->role_id == 3)
                                          <!-- <button class="btn btn-info hide-w-Approved-{{ $level1->el_id }}"  type="button" data-toggle="modal" data-target="#evidencemodal" onclick="set_id({{ $level1->el_id }})">
                                          Add Observations
                                          </button> -->
                                          @endif   
                                          {{--
                                          <div class="card mt-2" id="documentsData{{ $level1->el_id }}">
                                             @foreach($attachments as $image)
                                             <div class="rowImage-{{ $image->obi_id }}">   
                                                <div class="card-header d-flex justify-content-between">
                                                   @php $explodeImgName = explode("/",$image->imagelink); @endphp
                                                   <span>  
                                                      {{ $image->file_description }}
                                                      <span class="badge badge-dark">
                                                         {{ detectFileExtension($image->imagelink) }}
                                                      </span>
                                                   </span>
                                                      @if($image->document_status == 1)
                                                      <style>
                                                         .hide-w-Approved-{{ $level1->el_id }}
                                                         {
                                                            display:none;
                                                         }
                                                      </style>
                                                      <a href="#" class="btn btn-success" style="padding:0px 5px 0px 5px;">Approved</a>
                                                      @elseif($image->document_status == 2)
                                                         <a href="#" class="btn btn-danger" style="padding:0px 5px 0px 5px;font-size:12px;">Reject</a>
                                                      @else
                                                         <a href="#" data-evaluation-id="{{ Crypt::encrypt($image->observation_id) }}" data-id="{{ Crypt::encrypt($image->obi_id) }}" class="btn btn-warning @if(Auth::user()->usermanagement->role_id == 3) @php echo 'approve_document'; @endphp @endif" style="padding:0px 5px 0px 5px;font-size:12px;">Pending</a>
                                                      @endif
                                                </div>
                                                <div class="card-body d-flex justify-content-between">
                                                   <p class="card-text"><b>Uploaded By: </b> {!! @get_user($image->added_by)->username !!}  <span>{{ $image->created_at }}</span>  </p>
                                                   <div>
                                                   <!-- <button class="btn upload"><i class="fa fa-upload"></i></button> -->
                                                   <a download href="{{ asset('public/'.$image->imagelink) }}" class="btn download"><i class="fa fa-download"></i></a>
                                                   </div>
                                                </div>
                                             </div>
                                             @endforeach  
                                          </div>
                                          --}}
                                             <div class="card" id="documentsData{{ $level1->el_id }}">
                                                <!--Attachmnet 0 Code -->
                                                @php $countval=0; 
                                                   if(!empty($attachments)):
                                                   $image=$attachments[0];
                                                @endphp
                                                <div class="rowImage-{{ $image->obi_id }}">   
                                                   @if(Auth::user()->usermanagement->belong_to == 2 && empty($image->details))
                                                      @if($level1->status != 1)
                                                         @if($image->document_status != 1)
                                                            <button class="btn btn-info btn-sm" style="position: relative;top: -30px;" type="button" data-toggle="modal" data-target="#evidencemodal_details" onclick="set_id_details({{ $image->obi_id }},{{ $image->observation_id }})">
                                                               Add Observations
                                                            </button>
                                                         @endif 
                                                      @endif 
                                                   @endif 
                                                   <div class="card-header d-flex justify-content-between">
                                                      @php $explodeImgName = explode("/",$image->imagelink); @endphp
                                                      <span >  
                                                         {{ $image->file_description }}
                                                         <span class="badge badge-dark">
                                                            {{ detectFileExtension($image->imagelink) }}
                                                         </span>
                                                      </span> 
                                                         @if($image->document_status == 1)
                                                         <style>
                                                            .hide-w-Approved-{{ $level1->el_id }}
                                                            {
                                                               display:none;
                                                            }
                                                         </style>
                                                         <a href="#" class="btn btn-success" style="padding:0px 5px 0px 5px;">Approved</a>
                                                         @elseif($image->document_status == 2)
                                                            <a href="#" class="btn btn-danger" style="padding:0px 5px 0px 5px;font-size:12px;">Reject</a>
                                                         @else
                                                            <a href="#" data-evaluation-id="{{ Crypt::encrypt($image->observation_id) }}" data-id="{{ Crypt::encrypt($image->obi_id) }}" class="btn btn-warning @if(Auth::user()->usermanagement->belong_to == 2) @php echo 'approve_document'; @endphp @endif" style="padding:0px 5px 0px 5px;font-size:12px;">Pending</a>
                                                         @endif
                                                   </div>
                                                   <div class="card-body d-flex justify-content-between">
                                                      <p class="card-text"><b>Uploaded By: </b> {!! @get_user($image->added_by)->username !!}  <span>{{ $image->created_at }}</span>  </p>
                                                      <div>
                                                         <!-- <button class="btn upload"><i class="fa fa-upload"></i></button> -->
                                                         <a download href="{{ asset('public/'.$image->imagelink) }}" class="btn download"><i class="fa fa-download"></i></a>
                                                      </div>
                                                   </div>
                                                   @if($image->details != "" || $image->action != "")
                                                   <div class="card-body">
                                                      <p class="card-text"><b>Observation Added By: </b> {!! @get_user($image->observation_by)->username !!}  <span>{{ $image->observation_date }}</span>  </p>
                                                      <p> <b>Observation: </b>{!! $image->details !!}</p>
                                                      <p> <b>Action: </b>{!! $image->action !!}</p>
                                                   </div>
                                                   @endif
                                                </div>
                                                @endif
                                                 <div id="collapse-{{ $level1->req_id }}" class="collapse" data-parent="#accordion{{ $level1->req_id }}" aria-labelledby="heading-{{ $level1->req_id }}">
                                               @php unset($attachments[0]); @endphp
                                                @foreach($attachments as $image)
                                             
                                                <div class="rowImage-{{ $image->obi_id }}">   
                                                      @if(Auth::user()->usermanagement->belong_to == 2 && empty($image->details))
                                                         @if($level1->status != 1)
                                                            @if($image->document_status != 1)
                                                               <button class="btn btn-info btn-sm"  type="button" data-toggle="modal" data-target="#evidencemodal_details" onclick="set_id_details({{ $image->obi_id }},{{ $image->observation_id }})">
                                                                  Add Observations
                                                               </button>
                                                            @endif 
                                                         @endif 
                                                      @endif
                                                      <div class="card-header d-flex justify-content-between">
                                                         @php $explodeImgName = explode("/",$image->imagelink); @endphp
                                                      <span>  
                                                            {{ $image->file_description }}
                                                            <span class="badge badge-dark">
                                                               {{ detectFileExtension($image->imagelink) }}
                                                            </span>
                                                         </span> 
                                                         
                                                            @if($image->document_status == 1)
                                                            <style>
                                                               .hide-w-Approved-{{ $level1->el_id }}
                                                               {
                                                                  display:none;
                                                               }
                                                            </style>
                                                            <a href="#" class="btn btn-success" style="padding:0px 5px 0px 5px;">Approved</a>
                                                            @elseif($image->document_status == 2)
                                                               <a href="#" class="btn btn-danger" style="padding:0px 5px 0px 5px;font-size:12px;">Reject</a>
                                                            @else
                                                               <a href="#" data-evaluation-id="{{ Crypt::encrypt($image->observation_id) }}" data-id="{{ Crypt::encrypt($image->obi_id) }}" class="btn btn-warning @if(Auth::user()->usermanagement->role_id == 3) @php echo 'approve_document'; @endphp @endif" style="padding:0px 5px 0px 5px;font-size:12px;">Pending</a>
                                                            @endif
                                                      </div>
                                                      <div class="card-body d-flex justify-content-between">
                                                      
                                                         <p class="card-text"><b>Uploaded By: </b> {!! @get_user($image->added_by)->username !!}  <span>{{ $image->created_at }}</span>  </p>
                                                         <div>
                                                         <!-- <button class="btn upload"><i class="fa fa-upload"></i></button> -->
                                                         <a download href="{{ asset('public/'.$image->imagelink) }}" class="btn download"><i class="fa fa-download"></i></a>
                                                         </div>
                                                      </div>
                                                      @if($image->details != "" || $image->action != "")
                                                      <div class="card-body">
                                                         <p class="card-text"><b>Observation Added By: </b> {!! @get_user($image->observation_by)->username !!}  <span>{{ $image->observation_date }}</span>  </p>
                                                         <p> <b>Observation: </b>{!! $image->details !!}</p>
                                                         <p> <b>Action: </b>{!! $image->action !!}</p>
                                                      </div>
                                                      @endif
                                                   </div>
                                                  
                                                
                                               
                                                  
                                                <!-- Collapse History -->
                                                @php $countval++; @endphp
                                                @endforeach  
                                                </div>
                                             @if(count($attachments) > 0)
                                                <div onclick="viewHistory(this)" data-collapse-id="{{ $level1->req_id }}" style="width:100%;cursor:pointer;padding: 5px;" align="right">
                                                   <b>View History</b>
                                                   <i class="font-weight-bold fa fa-angle-down"></i>
                                                </div>
                                             @endif
                                             </div>
                                       
                                       @else
                                          <p class="text-center">Not Applicable</p>
                                       @endif
                                    </td>
                                 </tr>
                                 @endforeach
                         
                              </tbody>
                          </table>

                           <!-- The Modal -->
                          
                        </div>
                     </div>
                  </div>     
               </div>
            </div>
         </div>

@include('pages.ajax.reqAjax')
@include('pages.ajax.taskAjax')
@endsection