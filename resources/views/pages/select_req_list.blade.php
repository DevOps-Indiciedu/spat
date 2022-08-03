@extends('layouts.app')

@section('content')
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <style type="text/css">
        th{
            color:black !important;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">{{ __('All Requirements') }}</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                     <form id="req_register_form" type="post"> 
                     @csrf      
                    <table class='table' width='100%' border='1' style='width:100%'>
                          <thead><tr><th>DropDown</th><th>Check</th><th>PCI DSS Requirements</th></tr></thead>
                          <tbody>

                              @foreach($getRows as $level1)
                              <tr >
                                  <td><button type='button' class="btn btn-primary btn-sm" onclick="DisplayDropDown('.leveltr1{{ $level1->id }}',this)">+</button></td>
                                  <td><input type='checkbox' value="{{ $level1->id }}"  name="req_list[]" onclick="checkBoxChecked('.level1{{ $level1->id }}',this)" class='level1{{ $level1->id }}'></td><td><b>{{ $level1->req_no }}</b>{{ $level1->description }}</td>
                              </tr>
                              @php  $getlevel2=DB::table('req_lists')->where(array("parent_id"=>$level1->id))->get()->toArray() @endphp
                              <tr>
                                  <td colspan='3'>
                                   <table class='leveltr1{{ $level1->id }}' style='display:none' width='100%' border='1' style='width:100%' >
                                    <tbody>
                                        @foreach($getlevel2 as $level2)
                                        <tr>
                                            @php  $getlevel3=DB::table('req_lists')->where(array("parent_id"=>$level2->id))->where('req_no','!=','guidence')->get()->toArray() @endphp

                                            <td><button type='button' class="btn btn-primary btn-sm" onclick="DisplayDropDown('.leveltr2{{ $level2->id }}',this)">+</button></td>
                                            <td><input name="req_list[]" value="{{ $level2->id }}"  type='checkbox'onclick="checkBoxChecked('.level2{{ $level2->id }}',this)"  class="level1{{ $level1->id }} level2{{ $level2->id }}"></td>
                                            <td><b>{{ $level2->req_no }}</b>{{ $level2->description }}</td>
                                        </tr>


                                        <tr>
                                            <td colspan='3'>
                                               <table class='leveltr2{{ $level2->id }}' style='display:none' width='100%' border='1' style='width:100%' >
                                                <tbody>
                                                    @foreach($getlevel3 as $level3)
                                                    <tr> 
                                                     <td></td><td><input type='checkbox' onclick="checkBoxChecked('.level3{{ $level3->id }}',this)" name="req_list[]" value="{{ $level3->id }}" class="level1{{ $level1->id }} level2{{ $level2->id }} level3{{ $level3->id }}"></td>
                                                     <td><b>{{ $level3->req_no }}</b>{{ $level3->description }}</td>
                                                 </tr>
                                                 @endforeach 
                                             </tbody>
                                         </table>    
                                     </td>
                                 </tr>
                                 @endforeach 
                             </tbody>
                         </table>
                     </td>
                 </tr>

                 @endforeach 
             </tbody>
         </table>
         <button type="button" onclick="submit_req_list()"  class="btn btn-lg btn-primary">Submit </button>
         </form>
         <hr>

     </div>
 </div>
</div>
</div>
</div>
</div>

<script>
    function checkBoxChecked(id,obj)
    {

     var d=$(id+':checkbox:checked').length;

     if(d > 1)
     {
      $(id).prop('checked', false);   
      $(obj).prop('checked', false);
  }
  else
  {
     $(id).prop('checked', true);
     $(obj).prop('checked', true);
 }

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
</script>

@endsection