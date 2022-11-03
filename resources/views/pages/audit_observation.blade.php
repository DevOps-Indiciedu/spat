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
   #summaryrow td
    {
        padding: 1px 0px !important;
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
                        <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab-1" role="tablist">
                           <li class="nav-item">
                              <a href="{{url('view_selected_req_list').'/'.Request::segment(2)}}" class="nav-link ">
                                 <h4>Evidence Tracker</h4>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="{{url('audit_observation').'/'.Request::segment(2)}}" class="nav-link active">
                                 <h4 class="text-white">Audit Observation ({{date("Y")}})</h4>
                              </a>
                           </li>
                        </ul>
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">{{ __('Audit Observation') }}</h4>
                           </div>
                        </div>
                        
                        <div class="iq-card-body">
                           <table id="example" class="table table-striped table-bordered" style="width:100%">
                              <thead>
                                    <tr style="background-color: #be1e2d;">
                                      <th width="1%">Sr#.</th>
                                      <th width="8%">Req#</th>
                                      <th width="38%">Testing Procedure</th>
                                      @if(Auth::user()->usermanagement->role_id == 2)
                                      <th width="10%">Assign To</th>
                                      @else
                                      <th width="10%">Assign To</th>
                                      @endif
                                      <th width="8%">Evidence Type</th>
                                      <th class="text-center">
                                        Summary of Assessment Findings
                                        <!-- <table width="100%">
                                            <tr class="text-center">
                                                <td bgcolor="#000" class="text-center" style="border-right: 1px solid white;margin-left:10px;color:white;">In Place</td>
                                                <td bgcolor="#000" class="text-center" style="border-right: 1px solid white;margin-left:10px;color:white;">In Place w/ CCW</td>
                                                <td bgcolor="#000" class="text-center" style="border-right: 1px solid white;margin-left:10px;color:white;">N/A</td>
                                                <td bgcolor="#000" class="text-center" style="border-right: 1px solid white;margin-left:10px;color:white;">Not Tested</td>
                                                <td bgcolor="#000" class="text-center" style="border-right: 1px solid white;margin-left:10px;color:white;">Not in Place</td>
                                            </tr>
                                        </table> -->
                                      </th>
                                    </tr>
                              </thead>
                              <tbody>
                                 @php $i = 1 @endphp
                                 @foreach($getRows as $level1)
                                 @php  $getlevel2=DB::table('req_lists')->where(array("id"=>$level1->req_id))->get()->first();@endphp
                                 <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td class="text-center" style="font-size:12px;">{{ get_reqNo(1) }}</td>
                                    <td>{{ $getlevel2->req_no }} {{ $getlevel2->description }}</td>
                                    
                                    <td class="text-center" @if($level1->description=='Not Applicable') colspan="1" @endif>
                                       @if($level1->description=='Not Applicable')
                                       <p>Not Applicable</p>
                                       @else
                                            @if(checkTaskExistToTeq($level1->ass_id,$level1->req_id,1))
                                                <b>{{ @get_user(checkTaskExistToTeq($level1->ass_id,$level1->req_id,2)->assign_to)->username }}</b>
                                            @endif
                                       @endif
                                    </td>
                                    <td class="text-center">
                                        {{ $level1->doc_type }} 
                                    </td>
                                    <td style="padding: 10px 0px 0px 0px;">
                                        @php $attachments=DB::table('observation_images')->where(array("observation_id"=>$level1->el_id))->orderBy("observation_images.obi_id","DESC")->get()->toArray(); @endphp
                                        @if(@getAuditObservationStatus($level1->el_id)->clouse_status == 1 || @getAuditObservationStatus($level1->el_id)->clouse_status == 2 || @getAuditObservationStatus($level1->el_id)->clouse_status == 4)                                        
                                            <div class="alert text-white bg-success" role="alert" style="margin-top: -10px;">
                                                <div class="iq-alert-icon">
                                                    <i class="ri-checkbox-circle-line"></i>
                                                </div>
                                                <div class="iq-alert-text"><b>{{ @auditObservationStatus(getAuditObservationStatus($level1->el_id)->clouse_status) }}</b></div>
                                            </div>
                                            <p class="ml-4">
                                                <b>Comment: </b> {{ @getAuditObservationStatus($level1->el_id)->comment }}
                                            </p>
                                        @elseif($level1->description=='Not Applicable' || @getAuditObservationStatus($level1->el_id)->clouse_status == 3)
                                            <div class="alert text-dark bg-warning" role="alert" style="margin-top: -10px;">
                                                <div class="iq-alert-icon">
                                                    <i class="ri-information-line"></i>
                                                </div>
                                                <div class="iq-alert-text"><b>{{ $level1->description }}</b></div>
                                            </div>
                                            @if(@getAuditObservationStatus($level1->el_id)->clouse_status == 3)
                                            <p class="ml-4">
                                                <b>Marked By: </b> {{ @get_user(getAuditObservationStatus($level1->el_id)->audit_by)->username }} {{ getAuditObservationStatus($level1->el_id)->created_at }}
                                            </p>
                                            @endif
                                        @else

                                        @if(@getAuditObservationStatus($level1->el_id)->clouse_status == 5)
                                            <div class="alert text-white bg-danger" role="alert" style="margin-top: -10px;">
                                                <div class="iq-alert-icon">
                                                    <i class="ri-alert-line"></i>
                                                </div>
                                                <div class="iq-alert-text"><b>{{ @auditObservationStatus(getAuditObservationStatus($level1->el_id)->clouse_status) }}</b></div>
                                            </div>
                                            <p class="ml-4">
                                                <b>Comment: </b> {{ @getAuditObservationStatus($level1->el_id)->comment }}
                                            </p>
                                        @endif
                                        <table width="100%" style="border:none;">
                                            <tr class="text-center" id="summaryrow">
                                                <td bgcolor="#000" class="text-center" style="border-right: 1px solid white;margin-left:10px;color:white;">In Place</td>
                                                <td bgcolor="#000" class="text-center" style="border-right: 1px solid white;margin-left:10px;color:white;">In Place w/ CCW</td>
                                                <td bgcolor="#000" class="text-center" style="border-right: 1px solid white;margin-left:10px;color:white;">N/A</td>
                                                <td bgcolor="#000" class="text-center" style="border-right: 1px solid white;margin-left:10px;color:white;">Not Tested</td>
                                                <td bgcolor="#000" class="text-center" style="border-right: 1px solid white;margin-left:10px;color:white;">Not in Place</td>
                                            </tr>
                                            <tr class="bg-white">
                                                <td class="text-center">
                                                    <div class="form-group">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="auditObservCheckbox1-{{ $level1->el_id }}" data-id="{{ Crypt::encrypt($level1->el_id) }}" name="auditObservCheckbox-{{ $level1->el_id }}" @if(@getAuditObservationStatus($level1->el_id)->clouse_status == 5) data-update="1" @endif value="1" class="custom-control-input auditObservationRadio">
                                                            <label class="custom-control-label" for="auditObservCheckbox1-{{ $level1->el_id }}"></label>
                                                        </div>
                                                    </div>   
                                                </td>
                                                <td class="text-center">
                                                    <div class="form-group">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="auditObservCheckbox2-{{ $level1->el_id }}" data-id="{{ Crypt::encrypt($level1->el_id) }}" name="auditObservCheckbox-{{ $level1->el_id }}" @if(@getAuditObservationStatus($level1->el_id)->clouse_status == 5) data-update="1" @endif value="2" class="custom-control-input auditObservationRadio">
                                                            <label class="custom-control-label" for="auditObservCheckbox2-{{ $level1->el_id }}"></label>
                                                        </div>
                                                    </div>   
                                                </td>
                                                <td class="text-center">
                                                    <div class="form-group">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="auditObservCheckbox3-{{ $level1->el_id }}" data-id="{{ Crypt::encrypt($level1->el_id) }}" name="auditObservCheckbox-{{ $level1->el_id }}" @if(@getAuditObservationStatus($level1->el_id)->clouse_status == 5) data-update="1" @endif value="3" class="custom-control-input auditObservationRadio">
                                                            <label class="custom-control-label" for="auditObservCheckbox3-{{ $level1->el_id }}"></label>
                                                        </div>
                                                    </div>   
                                                </td>
                                                <td class="text-center">
                                                    <div class="form-group">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="auditObservCheckbox4-{{ $level1->el_id }}" data-id="{{ Crypt::encrypt($level1->el_id) }}" name="auditObservCheckbox-{{ $level1->el_id }}" @if(@getAuditObservationStatus($level1->el_id)->clouse_status == 5) data-update="1" @endif value="4" class="custom-control-input auditObservationRadio">
                                                            <label class="custom-control-label" for="auditObservCheckbox4-{{ $level1->el_id }}"></label>
                                                        </div>
                                                    </div>   
                                                </td>
                                                <td class="text-center">
                                                    <div class="form-group">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="auditObservCheckbox5-{{ $level1->el_id }}" data-id="{{ Crypt::encrypt($level1->el_id) }}" name="auditObservCheckbox-{{ $level1->el_id }}" @if(@getAuditObservationStatus($level1->el_id)->clouse_status == 5) data-update="1" checked @endif value="5" class="custom-control-input @if(@getAuditObservationStatus($level1->el_id)->clouse_status != 5)auditObservationRadio @endif">
                                                            <label class="custom-control-label" for="auditObservCheckbox5-{{ $level1->el_id }}"></label>
                                                        </div>
                                                    </div>   
                                                </td>
                                            </tr>
                                        </table>
                                        @endif
                                        @if(count($attachments) > 0)
                                        <h6 class="m-2">Evidence File</h6>
                                        @endif
                                        @foreach($attachments as $image)
                                            @if($image->document_status == 1)
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
                                                    <hr>
                                                    <p> <b>Action: </b>{!! $image->action !!}</p>
                                                </div>
                                                @endif
                                            </div>
                                            @endif
                                        @endforeach
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
<!-- @include('pages.ajax.taskAjax') -->
@endsection