@extends('layouts.app')

@section('content')
<style>
    .btn-primary.disabled, .btn-primary:disabled {
        color: #fff;
        background-color: #dc3545 !important;
        border-color: #dc3545 !important;
    }
</style>
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">{{ __('Project Planning') }}</h4>
                        </div>
                        <button type="button" class="btn btn-danger" onclick="FormClear('addProjectTask')"  data-toggle="modal" data-target="#AddTaskProjectPlanning">
                            {{ __('Add Task') }}
                        </button>
                    </div>
                    <div class="iq-card-body">
                        <!-- <form id="save_planning" method="POST"> -->
                            @csrf
                            <input type="hidden" name="projectId" value="{{ Request::segment(2) }}">
                            <table id="datatable" class="table table-hover table-bordered" >
                                <thead>
                                    <tr>   
                                        <!-- <th class="text-dark">{{ __('') }}</th> -->
                                        <th class="text-dark">{{ __('#') }}</th>
                                        <th class="text-dark">{{ __('Template') }}</th>
                                        <th class="text-dark">{{ __('Start Date') }}</th>
                                        <th class="text-dark">{{ __('End Date') }}</th>
                                        <th class="text-dark">{{ __('User Location') }}</th>
                                        <th class="text-dark">{{ __('Responsible User') }}</th>
                                        <th class="text-dark">{{ __('Status') }}</th>
                                        <th class="text-dark">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @php $i = 1 @endphp
                                        @if(isset($saved_templates))    
                                            @foreach ($saved_templates as $data)
                                                <tr id="row-{{ $data->id }}">
                                                    <!-- <td class="text-center"></td> -->
                                                    <td class="text-center">{{ $i++ }}</td>
                                                    <td>{{ $data->template_name }}</td>
                                                    <td class="text-center">@if(!is_null($data->start_date)){{ DMY($data->start_date) }} @endif</td>
                                                    <td class="text-center">@if(!is_null($data->end_date)) {{ DMY($data->end_date) }} @endif</td>
                                                    <td class="text-center"> {!! @get_location(get_user($data->responsible_user)->location_id)->name !!} </td>
                                                    <td class="text-center">{!! @get_user($data->responsible_user)->username !!}</td>
                                                    <td class="text-center">
                                                        @if($data->status == 0) 
                                                            <span class="badge badge-warning task_status" data-id="{{ Crypt::encrypt($data->id) }}" data-status="{{ $data->status }}" data-toggle="modal" data-target="#taskStatusUpdate">Pending</span> 
                                                        @elseif($data->status == 1) 
                                                            <span class="badge badge-primary task_status" data-id="{{ Crypt::encrypt($data->id) }}" data-status="{{ $data->status }}" data-toggle="modal" data-target="#taskStatusUpdate" style="background: #0084ff !important;">In Progress</span>
                                                        @elseif($data->status == 2) 
                                                            <span class="badge badge-success">Completed</span>
                                                        @else   
                                                            <span class="badge badge-danger">Not Assigned</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-dark btn-sm assignTask" data-id="{{ $data->id }}" data-toggle="modal" data-target="#AddTaskProjectPlanning" style="border:1px solid black;">Edit</button>
                                                        <button type="button" class="btn btn-danger btn-sm taskDelete" data-id="{{ $data->id }}">Delete</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                            {{--
                                            @foreach ($templates as $data)
                                                @php $check = 0; @endphp
                                                @if(isset($saved_templates))    
                                                    @foreach ($saved_templates as $sv_data)
                                                        @if($sv_data->template_name == $data->template_name)
                                                            @php $check = 1; @endphp 
                                                        @endif
                                                    @endforeach
                                                @endif  
                                                @if($check == 0)  
                                                <tr>
                                                    <td class="text-center">
                                                        <input type="checkbox" name="templates[]" value="{{ $data->template_name }}">
                                                    </td>
                                                    <td class="text-center">{{ $i++ }}</td>
                                                    <td colspan="7">{{ $data->template_name }}</td>
                                                </tr>
                                                @endif
                                            @endforeach
                                            <tr>
                                                <td colspan="9">
                                                    <button type="submit" class="btn btn-primary" name="savePlanning" id="savePlanning" disabled>Submit</button>
                                                    <button class="btn btn-warning" onclick="location.reload()">Clear</button>
                                                </td>
                                            </tr>
                                            --}}
                                </tbody>
                            </table>
                        <!-- </form> -->
                    </div>
                </div>

               {{--
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between" data-toggle="collapse" href="#projectPlan">
                        <div class="iq-header-title">
                            <h4 class="card-title">{{ __('Project Plan Templates') }}
                                <i class="fa fa-arrow-down"></i>
                            </h4>
                        </div>
                    </div>
                    <div id="projectPlan" class="panel-collapse collapse">
                        <div class="iq-card-body">
                            <form id="save_planning" method="POST">
                                @csrf
                                <input type="hidden" name="projectId" value="{{ Request::segment(2) }}">
                                <table id="datatable" class="table table-hover table-bordered" >
                                    <thead>
                                        <tr>
                                            @if(!isset($saved_templates)) 
                                                <th class="text-dark"></th>
                                            @endif    
                                            <th class="text-dark">{{ __('') }}</th>
                                            <th class="text-dark">{{ __('#') }}</th>
                                            <th class="text-dark">{{ __('Template') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @php $i = 1 @endphp
                                                @foreach ($templates as $data)
                                                    <tr>
                                                        <td class="text-center">
                                                        @php $check = 0; @endphp
                                                        @if(isset($saved_templates))    
                                                            @foreach ($saved_templates as $sv_data)
                                                                @if($sv_data->template_name == $data->template_name)
                                                                    @php $check = 1; @endphp 
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                            @if($check == 0)
                                                                <input type="checkbox" name="templates[]" value="{{ $data->template_name }}">
                                                            @elseif($check == 1)
                                                                Added
                                                            @endif
                                                        </td>
                                                        <td class="text-center">{{ $i++ }}</td>
                                                        <td>{{ $data->template_name }}</td>
                                                    </tr>
                                                @endforeach
                                            
                                            <tr>
                                                <td colspan="9">
                                                    <button type="submit" class="btn btn-primary" name="savePlanning" id="savePlanning" disabled>Submit</button>
                                                    <button class="btn btn-warning" onclick="location.reload()">Clear</button>
                                                </td>
                                            </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                --}}
            </div>
        </div>
    </div>
</div>

@include('pages.ajax.projectAjax')

@endsection