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
                        <h4 class="card-title">{{ __('Task') }}</h4>
                    </div>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenteredScrollable">
                        {{ __('Add Task') }}
                    </button>
                </div>
                <div class="iq-card-body">
                    <table id="datatable" class="table table-hover table-bordered" >
                       <thead>
                           <tr>
                               <th class="text-dark">{{ __('#') }}</th>
                               <th class="text-dark">{{ __('Task') }}</th>
                               <th class="text-dark">{{ __('Reg Date') }}</th>
                               <th class="text-dark">{{ __('Action') }}</th>
                           </tr>
                       </thead>
                       <tbody>
                            @php $i = 1 @endphp
                            @foreach ($template as $data)
                                <tr id="row-{{ $data->id }}">
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td>{{ $data->template_name }}</td>
                                    <td class="text-center">{{ DMY($data->created_at) }}</td>
                                    <td class="text-center">
                                        <div class="flex align-items-center list-user-action">
                                            <a href="#" data-id="{{ $data->id }}" class="edit_template" data-target="#exampleModalCenteredScrollable" data-toggle="modal" >
                                                <i class="ri-edit-box-fill pr-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                            </a>
                                            <a href="#" data-id="{{ $data->id }}" class="delete_template" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
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

@include('pages.ajax.templateAjax')

@endsection