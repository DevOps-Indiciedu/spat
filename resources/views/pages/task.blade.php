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
                        <h4 class="card-title">{{ __('Task Managment') }}</h4>
                    </div>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#TaskAddEdit">
                        {{ __('Add Task') }}
                    </button>
                </div>
                <div class="iq-card-body">
                    <table id="datatable" class="table table-hover table-bordered" >
                       <thead>
                           <tr>
                               <th class="text-dark">{{ __('#') }}</th>
                               <th class="text-dark">{{ __('Project') }}</th>
                               <th class="text-dark">{{ __('Title') }}</th>
                               <th class="text-dark">{{ __('Assign To') }}</th>
                               <th class="text-dark">{{ __('Start Datetime') }}</th>
                               <th class="text-dark">{{ __('Deadline') }}</th>
                               <th class="text-dark">{{ __('Status') }}</th>
                               <th class="text-dark">{{ __('Progress') }}</th>
                               <th class="text-dark">{{ __('Action') }}</th>
                           </tr>
                       </thead>
                       <tbody>
                            @php $i = 1 @endphp
                            @foreach ($task as $data)
                            <tr id="row-{{ $data->id }}" class="text-center">
                                <td>{{ $i++ }}</td>
                                <td>Examine documented procedures to verify there is a formal process for testing</td>
                                <td>{{ $data->task_title }}</td>
                                <td>{!! get_user($data->assign_to)->username !!}</td>
                                <td>{{ DMY($data->start_datetime) }}</td>
                                <td>{{ DMY($data->end_datetime) }}</td>
                                <td>{!! get_taskStatus($data->status)->title !!}</td>
                                <td>{{ $data->task_progress }}</td>
                                <td>
                                    <div class="flex align-items-center list-user-action">
                                        <a href="#" data-id="{{ $data->id }}" class="edit_task" data-toggle="modal" data-target="#exampleModalCenteredScrollable"><i class="ri-edit-box-fill pr-0"></i></a>
                                        <a href="#" data-id="{{ $data->id }}" class="delete_task" >
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

@include('pages.ajax.taskAjax')

@endsection