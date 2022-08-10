@extends('layouts.app')

@section('content')
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">{{ __('Projects') }}</h4>
                    </div>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenteredScrollable">
                    {{ __('Add Project') }}
                    </button>
                </div>
                <div class="iq-card-body">
                    <table id="datatable" class="table table-bordered table-hover" >
                       <thead>
                           <tr>
                               <th class="text-dark">{{ __('#') }}</th>
                               <th class="text-dark">{{ __('Standard') }}</th>
                               <th class="text-dark">{{ __('Project') }}</th>
                               <th class="text-dark">{{ __('Auditee') }}</th>
                               <th class="text-dark">{{ __('Auditor Company') }}</th>
                               <th class="text-dark">{{ __('Auditor') }}</th>
                               <th class="text-dark">{{ __('Start Date') }}</th>
                               <th class="text-dark">{{ __('End Date') }}</th>
                               <th class="text-dark">{{ __('Type') }}</th>
                               <th class="text-dark">{{ __('Action') }}</th>
                           </tr>
                       </thead>
                       <tbody>
                        @php $i = 1 @endphp
                        @foreach ($projects as $data)
                           <tr id="row-{{ $data->id }}" class="text-center">
                               <td>{{ $i++ }}</td>
                               <td>{!! @get_company_standards($data->standard_id)->standard_name !!}</td>
                               <td>{{ $data->project_title }}</td>
                               <td>{!!  get_company($data->auditee_id)->company_name !!}</td>
                               <td>{!!  get_assessor($data->auditor_company)->assessor_lead_name !!}</td>
                               <td>{!!  @get_user($data->auditor_id)->username !!}</td>
                               <td>{{ DMY($data->project_start_date) }}</td>
                               <td>{{ DMY($data->project_end_date) }}</td>
                               <td>{!! auditeeType($data->audit_type) !!}</td>
                               <td>
                                    <div class="flex align-items-center list-user-action">
                                        <a href="{{ url('project_logs/'.Crypt::encrypt($data->id)) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Project Logs">
                                            <i class="fa fa-history"></i>
                                        </a>
                                        <!-- <a href="{{ url('project_logs/'.Crypt::encrypt($data->id)) }}" class="btn btn-info mb-3">
                                            <i class="fa fa-history" style="margin: 4px 1px 0px 0px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Project Logs"></i>
                                        </a> -->
                                        <a data-id="{{ $data->id }}" href="#" data-toggle="modal" data-target="#exampleModalCenteredScrollable" class="edit_project">
                                            <i data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" class="ri-edit-box-fill pr-0"></i>
                                        </a>
                                        <!-- <button type="button" data-id="{{ $data->id }}" data-toggle="modal" data-target="#exampleModalCenteredScrollable" class="btn btn-warning mb-3 edit_project">
                                            <i class="ri-edit-box-fill pr-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Project"></i>
                                        </button> -->
                                        <!-- <button type="button" data-id="{{ $data->id }}" class="btn btn-danger mb-3 delete_project" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Project">
                                            <i class="ri-delete-bin-2-fill pr-0"></i>
                                        </button> -->
                                        <a href="#" type="button" data-id="{{ $data->id }}" class="delete_project" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                            <i class="ri-delete-bin-2-fill pr-0"></i>
                                        </a>
                                    </div>
                               </td>
                           </tr>
                        @endforeach   
                       </tbody>
                   </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('pages.ajax.projectAjax')

@endsection