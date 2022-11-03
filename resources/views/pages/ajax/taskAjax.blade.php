<!-- Modal  -->
<div id="ObservationTaskModal" class="modal fade" tabindex="-1" role="dialog" style="z-index: 9999999;" aria-labelledby="ObservationTaskModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" style="border: 2px solid #be1e2d;box-shadow: 2px 2px 16px 4px #4040404d;">
        <div class="modal-header">
            <h5 class="modal-title" id="ObservationTaskModalTitle">{{ __('Add Task') }}</h5>
            <button type="button" class="close" onclick="FormClear('taskForm')" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <form id="taskForm" method="POST">
            @csrf
            <div class="modal-body row">
                <div class="form-group col-sm-6">
                    <label for="project_id">{{ __('Project') }}</label>
                    {!! projects_dropdown() !!}
                    <!-- <select name="project_id" id="project_id" class="form-control">
                        <option value="">Select Project</option>
                        <option value="1">A formal process for approving and testing all network connections</option>
                        <option value="2">Examine documented procedures to verify there is a formal process for testing</option>
                        <option value="3">Testing and approval of all changes to firewall and router configurations.</option>
                        <option value="4">Identify the sample of records for network connections that were selected for this testing procedure.</option>
                    </select> -->
                    <!-- {!! company_dropdown() !!} -->
                    <span class="text-danger" id="projectErr"></span>
                </div>
                <div class="form-group col-sm-6">
                    <label for="title">{{ __('Title') }}</label>
                    <input type="text" class="form-control" id="title" name="title">
                    <span class="text-danger" id="titleErr"></span>
                </div>
                <div class="form-group col-sm-6">
                    <label for="start_datetime">{{ __('Start Date Time') }}</label>
                    <input type="date" class="form-control" id="start_datetime" name="start_datetime">
                    <span class="text-danger" id="start_datetimeErr"></span>
                </div>
                <div class="form-group col-sm-6">
                    <label for="end_datetime">{{ __('End Date Time') }}</label>
                    <input type="date" class="form-control" id="end_datetime" name="end_datetime">
                    <span class="text-danger" id="end_datetimeErr"></span>
                </div>
                <div class="form-group col-sm-6">
                    <label for="department_id">{{ __('Department') }}</label>
                    {!! department_dropdown() !!}
                    <span class="text-danger" id="departErr"></span>
                </div>
                <div class="form-group col-sm-6">
                    <label for="phone">{{ __('Assign To') }}</label>
                    <!-- {!! users_dropdown() !!} -->
                    <div id="depUsers_data">
                    <select class='form-control' name="user_id" id="user_id"><option value=''>Select User</option></select>
                    </div>
                    <span class="text-danger" id="assignErr"></span>
                </div>
                <!-- <div class="form-group col-sm-4">
                    <label for="phone">{{ __('Priority') }}</label>
                    {!! priority_dropdown() !!}
                    <span class="text-danger" id="priorityErr"></span>
                </div> -->
                <!-- <div class="form-group col-sm-4">
                    <label for="phone">{{ __('Status') }}</label>
                    {!! taskStatus_dropdown() !!}
                    <span class="text-danger" id="statusErr"></span>
                </div> -->
                <div class="form-group col-sm-12">
                    <label for="phone">{{ __('Description') }}</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary formBtn">{{ __('Save') }}</button>
                <input type="hidden" id="TaskhiddenId" name="hiddenId">
                <input type="hidden" id="reqId" name="reqId">
                <button type="button" class="btn btn-secondary" onclick="FormClear('taskForm')" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Modal  -->
<div id="taskDetails" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="taskDetails" aria-hidden="true" >
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" style="border: 2px solid #be1e2d;box-shadow: 2px 2px 16px 4px #4040404d;">
        <div class="modal-header">
            <h5 class="modal-title" id="taskDetails">{{ __('Task Details') }}</h5>
            <button type="button" class="close" onclick="FormClear('taskForm')" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <!-- <form id="taskForm" method="POST"> -->
            @csrf
            <div class="modal-body row">
                <table class="table table-bordered">
                    <thead class="bg-danger">
                        <th>#</th>
                        <th>Assign To</th>
                        <th>Task Title</th>
                        <th>Assign Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody id="TaskDetailsData">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-primary formBtn">{{ __('Save') }}</button> -->
                <!-- <input type="hidden" id="hiddenId" name="hiddenId"> -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
        <!-- </form> -->
        </div>
    </div>
</div>


