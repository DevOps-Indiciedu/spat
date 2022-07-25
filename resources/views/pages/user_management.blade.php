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
                        <h4 class="card-title">{{ __('User Management') }}</h4>
                    </div>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenteredScrollable">
                        {{ __('Add User') }}
                    </button>
                </div>
                <div class="iq-card-body">
                    <table id="datatable" class="table table-striped table-bordered" >
                       <thead>
                           <tr>
                               <th class="text-dark">{{ __('#') }}</th>
                               <th class="text-dark">{{ __('Name') }}</th>
                               <th class="text-dark">{{ __('Email') }}</th>
                               <th class="text-dark">{{ __('Phone') }}</th>
                               <th class="text-dark">{{ __('Address') }}</th>
                               <th class="text-dark">{{ __('Designation') }}</th>
                               <th class="text-dark">{{ __('Company') }}</th>
                               <th class="text-dark">{{ __('Location') }}</th>
                               <th class="text-dark">{{ __('Department') }}</th>
                               <th class="text-dark">{{ __('Role') }}</th>
                               <th class="text-dark">{{ __('Status') }}</th>
                               <th class="text-dark">{{ __('Action') }}</th>
                           </tr>
                       </thead>
                       <tbody>
                            @php $i = 1 @endphp
                            @foreach ($user as $data)
                            <tr id="row-{{ $data->id }}" class="text-center">
                                <td>{{ $i++ }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>{{ $data->address }}</td>
                                <td>{{ get_designation($data->designation_id)->title }}</td>
                                <td>{!!  get_company($data->company_id)->company !!}</td>
                                <td>{!!  get_location($data->location_id)->name !!}</td>
                                <td>{!!  get_department($data->department_id)->department !!}</td>
                                <td>{!!  get_role($data->role_id)->role !!}</td>
                                <td>{{ status($data->status) }}</td>
                                <td>{{ DMY($data->created_at) }}</td>
                                <td>
                                    <button type="button" data-id="{{ $data->id }}" class="btn btn-warning edit_user" data-toggle="modal" data-target="#exampleModalCenteredScrollable"><i class="ri-edit-box-fill pr-0"></i></button>
                                    <button type="button" data-id="{{ $data->id }}" class="btn btn-danger delete_user" >
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

@include('pages.ajax.userAjax')

@endsection