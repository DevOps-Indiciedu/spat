@extends('layouts.app')

@section('content')
<style>
    .modules-listing {
        text-align: left;
		padding-left:0px;
    }

    .modules-listing li ul {
        padding-left: 15px;
    }

    .modules-listing .mode {
        background: #eeeeee;
        display: block;
        padding: 5px 10px;
        margin: 15px 0px;
    }

    .modules-listing .mode_top {
        background: #be1e2d;
        display: block;
         color:#f9f7f7;
        padding: 5px 10px;
        margin: 15px 0px;
    }

    
    .modules-listing .mode b {
        padding-right: 20px;
    }

    .modules-listing li ul li {
        display: inline-block;
        margin-right: 40px;
        text-transform: capitalize;
    }

    .modules-listing li ul li input {
        margin-right: 10px;
    }

    .modules-listing input[type="checkbox"] {
        appearance: none;
        -moz-appearance: none;
        -webkit-appearance: none;
        border: 1px solid #c8c6c6;
        width: 12px;
        height: 12px;
        border-radius: 2px;
        margin: 0 5px 0 0;
        cursor: pointer;
    }

    .modules-listing input[type="checkbox"]:focus {
        outline: none;
    }

    .modules-listing input[type="checkbox"]:checked {
        background: #5f5353;
        background-size: 20%;
    }

    .content {
        min-height: 0px;
        padding: 0px !important;
    }
	#assign-rights .box-body{
		padding:0px;
	}
	.assign_count{
	    float: right;
        padding: 15px;
        background: #3c8dbc;
        margin: 5px;
        border: 1px solid;
        color: white;
        margin-right: 115px;
	}
	#add{
	    margin-top:15px;
	}
	.bs-example {
        margin: 20px;
    }
    .rotate {
      -webkit-transform: rotate(-180deg); /* Chrome, Safari, Opera */
      -moz-transform: rotate(-180deg); /* Firefox */
      -ms-transform: rotate(-180deg); /* IE 9 */
      transform: rotate(-180deg); /* Standard syntax */
    }

</style>
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">{{ __('Assign User Role Rights') }}</h4>
                        </div>
                        <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenteredScrollable">
                        {{ __('Add User Role') }}
                        </button> -->
                    </div>
                    <div class="iq-card-body">
                        <form id="saveRightForm" action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <ul class="modules-listing">
                                    @php 
                                        $admin_assigned = 0;
                                        $admin_notassigned = 0;
                                    @endphp
                                    @foreach($package_rights as $mod_key => $action_data)
                                        <li style="list-style: none">
                                            <!-- <div class="mode_top">
                                                <b>{{ ucfirst($mod_key) }}</b>
                                            </div> -->
                                            <ul class="modules-listing">
                                                @foreach($action_data as $key => $mod)
                                                    <fieldset module="{{ $mod[0]['module_id'] }}">
                                                    <li style="list-style: none">
                                                            <div class="mycbox">
                                                                <div class="mode_top">
                                                                    <b>{{ ucfirst($key) }}</b>
                                                                    
                                                                    <input type="checkbox" id="selectall{{$mod[0]['module_id']}}" name="module[]" class="parentCheckBox adminMainCheckBox" module="{{$mod[0]['module_id']}}" value="{{$mod[0]['module_id']}}">
                                                                    <label style="color:white;margin-top:6px;" for="module[]" style="font-weight:normal;">Select All</label>
                                                                </div>
                                                                <ul>
                                                                    @foreach($mod as $act)
                                                                        <li class="nested content" style="list-style: none">
                                                                            <input type="checkbox" name="actions[]" @php $style = ""; if(in_array($act['action_id'],$sel2)){echo "checked=checked"; $admin_assigned++; $style = "color:green;"; } else{$admin_notassigned++; $style = "color:red;";} @endphp class="childCheckBox adminSubCheckBox" module="{{ $mod[0]['module_id'] }}" value="{{ $act['action_id'] }}" id="actions">
                                                                            <span style="{{ $style }}">{{ $act['action_title'] }}</span>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </li>
                                                    </fieldset>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                                <br><br>
                                <div class="box-footer float-left">
                                    <input type="hidden" name="role_id" value="{{ $role_id }}" />
                                    <button type="submit" id="submit-btn" name="submit" class="btn btn-primary btn-lg">
                                        Assign
                                    </button>
                                </div>
                                <span class="float-right bg-dark text-white p-1">
                                    Assigned = {{ $admin_assigned }} <br> Not Assigned = {{ $admin_notassigned }}
                                </span>
                                <br><br>
                            </div>
                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

@include('pages.ajax.userroleAjax')

@endsection