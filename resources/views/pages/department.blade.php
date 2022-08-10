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
                        <h4 class="card-title">{{ __('Department Managment') }}</h4>
                    </div>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenteredScrollable">
                    {{ __('Add Depart') }}
                    </button>
                </div>
                <div class="iq-card-body">
                    <table id="datatable" class="table table-hover table-bordered" >
                       <thead>
                           <tr>
                               <th class="text-dark">{{ __('#') }}</th>
                               <th class="text-dark">{{ __('Depart') }}</th>
                               <th class="text-dark">{{ __('Company') }}</th>
                               <th class="text-dark">{{ __('Location') }}</th>
                               <th class="text-dark">{{ __('Reg Date') }}</th>
                               <th class="text-dark">{{ __('Action') }}</th>
                           </tr>
                       </thead>
                       <tbody>
                        @php $i = 1 @endphp
                        @foreach ($department as $data)
                           <tr id="row-{{ $data->id }}" class="text-center">
                               <td>{{ $i++ }}</td>
                               <td>{{ $data->department }}</td>
                               <td>{!!  get_company($data->company_id)->company_name !!}</td>
                               <td>{!!  get_location($data->location_id)->name !!}</td>
                               <td>{{ DMY($data->created_at) }}</td>
                               <td>
                                <div class="flex align-items-center list-user-action">
                                    <a href="#" data-id="{{ $data->id }}" class="edit_department" data-toggle="modal" data-target="#exampleModalCenteredScrollable"><i class="ri-edit-box-fill pr-0"></i></a>
                                    <a href="#" data-id="{{ $data->id }}" class="delete_department">
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

@include('pages.ajax.departmentAjax')

@endsection