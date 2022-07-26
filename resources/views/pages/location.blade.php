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
                        <h4 class="card-title">{{ __('Location Managment') }}</h4>
                    </div>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenteredScrollable">
                        {{ __('Add Location') }}
                    </button>
                </div>
                <div class="iq-card-body">
                    <table id="datatable" class="table table-striped table-bordered" >
                       <thead>
                           <tr>
                               <th class="text-dark">{{ __('#') }}</th>
                               <th class="text-dark">{{ __('Name') }}</th>
                               <th class="text-dark">{{ __('Location') }}</th>
                               <th class="text-dark">{{ __('Company') }}</th>
                               <th class="text-dark">{{ __('Phone') }}</th>
                               <th class="text-dark">{{ __('Action') }}</th>
                           </tr>
                       </thead>
                       <tbody>
                            @php $i = 1 @endphp
                            @foreach ($location as $data)
                            <tr id="row-{{ $data->id }}" class="text-center">
                                <td>{{ $i++ }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->address }}</td>
                                <td>{!!  get_company($data->company_id)->company !!}</td>
                                <td>{{ $data->phone }}</td>
                                <td>{{ DMY($data->created_at) }}</td>
                                <td>
                                    <button type="button" data-id="{{ $data->id }}" class="btn btn-warning edit_location" data-toggle="modal" data-target="#exampleModalCenteredScrollable"><i class="ri-edit-box-fill pr-0"></i></button>
                                    <button type="button" data-id="{{ $data->id }}" class="btn btn-danger delete_location" >
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

@include('pages.ajax.locationAjax')

@endsection