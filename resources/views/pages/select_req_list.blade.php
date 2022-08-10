
<!-- Page Content  -->
@extends('layouts.app')

<head>
  <style>
    #accordion-1 table, th,td {
      width:0px;
    }
    .navbar-list li img{
      margin-top: 40% !important;
    }
  </style>
</head>

@section('content')
<!-- Page Content  -->
<div id="content-page" class="content-page">
  <div class="container-fluid">
   <div class="row">
    <div class="col-lg-12">
     <div class="iq-right-fixed rounded iq-card iq-card iq-card-block iq-card-stretch iq-card-height" style="height:250px;">
      <div class="iq-card-header d-flex justify-content-between">
       <div class="iq-header-title">
        <h4 class="card-title">Activity timeline</h4>
      </div>

    </div>
    <div class="iq-card-body" style="box-sizing:border-box;">

     <div class="container">
      <div class="row">
       <ul class="breadcrumb">
        <li class="active"><a href="{{ url('req1') }}" data-toggle="popover-hover" title="Requirement 1" data-content="Install and maintain a firewall configuration to protect cardholder data">Req # 1</a></li>
        <li><a href="{{ url('req2') }}" data-toggle="popover-hover" title="Requirement 2" data-content="Do not use vendor-supplied defaults for system passwords and other security parameters">Req # 2</a></li>
        <li><a href="{{ url('req3') }}" data-toggle="popover-hover" title="Requirement 3" data-content="Protect stored cardholder data">Req # 3</a></li>
        <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 4" data-content="Encrypt transmission of cardholder data across open, public networks">Req # 4</a></li>
        <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 5" data-content="Protect all systems against malware and regularly update anti-virus software or programs">Req # 5</a></li>
        <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 6" data-content="Develop and maintain secure systems and applications">Req # 6</a></li>
        <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 7" data-content="Restrict access to cardholder data by business need to know">Req # 7</a></li>
        <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 8" data-content="Identify and authenticate access to system components">Req # 8</a></li>
        <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 9" data-content="Restrict physical access to cardholder data">Req # 9</a></li>
        <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 10" data-content="Track and monitor all access to network resources and cardholder data">Req # 10</a></li>
        <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 11" data-content="Regularly test security systems and processes">Req # 11</a></li>
        <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 12" data-content="Maintain a policy that addresses information security for all personnel">Req # 12</a></li>
      </ul>
    </div>
  </div>

</div>

</div>
</div>
<div class="col-sm-12 col-lg-12">
 <div class="iq-card">

