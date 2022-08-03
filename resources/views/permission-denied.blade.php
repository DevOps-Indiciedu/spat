@extends('layouts.app')

@section('content')
<style>
    h1{
        font-size: 40px;
        margin-top: 15px;
        font-weight: 600;
    }
</style>
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center mt-4">
            <br><br>
            <img src="{{ asset(MyApp::PERMISSION_IMG) }}" alt="" width="300">
            <h1 class="text-danger">Permission Denied</h1>
            </div>
        </div>
    </div>
</div>
@endsection