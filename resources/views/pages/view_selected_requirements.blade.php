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
                            <h4 class="card-title">{{ __('Selected Requirements') }}</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                     
                    <table class='table' width='100%' border='1' style='width:100%'>
                          <thead><tr><th  width='50%'>Description</th><th width='50%'>Action</th></tr></thead>
                          <tbody>

                            @foreach($getRows as $level1)
                            @php  $getlevel2=DB::table('req_lists')->where(array("id"=>$level1->req_id))->get()->first() @endphp
                            @php $attachments=DB::table('observation_images')->where(array("observation_id"=>$level1->req_id))->get()->toArray() @endphp
                            
                        
                            <tr >
                                <td width='50%'><b>{{ $getlevel2->req_no }}</b>{{ $getlevel2->description }}</td>
                                <td width='50%' id="actionid{{ $level1->el_id }}">
                                @foreach($attachments as $image)
                                    <a href='{{ asset(MyApp::ASSET_IMG.$image->imagelink) }}'>{{ $image->imagelink }}
                                    <br>
                                @endforeach
                                @if(!empty($level1->description))
                                {{ $level1->description }}
                                <br>
                                @endif
                                <button  onclick="set_id({{ $level1->el_id }})" class="btn btn-danger enter_result" data-toggle="modal" data-target="#exampleModalCenteredScrollable">Enter Observation</button></td>
                            </tr>
                               @endforeach 
                             </tbody>
                         </table>
                     </td>
                 </tr>

               
             </tbody>
         </table>
       
         <hr>

     </div>
 </div>
</div>
</div>
</div>
</div>
<div id="exampleModalCenteredScrollable" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">{{ __('Result Observation') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <form id="resultForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body row">
            
                <div class="form-group col-sm-12">
                    <label for="phone">{{ __('Description') }}</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
                    <div class="col-md-12" id="Attachments_list">
                    </div>
                <div class="form-group col-sm-12">
                   <button type="button" class="btn btn-primary formBtn" onclick="attach_more_file()">{{ __('Attach File') }}</button>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" onclick="submit_result()" class="btn btn-primary formBtn">{{ __('Save') }}</button>
                <input type="hidden" id="hiddenId" name="hiddenId">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </form>
        </div>
    </div>
</div>
<script>
   function submit_result()
   {
      
     
        var id = $('#hiddenId').val();
        $.ajax({
            url:"{{ route('submit_requirement_result') }}",
            type : 'POST',
            data:new FormData($('#resultForm')[0]),
            dataType: 'json',
            contentType: false,  
            cache: false,  
            processData:false,
            success:function(data) {
                $('#resultForm')[0].reset();
                $('#actionid'+id).prepend(data.data+"<br>");
                $('#exampleModalCenteredScrollable').modal('hide');
            },error:function(err)
            {
               alert(err.data);
            }
        });
    }
    function set_id(id)
    {
       
        $("#hiddenId").val(id);

          $('#description').summernote();
      
    };
    function attach_more_file()
    {
        var html="";
        html+='<br><div class="row">';
        html+='<div class="col-md-9">';
        html+='<input type="file" name="attachment[]" class="form-controm">';
        html+='</div>';
        html+='<div class="col-md-3">';
        html+='<button type="button" clas="btn btn-primary btn-sm formBtn">X</button>';
        html+='</div>';
        html+='</div>';
        $('#Attachments_list').append(html);

    }
</script>
@endsection