<!-- Location AJAX -->
<script type="text/javascript">
        
    jQuery(".delete_task").on('click',function(){
        // if (confirm("Are you sure")) {
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
                    url:"{{ route('delete_task') }}",
                    type : 'POST',
                    data:{
                        "_token": "{{ csrf_token() }}",
                        'id' : id
                    },
                    success:function(data) {
                        $("#row-"+id).css({"background-color": "#dc3545", "color": "white"});
                        setTimeout(function() { 
                            $("#row-"+id).remove();
                            Swal.fire(
                                'Deleted!',
                                'Your record has been deleted.',
                                'success'
                            );
                        }, 2000);
                        
                    }
                });
            }
        });    
        // }else{
        //     return false;
        // }
    });

    function pad2(n) {
        return (n < 10 ? '0' : '') + n;
    }

    $(".content-page").on('click','.edit_task',function(){
    // jQuery(".edit_task").on('click',function(){
        var id = $(this).attr('data-id');
        var rid = $(this).attr('data-req-id');
        $.ajax({
            url:"{{ url('edit_task') }}/"+id,
            type : 'GET',
            dataType: 'json',
            success:function(data) {
                // $('#project_id option:not(:selected)').attr('disabled', true);
                $('#project_id').attr("style", "pointer-events: none;");

                $("#TaskhiddenId").val(data[0].id);
                $("#reqId").val(rid);
                $("#project_id").val(data[0].project_id);
                $("#title").val(data[0].task_title);

                sdate = new Date(data[0].start_datetime);
                sdate_format = sdate.getFullYear()+"-"+pad2((sdate.getMonth()+1))+"-"+pad2(sdate.getDate());

                edate = new Date(data[0].end_datetime);
                edate_format = edate.getFullYear()+"-"+pad2((edate.getMonth()+1))+"-"+pad2(edate.getDate());

                $("#start_datetime").val(sdate_format);
                $("#end_datetime").val(edate_format);
                $("#department_id").val(data[0].department_id);
                $("#priority").val(data[0].priority);
                $("#taskstatus_id").val(data[0].status);
                $("#description").val(data[0].task_des);

                jQuery("#department_id").trigger('change');
                setTimeout(function() { 
                    $("#user_id").val(data[0].assign_to);
                }, 500);
                
                $(".formBtn").text("Update Task");
                $(".modal-title").text("Update Task");
            }
        });
    });

    $("#ObservationTaskModal").on('submit','#taskForm',function(e){
        e.preventDefault();
        $.ajax({
            url:"{{ route('add_task') }}",
            type : 'POST',
            data:new FormData(this),
            dataType: 'json',
            contentType: false,  
            cache: false,  
            processData:false,
            success:function(data) {
                $('#taskForm')[0].reset();
                Swal.fire({
                    position: 'top-mid',
                    icon: 'success',
                    title: 'Record Saved Successfully',
                    showConfirmButton: false,
                    timer: 2500
                });
                setTimeout(function() { 
                    if($("#TaskhiddenId").val() == "")
                    {
                        location.reload();
                    }else{
                        location.reload();
                        // $('#ObservationTaskModal').modal('hide');
                    }
                }, 2000);
            },error:function(err)
            {
                $("#projectErr").text(err.responseJSON.errors.project_id);
                $("#titleErr").text(err.responseJSON.errors.title);
                $("#start_datetimeErr").text(err.responseJSON.errors.start_datetime);
                $("#end_datetimeErr").text(err.responseJSON.errors.end_datetime);
                $("#assignErr").text(err.responseJSON.errors.user_id);
                $("#priorityErr").text(err.responseJSON.errors.priority);
                $("#statusErr").text(err.responseJSON.errors.taskstatus_id);
                $("#departErr").text(err.responseJSON.errors.department_id); 
            }
        });
    });

    $(".addTask").on("click",function(){
        $('#TaskhiddenId').val('');
        // jQuery("#department_id").trigger('change');
        var pid = $(this).attr('data-project-id');
        var rid = $(this).attr('data-req-id');
        $("#project_id").val(pid);
        $("#reqId").val(rid);
        // $("#project_id").attr('readonly');
        $('#project_id option:not(:selected)').attr('disabled', true);
        $('#project_id').attr("style", "pointer-events: none;");
    });

    jQuery(".viewTaskDetails").on('click',function(){
        var id = $(this).attr('data-project-id');
        var rid = $(this).attr('data-req-id');
        $.ajax({
            url:"{{ url('view_task_details') }}/"+id+"/"+rid,
            type : 'GET',
            dataType: 'html',
            success:function(data) {
                // Loader Hide 
                $("#form_loader").hide();
                $("#TaskDetailsData").html(data);
            }
        });
    });

    
    // Get Users 
    $(".modal").on('change','#department_id',function(){
        var dep_id = $(this).val();
        // if(dep_id != ""){
            $.ajax({
                url:"{{ url('get_users_by_depId') }}/"+dep_id,
                type : 'GET',
                dataType: 'html',
                success:function(data) {
                    $("#depUsers_data").html(data);
                }
            });
        // }else{
        //     $("#depUsers_data").html("<select class='form-control'><option value=''>Select User</option></select>");
        // }
    });


     
</script>