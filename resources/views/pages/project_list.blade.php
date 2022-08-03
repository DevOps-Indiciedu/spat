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
                        <h4 class="card-title">{{ __('Projects') }}</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <table id="datatable" class="table table-striped table-bordered" >
                       <thead>
                           <tr>
                               <th class="text-dark">{{ __('#') }}</th>
                               <th class="text-dark">{{ __('Standard') }}</th>
                               <th class="text-dark">{{ __('Project') }}</th>
                               @if(auth()->user()->usermanagement->role_id == 2)
                               <th class="text-dark">{{ __('Auditor') }}</th>
                               @elseif(auth()->user()->usermanagement->role_id == 3)
                               <th class="text-dark">{{ __('Auditee') }}</th>
                               @endif
                               <th class="text-dark">{{ __('Start Date') }}</th>
                               <th class="text-dark">{{ __('End Date') }}</th>
                               <th class="text-dark">{{ __('Action') }}</th>
                           </tr>
                       </thead>
                       <tbody>
                        @php $i = 1 @endphp
                        @foreach ($projects as $data)
                           <tr id="row-{{ $data->id }}" class="text-center">
                               <td>{{ $i++ }}</td>
                               <td>{!! @get_company_standards($data->standard_id)->standard_name !!}</td>
                               <td>{{ $data->project_title }}</td>
                               @if(auth()->user()->usermanagement->role_id == 2)
                               <td>
                                {!!  get_user($data->auditor_id)->name !!}
                                ({!!  get_assessor($data->auditor_company)->company_name !!})
                                </td>
                               @elseif(auth()->user()->usermanagement->role_id == 3)
                               <td>{{ $data->company_name }}</td>
                               @endif
                               <td>{{ DMY($data->project_start_date) }}</td>
                               <td>{{ DMY($data->project_end_date) }}</td>
                               <td>
                                @if(auth()->user()->usermanagement->role_id == 2)

                                    <a href="{{ route('view_selected_req_list') }}" class="btn btn-danger mb-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                        View
                                    </a>
                                @elseif(auth()->user()->usermanagement->role_id == 3)
                                    <a href="{{ route('select_req_list') }}" class="btn btn-danger mb-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mark SOA">
                                        Mark SOA
                                    </a>
                                    <a href="{{ route('view_selected_req_list') }}" class="btn btn-danger mb-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Observation">
                                        Add Observations
                                    </a>
                                @endif
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


@include('pages.ajax.projectAjax')

@endsection