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
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenteredScrollable">
                        {{ __('Add Task') }}
                    </button>
                </div>
                <div class="iq-card-body">
                    <table id="datatable" class="table table-striped table-bordered" >
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
                                <td>{!!  get_company($data->company_id)->company !!}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->address }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>{{ DMY($data->created_at) }}</td>
                                <td>
                                    <button type="button" data-id="{{ $data->id }}" class="btn btn-warning edit_task" data-toggle="modal" data-target="#exampleModalCenteredScrollable"><i class="ri-edit-box-fill pr-0"></i></button>
                                    <button type="button" data-id="{{ $data->id }}" class="btn btn-danger delete_task" >
                                            <i class="ri-delete-bin-2-fill pr-0"></i>
                                        </button>
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