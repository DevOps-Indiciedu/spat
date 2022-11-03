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
                        <h4 class="card-title">{{ __('Packages Subscription list') }}</h4>
                    </div>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenteredScrollable">
                    {{ __('Package Subscription') }}
                    </button>
                </div>
                <div class="iq-card-body">
                    <table id="datatable" class="table table-hover table-bordered" >
                       <thead>
                           <tr>
                               <th class="text-dark">{{ __('#') }}</th>
                              <th class="text-dark">{{ __('Company') }}</th>
                               <th class="text-dark">{{ __('Package') }}</th>
                               <th class="text-dark">{{ __('Start Date') }}</th>
                               <th class="text-dark">{{ __('End Date') }}</th>
                              <th class="text-dark">{{ __('Amount') }}</th>
                               <th class="text-dark">{{ __('Action') }}</th>
                           </tr>
                       </thead>
                       <tbody>
                        @php $i = 1 @endphp
                        @foreach ($list as $data)
                           <tr id="row-{{ $data->ps_id  }}" class="text-center">
                               <td>{{ $i++ }}</td>
                               <td>{!! get_company($data->company_id)->company_name !!}</td>
                               <td>{!! get_package($data->package_id)->title !!}</td>
                               <td>{{ $data->start_date }}</td>
                               <td>{{ $data->end_date }}</td>
                              <td>{!! get_package($data->package_id)->package_amount !!}</td>
                               
                               <td>
                                <div class="flex align-items-center list-user-action">
                                    <a href="#" data-id="{{ $data->ps_id }}" class="edit_package_subscription" data-toggle="modal" data-target="#exampleModalCenteredScrollable"><i class="ri-edit-box-fill pr-0"></i></a>
                                    <a href="#" data-id="{{ $data->ps_id  }}" class="delete_package_subscription">
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

@include('pages.ajax.package_subscriptionAjax')

@endsection