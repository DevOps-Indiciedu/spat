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
                    <button type="button" class="btn btn-danger addUserModal" data-toggle="modal" data-target="#exampleModalCenteredScrollable">
                        {{ __('Add User') }}
                    </button>
                </div>
                <div class="iq-card-body">
                    <table id="datatable" class="table table-hover table-bordered" >
                       <thead>
                           <tr>
                               <th class="text-dark">{{ __('#') }}</th>
                               <th class="text-dark">{{ __('Name') }}</th>
                               <th class="text-dark">{{ __('Email') }}</th>
                               <th class="text-dark">{{ __('Phone') }}</th>
                               <th class="text-dark">{{ __('Designation') }}</th>
                               <th class="text-dark">{{ __('Company') }}</th>
                               <th class="text-dark">{{ __('Location') }}</th>
                               <th class="text-dark">{{ __('Department') }}</th>
                               <th class="text-dark">{{ __('Role') }}</th>
                               <th class="text-dark">{{ __('Status') }}</th>
                               @if(Auth::user()->usermanagement->two_factor_enabled == 1)
                               <th class="text-dark">{{ __('2FA') }}</th>
                               @endif
                               <th class="text-dark">{{ __('Action') }}</th>
                           </tr>
                       </thead>
                       <tbody>
                            @php $i = 1 @endphp
                            @foreach ($user as $data)
                            <tr id="row-{{ $data->id }}" class="text-center">
                                <td>{{ $i++ }}</td>
                                @if($data->profile_image)
                                    <td class="text-left">
                                        <a href="{{ asset(MyApp::PROFILE.$data->profile_image) }}" target="_blank">
                                            <img src="{{ asset(MyApp::PROFILE.$data->profile_image) }}" alt="{{ $data->profile_image }}" class="userImage">
                                        </a>
                                        &nbsp;&nbsp;
                                        {{ $data->name }}
                                    </td>
                                @else
                                    <td>
                                        {{ $data->name }}
                                    </td>
                                @endif
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>{{ get_designation($data->designation_id)->title }}</td>
                                <td>{!!  get_company($data->company_id)->company_name !!}</td>
                                <td>{!!  @get_location($data->location_id)->name !!}</td>
                                <td>{!!  @get_department($data->department_id)->department !!}</td>
                                <td>{!!  get_role($data->role_id)->role !!}</td>
                                <td>{{ status($data->status) }}</td>
                                @if(Auth::user()->usermanagement->two_factor_enabled == 1)
                                <td>
                                    @if($data->two_factor_enabled == 1)
                                    <div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                                        <div class="custom-switch-inner">
                                            <!-- <p class="mb-0"> Danger </p> -->
                                            <input type="checkbox" class="custom-control-input bg-success 2FA" data-factor="0" data-userID="{{ $data->user_id }}" id="customSwitch-{{ $data->user_id }}" checked="">
                                            <label class="custom-control-label" for="customSwitch-{{ $data->user_id }}" data-on-label="Yes" data-off-label="No">
                                            </label>
                                        </div>
                                    </div>
                                    @else
                                    <div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                                        <div class="custom-switch-inner">
                                            <!-- <p class="mb-0"> Danger </p> -->
                                            <input type="checkbox" class="custom-control-input bg-success 2FA" data-factor="1" data-userID="{{ $data->user_id }}" id="customSwitch-{{ $data->user_id }}">
                                            <label class="custom-control-label" for="customSwitch-{{ $data->user_id }}" data-on-label="Yes" data-off-label="No">
                                            </label>
                                        </div>
                                    </div>
                                    @endif
                                </td>
                                @endif
                                <td>
                                    <div class="flex align-items-center list-user-action">
                                        <a href="#" data-id="{{ $data->id }}" class="edit_user" data-toggle="modal" data-target="#exampleModalCenteredScrollable"><i class="ri-edit-box-fill pr-0"></i></a>
                                        <!-- <button type="button" data-id="{{ $data->id }}" class="btn btn-danger delete_user" >
                                                <i class="ri-delete-bin-2-fill pr-0"></i>
                                            </button> -->
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

@include('pages.ajax.userAjax')

@endsection