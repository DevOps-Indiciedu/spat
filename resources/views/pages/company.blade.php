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
                    <table id="datatable" class="table table-striped table-bordered" >
                       <thead>
                           <tr>
                               <th class="text-dark">{{ __('#') }}</th>
                               <th class="text-dark">{{ __('Company') }}</th>
                               <th class="text-dark">{{ __('Name') }}</th>
                               <th class="text-dark">{{ __('Phone') }}</th>
                               <th class="text-dark">{{ __('Email') }}</th>
                               <th class="text-dark">{{ __('Role') }}</th>
                               <th class="text-dark">{{ __('Reg Date') }}</th>
                               <th class="text-dark">{{ __('Status') }}</th>
                               <th class="text-dark">{{ __('Action') }}</th>
                           </tr>
                       </thead>
                       <tbody>
                        @php $i = 1 @endphp
                        @foreach ($company as $data)
                           <tr id="row-{{ $data->id }}" class="text-center">
                               <td>{{ $i++ }}</td>
                               <td>{{ @$data->company_name }}</td>
                               <td>{{ $data->name }}</td>
                               <td>{{ $data->phone }}</td>
                               <td>{{ $data->email }}</td>
                               <td>{!!  get_role($data->role_id)->role !!}</td>
                               <td>{{ DMY($data->created_at) }}</td>
                               <td>{{ status($data->status) }}</td>
                               <td>
                                    @if($data->status == '1')
                                    <button type="button" data-umid="{{ $data->id }}" data-id="{{ $data->user_id }}" data-block="{{ $data->status }}" class="btn btn-warning mb-3 block_company" data-toggle="tooltip" data-placement="top" title="" data-original-title="Block Account">
                                        <i class="ri-lock-fill"></i>
                                    </button>
                                    @else
                                    <button type="button" data-umid="{{ $data->id }}" data-id="{{ $data->user_id }}" data-block="{{ $data->status }}" class="btn btn-warning mb-3 block_company" data-toggle="tooltip" data-placement="top" title="" data-original-title="Unblock Account">
                                        <i class="ri-lock-unlock-fill"></i>
                                    </button>
                                    @endif
                                   <button type="button" data-id="{{ $data->id }}" class="btn btn-danger mb-3 delete_company" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Company">
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


@include('pages.ajax.companyAjax')

@endsection