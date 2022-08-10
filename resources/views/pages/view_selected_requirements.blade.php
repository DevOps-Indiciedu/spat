@extends('layouts.app')

@section('content')
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.bootstrap4.min.css"> -->

      <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.bootstrap4.min.css">
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script> 

         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 col-lg-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">{{ __('Summary of Findings') }}</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <table id="example" class="table table-striped table-bordered" style="width:100%">
                              <thead>
                                  <tr style="background-color: #be1e2d;">
                                      <th width="1%">Sr#.</th>
                                      <th width="2%">Req#</th>
                                      <th width="38%">Testing Procedure</th>
                                      <th width="8%">Status</th>
                                      <th width="11%">Evdence Type</th>
                                      <th width="40%">Evidence File</th>
                                  </tr>
                              </thead>
                              <tbody>
                                   @foreach($getRows as $level1)
                                    @php  $getlevel2=DB::table('req_lists')->where(array("id"=>$level1->req_id))->get()->first();$i=0; @endphp
                                    @php $attachments=DB::table('observation_images')->where(array("observation_id"=>$level1->el_id))->get()->toArray(); @endphp
                            

                            <tr>
                            <td>{{ $i++ }}</td>
                            <td>Req # 1</td>
                            <td>{{ $getlevel2->req_no }} {{ $getlevel2->description }}</td>
                            <td>
                                @if($level1->description=='Not Applicable')
                                <p>Not Applicable</p>
                                @else
                                @if(empty($level1->description))
                                <button class="btn btn-danger">Pending</button>
                                @else
                                <button class="btn btn-success">Completed</button>
                                @endif
                                @endif
                            </td>
                            <td>Document</td>
                            <td>

                             @if($level1->description!='Not Applicable')
                             <button class="btn btn-info"  type="button" data-toggle="modal" data-target="#evidencemodal" onclick="set_id({{ $level1->el_id }})">Upload New Files</button>
                              <div class="card mt-2" id="documentsData{{ $level1->el_id }}">
                                    @foreach($attachments as $image)
                                    <div class="card-header d-flex justify-content-between">
                                        {{ $image->imagelink }}
                                    <a href="#" class="btn btn-success" style="padding:0px 5px 0px 5px;">Approved</a>
                                    </div>
                                    <div class="card-body d-flex justify-content-between">
                                            <p class="card-text"><b>Uploaded By: </b> Name  <span>{{ date('d-m-Y',strtotime($level1->created_at)) }}</span>  <span>{{ date('H:i a',strtotime($level1->created_at)) }}</span></p>
                                            <div>
                                             <button class="btn upload"><i class="fa fa-upload"></i></button>
                                             <button class="btn download"><i class="fa fa-download"></i></button>
                                            </div>
                                          </div>
                                  
                                        @endforeach
                                      
                                        </div>
                                        @endif
                            </td>
                            </tr>
                            @endforeach
                         
                              </tbody>
                          </table>

                           <!-- The Modal -->
                          
                        </div>
                     </div>
                  </div>     
               </div>
            </div>
         </div>




 <div class="modal fade" id="evidencemodal">
                              <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                              
                                 <!-- Modal Header -->
                                 <div class="modal-header">
                                    <h4 class="modal-title">Evidence Uploading</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                 </div>
                                 
                                 <!-- Modal body -->
                                 <div class="modal-body">
                                    <form id="resultForm" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <textarea class="form-control" name="description" id="description" rows="2">text</textarea>
                                    <label class="form-label" for="textAreaExample6"></label>
                                    <div class="form-group">
                                       <div class="custom-file">
                                          <input type="file"  name="attachment[]"  class="custom-file-input" id="customFile">
                                          <label class="custom-file-label" for="customFile"></label>
                                       </div>
                                    </div>
                                     <input type="hidden" id="hiddenId" name="hiddenId">
                                    <button type="button" onclick="submit_result()" class="btn btn-primary">Save</button>
                                    </form>

                                    <table id="efile" class="table table-striped table-bordered mt-3" style="width:100%">
                                       <thead>
                                          <tr style="background-color: #be1e2d;">
                                             <th width="45%">File Name</th>
                                             <th width="25%">Uploaded By</th>
                                             <th width="25%">Uploaded On</th>
                                             <th width="5%">Action</th>
                                         </tr>
                                       </thead>
                                       <tbody id="table_row_data"> 
                                         
                                       </table>
                                 </div>
                                 
                                 <!-- Modal footer -->
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 </div>
                                 
                              </div>
                              </div>
                           </div>


      <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
      <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>

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
            $('#documentsData'+id).append(data.data);
             $('#table_row_data').prepend(data.table_data);
         
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