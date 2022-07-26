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
                        <h4 class="card-title">{{ __('User Role Managment') }}</h4>
                    </div>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenteredScrollable">
                    {{ __('Add User Role') }}
                    </button>
                </div>
                <div class="iq-card-body">
                    <table id="datatable" class="table table-hover table-bordered" >
                       <thead>
                           <tr>
                               <th class="text-dark">{{ __('#') }}</th>
                               <th class="text-dark">{{ __('Role') }}</th>
                               <th class="text-dark">{{ __('Reg Date') }}</th>
                               <th class="text-dark">{{ __('Action') }}</th>
                           </tr>
                       </thead>
                       <tbody>
                        @php $i = 1 @endphp
                        @foreach ($role as $data)
                           <tr id="row-{{ $data->id }}" class="text-center">
                               <td>{{ $i++ }}</td>
                               <td>{{ $data->role }}</td>
                               <td>{{ DMY($data->created_at) }}</td>
                               <td>
                               <div class="flex align-items-center list-user-action">
                                   <a href="{{ url('role_rights/'.Crypt::encrypt($data->id)) }}" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Assign Rights"><i class="ri-links-fill pr-0"></i></a>
                                   <a href="#" data-id="{{ $data->id }}" class="edit_role" data-toggle="modal" data-target="#exampleModalCenteredScrollable"><i class="ri-edit-box-fill pr-0" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit"></i></a>
                                   <a href="#" data-id="{{ $data->id }}" class="delete_role" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete">
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

@include('pages.ajax.userroleAjax')

@endsection