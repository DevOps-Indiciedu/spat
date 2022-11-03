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
                        <h4 class="card-title">{{ __('Packages Managment') }}</h4>
                    </div>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenteredScrollable">
                    {{ __('Add Package') }}
                    </button>
                </div>
                <div class="iq-card-body">
                    <table id="datatable" class="table table-hover table-bordered" >
                       <thead>
                           <tr>
                               <th class="text-dark">{{ __('#') }}</th>
                              <th class="text-dark">{{ __('Title') }}</th>
                               <th class="text-dark">{{ __('Max Users') }}</th>
                               <th class="text-dark">{{ __('Max Locations') }}</th>
                               <th class="text-dark">{{ __('Max Locations Users') }}</th>
                               <th class="text-dark">{{ __('Package Type') }}</th>
                               <th class="text-dark">{{ __('Amount') }}</th>
                               <th class="text-dark">{{ __('Action') }}</th>
                           </tr>
                       </thead>
                       <tbody>
                        @php $i = 1 @endphp
                        @foreach ($packages as $data)
                           <tr id="row-{{ $data->package_id }}" class="text-center">
                               <td>{{ $i++ }}</td>
                               <td>{{ $data->title }}</td>
                               <td>{{ $data->max_users }}</td>
                               <td>{{ $data->max_locations }}</td>
                               <td>{{ $data->max_locations_users }}</td>
                               <td>{{ $data->package_type }}</td>
                               <td>{{ $data->package_amount }}</td>
                               
                               <td>
                                <div class="flex align-items-center list-user-action">
                                    <a href="#" data-id="{{ $data->package_id }}" class="edit_package" data-toggle="modal" data-target="#exampleModalCenteredScrollable"><i class="ri-edit-box-fill pr-0"></i></a>
                                    <a href="#" data-id="{{ $data->package_id }}" class="delete_package">
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

@include('pages.ajax.packagesAjax')

@endsection