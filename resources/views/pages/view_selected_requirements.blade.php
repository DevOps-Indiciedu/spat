@extends('layouts.app')

@section('content')
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.bootstrap4.min.css"> -->

      <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.bootstrap4.min.css">
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script> 

         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 col-lg-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">{{ __('Summary of Findings') }}</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <table id="example" class="table table-striped table-bordered" style="width:100%">
                              <thead>
                                  <tr style="background-color: #be1e2d;">
                                      <th width="1%">Sr#.</th>
                                      <th width="8%">Req#</th>
                                      <th width="38%">Testing Procedure</th>
                                      <th width="5%">Status</th>
                                      <th width="8%">Evidence Type</th>
                                      <th width="40%">Evidence File</th>
                                  </tr>
                              </thead>
                              <tbody>
                                 @php $i = 1 @endphp
                                 @foreach($getRows as $level1)
                                 @php  $getlevel2=DB::table('req_lists')->where(array("id"=>$level1->req_id))->get()->first();@endphp
                                 @php $attachments=DB::table('observation_images')->where(array("observation_id"=>$level1->el_id))->get()->toArray(); @endphp
                                 <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td class="text-center" style="font-size:12px;">{{ get_reqNo(1) }}</td>
                                    <td>{{ $getlevel2->req_no }} {{ $getlevel2->description }}</td>
                                    <td class="text-center" @if($level1->description=='Not Applicable') colspan="3" @endif>
                                       @if($level1->description=='Not Applicable')
                                       <p>Not Applicable</p>
                                       @else
                                          @if($level1->status == 1)
                                          <button class="btn btn-success">Closed</button>
                                          @else
                                          <button class="btn btn-danger">Pending</button>
                                          @endif
                                       @endif
                                    </td>
                                    <td class="text-center">
                                       @if($level1->description=='Not Applicable')
                                       @else
                                       Document
                                       @endif
                                    </td>
                                    <td>
                                       @if($level1->description!='Not Applicable')
                                          
                                          @if(Auth::user()->usermanagement->role_id == 2)
                                          <button class="btn btn-info hide-w-Approved-{{ $level1->el_id }}"  type="button" data-toggle="modal" data-target="#evidencemodal" onclick="set_id({{ $level1->el_id }})">Upload New Files</button>
                                          @elseif(Auth::user()->usermanagement->role_id == 3)
                                          <button class="btn btn-info hide-w-Approved-{{ $level1->el_id }}"  type="button" data-toggle="modal" data-target="#evidencemodal" onclick="set_id({{ $level1->el_id }})">
                                          Add Observations
                                          </button>
                                          @endif   
                                             <div class="card mt-2" id="documentsData{{ $level1->el_id }}">
                                                @foreach($attachments as $image)
                                                <div class="rowImage-{{ $image->obi_id }}">   
                                                   <div class="card-header d-flex justify-content-between">
                                                      @php $explodeImgName = explode("/",$image->imagelink); @endphp
                                                      {{ end($explodeImgName) }}
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

@endsection