{{--
@extends('layouts.app')
@section('content') 
--}}
<!-- <div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">{{ __('Action Tracker') }}</h4>
                        </div>
                    </div>
                    <div class="iq-card-body"> -->
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr style="background-color: #be1e2d;">
                                    <th width="1%">Sr#.</th>
                                    <th width="2%">Req#</th>
                                    <th width="30%">Observation</th>
                                    <th width="30%">Action Point</th>
                                    <th width="5%">Severity</th>
                                    <th width="10%">Assign Users</th>
                                    <th width="10%">Re Upload</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach($action_tracker as $data)
                                    @if($data->severity != "")
                                        <tr>
                                            <td class="text-center">{{ $i++ }}</td>
                                            <td class="text-center">{{ get_reqNo($data->req_id) }}</td>
                                            <td>{!! $data->description !!}</td>
                                            <td>{!! $data->action !!}</td>
                                            <td class="text-center">{!! priority($data->severity) !!}</td>
                                            <td class="text-center">
                                                <button class="btn btn-danger btn-sm addTask" data-project-id="{{ $data->ass_id }}" data-req-id="{{ Crypt::encrypt($data->req_id) }}" data-toggle="modal" data-target="#ObservationTaskModal">Add Task</button>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-info btn-sm hide-w-Approved-{{ $data->el_id }}" type="button" data-toggle="modal" data-target="#evidencemodal" onclick="set_id({{ $data->el_id }},'reUpload')">Re-Upload</button>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-primary btn-sm viewTaskDetails" style="background-color: #3f51b5;border-color: #3f51b5;" data-project-id="{{ Crypt::encrypt($data->ass_id) }}" data-req-id="{{ Crypt::encrypt($data->req_id) }}" data-toggle="modal" data-target="#taskDetails">Task Details</button>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                        
                            </tbody>
                        </table>
                    <!-- </div>
                </div>
            </div>     
        </div>
    </div>
</div> -->
@include('pages.ajax.taskAjax')
{{-- @endsection --}}