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
               @if(Auth::user()->usermanagement->role_id == 2)
                  <label class="form-label" for="textAreaExample6">Upload Files</label>
                  <div class="form-group">
                     <!-- <div class="custom-file"> -->
                        <input type="file"  name="attachment[]" class="form-control" id="customFile" style="line-height:25px;">
                        <span id="attachErr" class="text-danger"></span>
                        <!-- <label class="custom-file-label" for="customFile"></label> -->
                     <!-- </div> -->
                  </div>
               @elseif(Auth::user()->usermanagement->role_id == 3)
                    <style>
                        .note-editable{
                            height: 150px;
                        }
                    </style>
                    <label for="description">Observation</label>
                    <textarea class="form-control textarea" name="description" id="description" height="500"></textarea>
                    <br>
                    <label for="action">Actions</label>
                    <textarea class="form-control textarea" name="action" id="action" rows="2"></textarea>
                    <br>
                    <label for="priority">{{ __('Priority') }}</label>
                    {!! priority_dropdown() !!}
                    <span class="text-danger" id="statusErr"></span>
                    <br>
               @endif
               <input type="hidden" id="hiddenId" name="hiddenId">
               <button type="button" onclick="submit_result()" class="btn btn-danger">Save</button>
            </form>

            @if(Auth::user()->usermanagement->role_id == 2)
            <table id="efile" class="table table-striped table-bordered mt-3" style="width:100%">
               <thead style="background-color: #be1e2d;">
                     <th width="45%">File Name</th>
                     <th width="25%">Uploaded By</th>
                     <th width="25%">Uploaded On</th>
                     <th width="5%">Action</th>
               </thead>
               <tbody id="table_row_data"></tbody>   
            </table>
            @endif

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
            if(data.code == 200)
            {
                Swal.fire(
                    'Success!',
                    'Data Saved Successfully',
                    'success'
                );
            }
            $('#resultForm')[0].reset();
            $('#documentsData'+id).append(data.data);
            $('#table_row_data').prepend(data.table_data);
         },error:function(err){
            $("#attachErr").text(err.responseJSON.errors.attachment);
            $("#statusErr").text(err.responseJSON.errors.priority);
            
         }
    });
   }

   function get_prev_uploaded_files()
   {
      var id = $('#hiddenId').val();
   //  alert(id);
      $.ajax({
         url:"{{ route('get_prev_uploaded_files') }}",
         type : 'POST',
         data:{
            "_token": "{{ csrf_token() }}",
            'id' : id
         },
         dataType: 'json',
         success:function(data) {
            // $('#documentsData'+id).append(data.data);
             $('#table_row_data').html(data.table_data);
         },error:function(err)
         {
         //   alert(err.data);
         }
      });
   }
function set_id(id)
{
   $("#hiddenId").val(id);
   @if(Auth::user()->usermanagement->role_id == 2)
   get_prev_uploaded_files();
   @elseif(Auth::user()->usermanagement->role_id == 3)
   observationActionEdit();
   @endif
    $('#description').summernote();
    $('#action').summernote();
}

function observationActionEdit()
{
    var id = $('#hiddenId').val();
    $.ajax({
        url:"{{ url('observation_action_edit') }}/"+id,
        type : 'GET',
        dataType: 'json',
        success:function(data) {
            // Loader Hide 
            $("#form_loader").hide();
            $('#description').summernote('code',data[0].description);
            $('#action').summernote('code',data[0].action);
            $("#priority").val(data[0].severity);
        }
    });
}

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

$(".modal").on('click','.delete_observation_image',function(){
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            var id = $(this).attr('data-id');
            $.ajax({
                url:"{{ route('delete_observation_image') }}",
                type : 'POST',
                data:{
                    "_token": "{{ csrf_token() }}",
                    'id' : id
                },
                success:function(data) {
                    if(data.code == 200){
                        $(".rowImage-"+id).css({"background-color": "#dc3545", "color": "white"});
                        setTimeout(function() { 
                            $(".rowImage-"+id).remove();
                            Swal.fire(
                                'Deleted!',
                                'Your record has been deleted.',
                                'success'
                            );
                        }, 1000);
                    }
                }
            });
        }
    });
});

// Approve Documents 
$(".approve_document").on('click',function(){
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to approve this file",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
        }).then((result) => {
        if (result.isConfirmed) {
            var id = $(this).attr('data-id');
            var evaluation_id = $(this).attr('data-evaluation-id');
            $.ajax({
                url:"{{ route('approve_document') }}",
                type : 'POST',
                data:{
                    "_token": "{{ csrf_token() }}",
                    'id' : id,
                    'evaluation_id' : evaluation_id
                },
                success:function(data) {
                    if(data.code == 200){
                        // Swal.fire({
                        //     position: 'top-mid',
                        //     icon: 'Approved',
                        //     title: 'this file has been approved',
                        //     showConfirmButton: false,
                        //     timer: 2500
                        // });
                        Swal.fire(
                            'Approved!',
                            'This File Has Been Approved.',
                            'success'
                        );
                        setTimeout(function() { 
                            location.reload();
                        }, 1000);
                    }
                }
            });
        }
    });
});
</script>