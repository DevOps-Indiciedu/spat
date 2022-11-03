@if(Auth::user()->usermanagement->belong_to == 1)
<div class="modal fade" id="evidencemodal" style="z-index: 99999999;">
      <div class="modal-dialog modal-lg">
      <div class="modal-content" style="border: 2px solid #be1e2d;box-shadow: 2px 2px 16px 4px #4040404d;">
      
         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Evidence Uploading</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         
         <!-- Modal body -->
         <div class="modal-body">
            <form id="resultForm" method="POST" enctype="multipart/form-data">
               @csrf
               
               <label class="form-label" for="fileDesc">File Description</label>
                <div class="form-group">
                    <input type="textarea" class="form-control" name="file_description" id="file_description">
                </div>
                  <label class="form-label" for="textAreaExample6">Upload Files</label>
                  <div class="form-group">
                     <!-- <div class="custom-file"> -->
                        <input type="file"  name="attachment[]" class="form-control" id="customFile" style="line-height:25px;">
                        <span id="attachErr" class="text-danger"></span>
                        <input type="hidden" name="type" id="eviType">
                        <!-- <label class="custom-file-label" for="customFile"></label> -->
                     <!-- </div> -->
                  </div>
                    <!-- <style>
                        .note-editable{
                            height: 150px;
                        }
                    </style>
                    <label for="description">Observation</label>
                    <textarea class="form-control textarea" name="description" id="description" height="500"></textarea>
                    <br>
                    <label for="action">Actions</label>
                    <textarea class="form-control textarea" name="action" id="action" rows="2"></textarea>
                    <input type="hidden" name="priority" id="priority" value="1">
                    <span class="text-danger" id="statusErr"></span>
                    <br> -->
               <input type="hidden" id="hiddenId" name="hiddenId">
               <button type="button" onclick="submit_result()" class="btn btn-danger">Save</button>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#searchmodal" style="float:right;margin-bottom:10px">Previous Documents</button>
            </form>

            <table id="efile" class="table table-striped table-bordered mt-3" style="width:100%">
               <thead style="background-color: #be1e2d;">
                     <th width="45%">File Name</th>
                     <th width="25%">Uploaded By</th>
                     <th width="25%">Uploaded On</th>
                     <th width="5%">Action</th>
               </thead>
               <tbody id="table_row_data"></tbody>   
            </table>

         </div>
         
         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
         
      </div>
      </div>
   </div>
   @endif

   <div class="modal fade" id="auditorObservation">
      <div class="modal-dialog modal-xl">
        <div class="modal-content" style="width: 120%;left: -10%;">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Auditor Observation</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body" id="auditorObservationData">
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
   </div>

   <div class="modal fade" id="searchmodal" style="z-index: 99999999;">
      <div class="modal-dialog modal-lg">
      <div class="modal-content" style="border: 2px solid #be1e2d;box-shadow: 2px 2px 16px 4px #4040404d;">
      
         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Search Previous Documents</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         
         <!-- Modal body -->
         <div class="modal-body">
             <form id="searchForm" method="POST" enctype="multipart/form-data">
                 @csrf
                 <input type="text" placeholder="Search here" oninput="search_document($(this).val())" class="form-control" >
               
            <table id="efile" class="table table-striped table-bordered mt-3" style="width:100%">
               <thead style="background-color: #be1e2d;">
                     <th width="45%">File Description</th>
                     <th width="45%">File Link</th>
                     <th width="5%">Action</th>
               </thead>
               <tbody id="search_table_row_data"></tbody>   
            </table>
           
               <input type="hidden" id="hiddenId2" name="hiddenId">
               <button type="button" onclick="submit_selected()" class="btn btn-danger">Save</button>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </form>
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
            @if(Auth::user()->usermanagement->role_id == 2)
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            @endif
         </div>
         
      </div>
      </div>
   </div>

   @if(Auth::user()->usermanagement->belong_to == 2)
   <div class="modal fade" id="evidencemodal_details" style="    z-index: 99999999;">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border: 2px solid #be1e2d;box-shadow: 2px 2px 16px 4px #4040404d;">
            <div class="modal-header">
                <h4 class="modal-title">Add Observation</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form id="resultForm_details" method="POST" enctype="multipart/form-data">
                @csrf
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
                        <input type="hidden" name="priority" id="priority" value="1">
                        <span class="text-danger" id="statusErr"></span>
                        <br>
                <input type="hidden" id="hiddenId_details" name="hiddenId">
                <input type="hidden" id="hiddenElId" name="hiddenElId">
                <button type="button" onclick="submit_result_details()" class="btn btn-danger">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
      </div>
   </div>
   @endif

    <div class="modal fade" id="doc_type_modal" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="border: 2px solid #be1e2d;box-shadow: 2px 2px 16px 4px #4040404d;">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Select Document Type</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <form id="resultForm_doc_type" method="POST" enctype="multipart/form-data">
                    @csrf
                    {!!  get_Doc_type_Options() !!}
                    <input type="hidden" id="hiddenElId_doc_type" name="hiddenElId">
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" onclick="submit_result_doc_type()" class="btn btn-danger">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

   <!-- Audit Observation -->
    <div class="modal fade" id="auditObservation">
        <div class="modal-dialog modal-md">
            <div class="modal-content" style="width: 120%;left: -10%;">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Audit Assessment</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="auditObservationForm" method="post">
                @csrf
                <!-- Modal body -->
                <div class="modal-body" id="auditObservationData">
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea name="audit_comment" id="comment" class="form-control" rows="4"></textarea>
                        <span class="text-danger" id="commentErr"></span>
                    </div>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">  
                    <input type="hidden" id="auditID" name="auditID">
                    <input type="hidden" id="auditType" name="observation_type">
                    <input type="hidden" id="updateType" name="updateType">
                    
                    <button type="submit" class="btn btn-danger">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>
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
                    $('#table_row_data').html(data.table_data);

                    setTimeout(function() { 
                        // location.reload();
                        Swal.fire(
                            'Uploaded!',
                            'Your Document Has Been Uploaded.',
                            'success'
                        );
                    }, 1500);

                    setTimeout(function() { 
                        location.reload();
                    }, 2000);

                },error:function(err){
                    $("#attachErr").text(err.responseJSON.errors.attachment);
                    $("#statusErr").text(err.responseJSON.errors.priority);
                    
                }
            });
       
    }

   function submit_result_details()
   {
    var id = $('#hiddenId_details').val();
    
    $.ajax({
        url:"{{ route('submit_requirement_result_details') }}",
        type : 'POST',
        data:new FormData($('#resultForm_details')[0]),
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
            $('#resultForm_details')[0].reset();
           
            setTimeout(function() { 
                location.reload();
            }, 2000);
         },error:function(err){
            $("#attachErr").text(err.responseJSON.errors.description);
            $("#statusErr").text(err.responseJSON.errors.action);
            
         }
    });
   }

   function submit_result_doc_type()
   {
    var id = $('#hiddenElId_doc_type').val();
    
    $.ajax({
        url:"{{ route('submit_doc_type') }}",
        type : 'POST',
        data:new FormData($('#resultForm_doc_type')[0]),
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
            $('#resultForm_doc_type')[0].reset();
           
            setTimeout(function() { 
                location.reload();
            }, 2000);
         },error:function(err){
            $("#attachErr").text(err.responseJSON.errors.description);
            $("#statusErr").text(err.responseJSON.errors.action);
            
         }
    });
   }
   function set_id_doc_type(id)
{
    $("#hiddenElId_doc_type").val(id);
     $('.select2').select2();
     $('.select2').css("width","100%");
   
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
function set_id(id,type)
{
   $("#hiddenId").val(id);
   $("#eviType").val(type);
    @if(Auth::user()->usermanagement->role_id == 2)
        get_prev_uploaded_files();
    @elseif(Auth::user()->usermanagement->role_id == 3)
        observationActionEdit();
    @endif
    $('#description').summernote();
    $('#action').summernote();
}

function set_id_details(id,el_id)
{
    $("#hiddenElId").val(el_id);
    $("#hiddenId_details").val(id);
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

// Approve Clouse 
$(".approveClouse").on('click',function(){
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to approve this clouse",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
        }).then((result) => {
        if (result.isConfirmed) {
            // var id = $(this).attr('data-id');
            var evaluation_id = $(this).attr('data-evaluation-id');
            $.ajax({
                url:"{{ route('approve_clouse') }}",
                type : 'POST',
                data:{
                    "_token": "{{ csrf_token() }}",
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
                            'This Clouse Has Been Approved.',
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

$(".auditorObservation").on('click',function(){
    var id = $(this).data('id');
    var rid = $(this).data('rid');
    $.ajax({
        url:"{{ url('auditor_observations') }}/"+id+"/"+rid,
        type : 'GET',
        success:function(data) {
            // Loader Hide 
            $("#form_loader").hide();
            $("#auditorObservationData").html(data);
        }
    });
});

function search_document(val)
{
    if(val != ""){
        $.ajax({
            url:"{{ route('search_document') }}",
            type : 'POST',
            data:{
                "_token": "{{ csrf_token() }}",
                'value':val
            },
            dataType: 'text',
            success:function(data) {
                $('#search_table_row_data').prepend(data);
            },error:function(err){
                alert("Search error");   
            }
        });
    }else{
        $('#search_table_row_data').html("");
    }
}

function submit_selected()
{
    var id = $('#hiddenId').val();
    $('#hiddenId2').val(id);
        $.ajax({
            url:"{{ route('submit_search_selected') }}",
            type : 'POST',
            data:new FormData($('#searchForm')[0]),
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
                $('#searchForm')[0].reset();
            
            
                setTimeout(function() { 
                    location.reload();
                }, 2000);
            },error:function(err){
                $("#attachErr").text(err.responseJSON.errors.attachment);
                $("#statusErr").text(err.responseJSON.errors.priority);
            }
        });
   
}
function viewHistory(id)
{
    collapseID = $(id).attr('data-collapse-id');
    $('#collapse-'+collapseID).slideToggle('slow');
    btnTxt = $(id).find("b").text();
    if(btnTxt == "View History")
    {
        $(id).find("b").text('Hide History');
        $(id).find("i").removeClass('fa-angle-down');
        $(id).find("i").addClass('fa-angle-up');
    }else{
        $(id).find("b").text('View History');
        $(id).find("i").removeClass('fa-angle-up');
        $(id).find("i").addClass('fa-angle-down');
    }
}


$(".auditObservationRadio").on('click',function(e){
    if ($(this).is(':checked')) {
        id = $(this).data('id');
        val = $(this).val();
        if($(this).attr('data-update') == "1"){
            updt = $(this).attr('data-update');
        }else{
            updt = "";
        }
        if(val == '3' || val == '5')
        {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to reject this clouse",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    var evaluation_id = $(this).attr('data-evaluation-id');
                    $.ajax({
                        url:"{{ route('audit_observation_submit') }}",
                        type : 'POST',
                        dataType : 'json',
                        data:{
                            "_token": "{{ csrf_token() }}",
                            'auditID'  : id,
                            'observation_type' : val,
                            'update' : updt,
                        },
                        success:function(data) {
                            if(data.code == 200){
                                if(val == '5')
                                {
                                    Swal.fire(
                                        'Not In Placed',
                                        'This Clouse Has Been Marked Not in Placed.',
                                        'success'
                                    );
                                }else{
                                    Swal.fire(
                                        'Not Applicable!',
                                        'This Clouse Has Been Marked Not Applicable.',
                                        'success'
                                    );
                                }
                                
                                setTimeout(function() { 
                                    location.reload();
                                }, 1000);
                            }
                        }
                    });
                }
            });
        }else{
            $("#auditObservation").modal('show');
            $("#auditID").val(id);
            $("#auditType").val(val);
            $("#updateType").val(updt);
        }
    }
});
$(".modal").on('submit','#auditObservationForm',function(e){
    e.preventDefault();
    $.ajax({
        url:"{{ route('audit_observation_submit') }}",
        type : 'POST',
        data:new FormData($('#auditObservationForm')[0]),
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
            $('#auditObservationForm')[0].reset();
            setTimeout(function() { 
                location.reload();
            }, 2000);
         },error:function(err){
            $("#commentErr").text(err.responseJSON.errors.audit_comment);
         }
    });
});

// jQuery(".reUploadBtn").on('click',function(){
//     var type = $(this).attr('data-type');
//     $("#eviType").val(type);
// });

</script>