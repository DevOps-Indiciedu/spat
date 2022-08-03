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
                            <h4 class="card-title">{{ __('My Profile') }}</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <form action="{{ route('user-profile-information.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            @method('PUT')
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" value="{{ auth()->user()->email }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" value="{{ auth()->user()->name }}">
                            </div>
                            <div class="form-group">
                                <label for="old_password">Old Password</label>
                                <input type="password" id="old_password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input type="password" id="new_password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="profile">Profile Image</label><br>
                                <input type="file" name="" id="profile">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- @include('pages.ajax.companyAjax') -->

@endsection