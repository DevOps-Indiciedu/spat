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
                            <h4 class="card-title">{{ __('Standards') }}</h4>
                        </div>
                        <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenteredScrollable">
                        {{ __('Add User Role') }}
                        </button> -->
                    </div>
                    <div class="iq-card-body">
                        <table id="datatable" class="table table-hover table-bordered" >
                        <thead>
                            <tr>
                                <th class="text-dark">{{ __('#') }}</th>
                                <th class="text-dark">{{ __('Standard Name') }}</th>
                                <th class="text-dark">{{ __('Version') }}</th>
                                <th class="text-dark">{{ __('Reg Date') }}</th>
                                <th class="text-dark">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                                @php $i = 1 @endphp
                                @foreach ($standards as $data)
                                <tr id="row-{{ $data->id }}" class="text-center">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $data->standard_name }}</td>
                                    <td>{{ $data->version }}</td>
                                    <td>{{ DMY($data->created_at) }}</td>
                                    <td>
                                        <a href="{{ route('view_requirements') }}" class="btn btn-dark">
                                            View Details
                                        </a>
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