<form id="req_register_form" type="post"> 
 <div class="iq-card pb-3">
   @csrf     

   @foreach($getRows as $level1)

   <div class="iq-card-header d-flex justify-content-between">
     <div class="iq-header-title col-10 p-0">
      <div class="card-title text-light" style="font-size: 14px;">{{ $level1->req_no }}: {{ $level1->description }}</div>
    </div>
    <div class="container bootstrap snippets bootdey">
      <div class="btn-group btn-toggle" style="border: 1px solid black;border-radius:5px;"> 
        <button class="btn btn-secondary   applevel{{ $level1->id }}" style="font-size: 10px;" id="app_btn{{ $level1->id }}" onclick="appView({{ $level1->id }})" type="button">Applicable</button>
        <input type="checkbox"  onclick="checkBoxChecked('.level{{ $level1->id }}');notcheckBoxChecked('.notlevel{{ $level1->id }}')" class="level{{ $level1->id }} " style="display: none" id="checkbox{{ $level1->id }}" value="{{ $level1->id }}">
        <button type="button" class="btn btn-danger notapplevel{{ $level1->id }} " style="font-size: 10px;" id="not_app_btn{{ $level1->id }}" onclick="notappView({{ $level1->id }})">Not Applicable</button>
        <input type="checkbox"  onclick="checkBoxChecked('.notlevel{{ $level1->id }}');notcheckBoxChecked('.level{{ $level1->id }}')" checked="checked" class="notlevel{{ $level1->id }} " id="notcheckbox{{ $level1->id }}" value="{{ $level1->id }}" style="display: none">
      </div>
    </div>
  </div>


  <div class="" id="card{{ $level1->id }}" style="margin:1%;display: none;">
   @php  $getlevel2=DB::table('req_lists')->where(array("parent_id"=>$level1->id))->get()->toArray() @endphp
   @foreach($getlevel2 as $level2)
   <div class="iq-card-header d-flex justify-content-between" style="background-color: #e9e9e9">
    <div class="iq-header-title col-10 p-0">
     <div class="card-title" style="font-size: 14px;color: black;"> <b>{{ $level2->req_no }}</b> {{ $level2->description }}</div>
   </div>
   <div class="container bootstrap snippets bootdey">
     <div class="btn-group btn-toggle" style="border: 1px solid #f5f5f5;border-radius:5px;"> 
     <button type="button" class="btn btn-secondary applevel{{ $level1->id }} applevel{{ $level2->id }}" style="font-size: 10px;" onclick="appView({{ $level2->id }})" id="app_btn{{ $level2->id }}" >Applicable</button>
       <input type="checkbox" id="checkbox{{ $level2->id }}" style="display: none" onclick="checkBoxChecked('.level{{ $level2->id }}');notcheckBoxChecked('.notlevel{{ $level2->id }}')" class="level{{ $level1->id }} level{{ $level2->id }} "  value="{{ $level2->id }}">
       <button type="button" class="btn btn-danger active notapplevel{{ $level1->id }} notapplevel{{ $level2->id }}" style="font-size: 10px;"  id="not_app_btn{{ $level2->id }}" onclick="notappView({{ $level2->id }})">Not Applicable</button>
       <input type="checkbox" id="notcheckbox{{ $level2->id }}" onclick="checkBoxChecked('.notlevel{{ $level2->id }}');notcheckBoxChecked('.level{{ $level2->id }}')"  class="notlevel{{ $level1->id }} notlevel{{ $level2->id }} " value="{{ $level2->id }}" style="display: none" checked="checked">
     </div>
   </div>
 </div>

 <div class="card-body p-0">
  <div class="" id="card{{ $level2->id }}" style="margin:1%;display: none;">
   @php  $getlevel3=DB::table('req_lists')->where(array("parent_id"=>$level2->id))->where('req_no','!=','guidence')->get()->toArray() @endphp
   @foreach($getlevel3 as $level3)

   <div class="iq-card-header d-flex justify-content-between" style="background-color: #f5f5f5;">
    <div class="iq-header-title col-10 p-0">
     <div class="card-title" style="font-size: 14px;color: black;"><b>{{ $level3->req_no }}</b> {{ $level3->description }}</div>
   </div>
   <div class="container bootstrap snippets bootdey">
     <div class="btn-group btn-toggle" style="border: 1px solid #f5f5f5;border-radius:5px;"> 
       <button type="button" class="btn btn-secondary applevel{{ $level1->id }} applevel{{ $level2->id }} applevel{{ $level3->id }}" style="font-size: 10px;" onclick="appView({{ $level3->id }})" "  id="app_btn{{ $level3->id }}" >Applicable</button>
       <input type="checkbox" id="checkbox{{ $level3->id }}" onclick="checkBoxChecked('.level{{ $level3->id }}');notcheckBoxChecked('.notlevel{{ $level3->id }}')" style="display: none" class="level{{ $level3->id }} level{{ $level2->id }} level{{ $level1->id }}" name="req_list[]" value="{{ $level3->id }}">
       <button type="button" class="btn btn-danger active notapplevel{{ $level1->id }} notapplevel{{ $level2->id }} notapplevel{{ $level3->id }}" style="font-size: 10px;" onclick="notappView({{ $level3->id }})" id="not_app_btn{{ $level3->id }}" >Not Applicable</button>
       <input type="checkbox" id="notcheckbox{{ $level3->id }}" onclick="checkBoxChecked('.notlevel{{ $level3->id }}');notcheckBoxChecked('.level{{ $level3->id }}')" name="notreq_list[]" class="notlevel{{ $level1->id }} notlevel{{ $level2->id }} notlevel{{ $level3->id }}" style="display: none" value="{{ $level3->id }}" checked="checked">
     </div>
   </div>
 </div>
 @endforeach 
</div>
</div>
@endforeach 
</div>
@endforeach 
</div>

<div class="row">
<div class="col-md-12" align="right">
<button type="button" onclick="submit_req_list()"  class="btn btn-lg btn-primary align-right mr-2">Submit </button>
</div>
</div>
<br>
<br>
</form>
</div>
</div>








</div>
</div>
</div>
<script>
  function checkBoxChecked(id)
  {

   $(id).prop('checked', true); 

}
function notcheckBoxChecked(id)
  {

  
    $(id).prop('checked', false);   
  

}
function DisplayDropDown(id,val)
{
  $(val).html("-");
  $(id).css("display","block");
}
function submit_req_list()
{
  $.ajax({
    url:"{{ route('submit_req_register_list') }}",
    type : 'POST',
    data:new FormData($('#req_register_form')[0]),
    dataType: 'json',
    contentType: false,  
    cache: false,  
    processData:false,
    success:function(data) {
      $('#req_register_form')[0].reset();
      Swal.fire({
        position: 'top-mid',
        icon: 'success',
        title: 'Record Submit Successfully',
        showConfirmButton: false,
        timer: 2500
      });
      setTimeout(function() { 
        location.reload();
      }, 2000);
    },error:function(err)
    {

    }
  });
}
function appView(id)
{
  
  $('.applevel'+id).addClass(' btn-danger');
  $('.notapplevel'+id).removeClass(' btn-danger');
  $('.applevel'+id).removeClass(' btn-secondary');
  $('.notapplevel'+id).addClass(' btn-secondary');
  $('#checkbox'+id).click();
  document.getElementById("card"+id).style.display="block";
}
function notappView(id)
{
  
  $('.applevel'+id).removeClass(' btn-danger');
  $('.notapplevel'+id).addClass(' btn-danger');
  $('.applevel'+id).addClass(' btn-secondary');
  $('.notapplevel'+id).removeClass(' btn-secondary');
  $('#notcheckbox'+id).click();
}

</script>
@endsection