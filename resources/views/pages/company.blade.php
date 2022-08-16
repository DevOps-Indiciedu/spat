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
                        <h4 class="card-title">{{ __('Companies Managment') }}</h4>
                    </div>
                    <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenteredScrollable">
                    {{ __('Add Company') }}
                    </button> -->
                </div>
                <div class="iq-card-body">
                    <table id="datatable" class="table table-bordered table-hover">
                       <thead>
                           <tr>
                               <th class="text-dark">{{ __('#') }}</th>
                               <th class="text-dark">{{ __('Company') }}</th>
                               <th class="text-dark">{{ __('Name') }}</th>
                               <th class="text-dark">{{ __('Phone') }}</th>
                               <th class="text-dark">{{ __('Email') }}</th>
                               <th class="text-dark">{{ __('Role') }}</th>
                               <th class="text-dark">{{ __('Reg Date') }}</th>
                               @if(userRightGranted('2fa'))
                               <th class="text-dark">{{ __('Admin 2FA Access') }}</th>
                               <th class="text-dark">{{ __('Users 2FA Access') }}</th>
                               @endif
                               <th class="text-dark">{{ __('Status') }}</th>
                               <th class="text-dark">{{ __('Action') }}</th>
                           </tr>
                       </thead>
                       <tbody>
                        @php $i = 1 @endphp
                        @foreach ($company as $data)
                           <tr id="row-{{ $data->id }}" class="text-center">
                               <td>{{ $i++ }}</td>
                               <td>
                                    @if($data->role_id == '2')
                                        {{ $data->company_name }}
                                    @elseif($data->role_id == '3')
                                        {{ $data->ass_company }}
                                    @endif
                                </td>
                               
                                <td>{{ $data->name }}</td>
                               <td>{{ $data->phone }}</td>
                               <td>{{ $data->email }}</td>
                               <td>{!!  get_role($data->role_id)->role !!}</td>
                               <td>{{ DMY($data->created_at) }}</td>
                               @if(userRightGranted('2fa'))
                               <td>
                                    @if($data->two_factor_disabled_access == 1)
                                    <div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                                        <div class="custom-switch-inner">
                                            <!-- <p class="mb-0"> Danger </p> -->
                                            <input type="checkbox" class="custom-control-input bg-success D2FA" data-factor="0" data-userID="{{ $data->user_id }}" id="customSwitch--{{ $data->user_id }}" checked="">
                                            <label class="custom-control-label" for="customSwitch--{{ $data->user_id }}" data-on-label="Yes" data-off-label="No">
                                                </label>
                                            </div>
                                        </div>
                                        @else
                                        <div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                                            <div class="custom-switch-inner">
                                                <!-- <p class="mb-0"> Danger </p> -->
                                            <input type="checkbox" class="custom-control-input bg-success D2FA" data-factor="1" data-userID="{{ $data->user_id }}" id="customSwitch--{{ $data->user_id }}">
                                            <label class="custom-control-label" for="customSwitch--{{ $data->user_id }}" data-on-label="Yes" data-off-label="No">
                                                </label>
                                            </div>
                                        </div>
                                        @endif
                                    </td>
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
                               <td>{{ status($data->status) }}</td>
                               <td>
                                   <div class="flex align-items-center list-user-action">
                                        <a href="#" data-id="{{ $data->company_id }}" class="edit_company" @if($data->role_id == 2) data-target="#CompanyEditModal" @elseif($data->role_id == 3) data-target="#AssessorEditModal" @endif data-toggle="modal" >
                                            <i class="ri-edit-box-fill pr-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                        </a>
                                        
                                        @if($data->status == '1')
                                        <a href="#" data-umid="{{ $data->id }}" data-id="{{ $data->user_id }}" data-block="{{ $data->status }}" class="block_company" data-toggle="tooltip" data-placement="top" title="" data-original-title="Block Account">
                                            <i class="ri-lock-fill"></i>
                                        </a>
                                        @else
                                        <a href="#" data-umid="{{ $data->id }}" data-id="{{ $data->user_id }}" data-block="{{ $data->status }}" class="block_company" data-toggle="tooltip" data-placement="top" title="" data-original-title="Unblock Account">
                                            <i class="ri-lock-unlock-fill"></i>
                                        </a>
                                        @endif
                                        <a href="#" data-id="{{ $data->id }}" class="delete_company" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
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


@include('pages.ajax.companyAjax')

@endsection