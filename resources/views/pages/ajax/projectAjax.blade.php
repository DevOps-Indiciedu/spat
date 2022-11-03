<!-- Modal  -->
<div id="exampleModalCenteredScrollable" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">{{ __('Add Project') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <form method="POST" id="projectForm">
            @csrf
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="project_title">Project Title</label>
                        <input type="text" class="form-control" id="project_title" name="project_title">
                        <span class="text-danger" id="projectTitleErr"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="company_standard_id">Standard</label>
                        {!! company_standards() !!}
                        <span class="text-danger" id="companyStandardsErr"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="company_id">Auditee</label>
                        {!! company_dropdown() !!}
                        <span class="text-danger" id="auditeeErr"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="auditee_location_id">Auditee Location</label>
                        <div id="auditee_location_data">
                            <select class="form-control">
                                <option value="">Select Location</option>
                            </select>
                        </div>
                        <span class="text-danger" id="auditeelocIDErr"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="assessor_id">Auditor Organisation</label>
                        {!! assessors() !!}
                        <span class="text-danger" id="auditorErr"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="assessor_location_data">Auditor Location</label>
                        <div id="assessor_location_data">
                            <select class="form-control">
                                <option value="">Select Location</option>
                            </select>
                        </div>
                        <span class="text-danger" id="auditeelocIDErr"></span>
                    </div>
                    <div class="col-md-12 mb-3 assessorLead">
                        <div id="users_data" class="row"></div>
                        <span class="text-danger" id="auditorIDErr"></span>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="start_date">Project Start Date</label>
                        <input type="date" class="form-control now_date" end-date="end_date" id="start_date" name="start_date">
                        <span class="text-danger" id="startdateErr"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="end_date">Project End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date">
                        <span class="text-danger" id="enddateErr"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="implement_start_date">Audit Start Date</label>
                        <input type="date" class="form-control now_date" end-date="implement_end_date" id="implement_start_date" name="implement_start_date">
                        <span class="text-danger" id="implementsdateErr"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="implement_end_date">Audit End Date</label>
                        <input type="date" class="form-control" id="implement_end_date" name="implement_end_date">
                        <span class="text-danger" id="implementedateErr"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="certificate_valid_from">Certification Valid From</label>
                        <input type="date" class="form-control now_date" end-date="certificate_valid_to" id="certificate_valid_from" name="certificate_valid_from">
                        <span class="text-danger" id="certivalidfromErr"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="certificate_valid_to">Certification Valid To</label>
                        <input type="date" class="form-control" id="certificate_valid_to" name="certificate_valid_to">
                        <span class="text-danger" id="certivalidtoErr"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="type_id">Auditee Type</label>
                        {!! auditeeType_dropdown() !!}
                        <span class="text-danger" id="typeErr"></span>
                    </div>
                    <input type="hidden" id="yesno_id" name="yesno_id" value="1">
                    <!-- <div class="col-md-6 mb-3"> -->
                        <!-- <label for="yesno_id">Project Plan Template</label> -->
                        <!-- {!! yesno_dropdown() !!} -->
                        <!-- <span class="text-danger" id="yesno_idErr"></span> -->
                    <!-- </div> -->
                </div>
            <!-- <div class="form-group">
                <label for="company">{{ __('Company') }}</label>
                <input type="text" class="form-control" id="company" name="company">
                <span class="text-danger" id="companyErr"></span>
            </div> -->
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary formBtn">{{ __('Save') }}</button>
                <input type="hidden" id="hiddenId" name="hiddenId">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Modal  -->
<div id="AddTaskProjectPlanning" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="AddTaskProjectPlanning" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="AddTaskProjectPlanning">{{ __('Add Task') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <form method="POST" id="addProjectTask">
            @csrf
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="task_title">Task Title</label>
                        <input type="text" class="form-control" id="task_title" name="task_title">
                        <span class="text-danger" id="taskTitleErr"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control" id="task_start_date" name="start_date">
                        <span class="text-danger" id="tstartdateErr"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="end_date">End Date</label>
                        <input type="date" class="form-control" id="task_end_date" name="end_date">
                        <span class="text-danger" id="tenddateErr"></span>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="department_id">{{ __('Department') }}</label>
                        {!! department_dropdown() !!}
                        <span class="text-danger" id="departErr"></span>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="user_id">{{ __('Assign To') }}</label>
                        <!-- {!! users_dropdown() !!} -->
                        <div id="depUsers_data">
                        <select class='form-control' name="user_id" id="user_id"><option value=''>Select User</option></select>
                        </div>
                        <span class="text-danger" id="assignErr"></span>
                    </div>
                    <!-- <div class="col-sm-6 mb-3">
                        <label for="user_id">{{ __('Responsible User') }}</label>
                        {!! users_dropdown() !!}
                        <span class="text-danger" id="assignErr"></span>
                    </div> -->
                    <div class="col-md-6 mb-3">
                        <label for="taskstatus">Status</label>
                        {!! taskStatus_dropdown() !!}
                        <!-- <select name="taskstatus" id="taskstatus" class="form-control">
                            <option value="0">Pending</option>
                            <option value="1">In Progress</option>
                            <option value="2">Completed</option>
                        </select> -->
                        
                        <span class="text-danger" id="taskstatusErr"></span>
                    </div>
                </div>
            <!-- <div class="form-group">
                <label for="company">{{ __('Company') }}</label>
                <input type="text" class="form-control" id="company" name="company">
                <span class="text-danger" id="companyErr"></span>
            </div> -->
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary formBtn">{{ __('Save') }}</button>
                <input type="hidden" id="hiddenTId" name="hiddenId">
                <input type="hidden" id="projectId" name="projectId" value="{{ Request::segment(2) }}">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Modal  -->
<div id="taskStatusUpdate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="taskStatusUpdate" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="taskStatusUpdate">{{ __('Task Status') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <form method="POST" id="taskStatusUpdtForm">
            @csrf
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="taskstatus">Status</label>
                        <select name="taskStatusUpdt" id="taskStatusUpdt" class="form-control">
                            <option value="0">Pending</option>
                            <option value="1">In Progress</option>
                            <option value="2">Completed</option>
                        </select>
                        
                        <span class="text-danger" id="taskStatusUpdtErr"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary formBtn">{{ __('Save') }}</button>
                <input type="hidden" id="statusId" name="statusId">
                <input type="hidden" id="projectId" name="projectId" value="{{ Request::segment(2) }}">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Company AJAX -->
<script type="text/javascript">

    jQuery(".delete_project").on('click',function(){
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
                    url:"{{ route('delete_project') }}",
                    type : 'POST',
                    data:{
                        "_token": "{{ csrf_token() }}",
                        'id' : id
                    },
                    success:function(data) {
                        if(data.code == 200){
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
                    }
                });
            }
        });
    });

    jQuery(".edit_project").on('click',function(){
        var id = $(this).attr('data-id');
        $.ajax({
            url:"edit_project/"+id,
            type : 'GET',
            dataType: 'json',
            success:function(data) {
                $("#company_standard_id").val(data[0].standard_id);
                $("#project_title").val(data[0].project_title);
                $("#company_id").val(data[0].auditee_id);
                $("#assessor_id").val(data[0].auditor_company);
                $("#start_date").val(data[0].project_start_date);
                $("#end_date").val(data[0].project_end_date);
                $("#implement_start_date").val(data[0].implement_start_date);
                $("#implement_end_date").val(data[0].implement_end_date);
                $("#certificate_valid_from").val(data[0].certificate_valid_from);
                $("#certificate_valid_to").val(data[0].certificate_valid_to);
                $("#type").val(data[0].audit_type);
                $("#yesno_id").val(data[0].standard_template);
                $("#hiddenId").val(data[0].id);
                
                
                // Triggers 
                jQuery("#assessor_id").trigger('change');
                jQuery("#company_id").trigger('change');
                setTimeout(function() { 
                    $("[name='location_id']").val(data[0].auditee_location_id);
                    $("#assessor_location_id").val(data[0].auditor_location_id);
                    jQuery("#assessor_location_id").trigger('change');
                    
                }, 500);
                setTimeout(function() {
                    if(data[0].auditor_id == data[0].auditor_qa_id)
                    {
                        $("#same_qa").prop('checked', true);
                        $("#auditor_qa_id").attr('disabled','disabled');
                    }
                    $("#auditor_id").val(data[0].auditor_id);
                    $("#auditor_qa_id").val(data[0].auditor_qa_id);
                },1000);

                $(".formBtn").text("Update Project");
                $(".modal-title").text("Update Project");
            }
        });
    });

    
    $(".modal").on('submit','#projectForm',function(e){
        e.preventDefault();
        $.ajax({
            url:"{{ route('add_project') }}",
            type : 'POST',
            data:new FormData(this),
            dataType: 'json',
            contentType: false,  
            cache: false,  
            processData:false,
            success:function(data) {
                $('#projectForm')[0].reset();
                Swal.fire({
                    position: 'top-mid',
                    icon: 'success',
                    title: 'Record Saved Successfully',
                    showConfirmButton: false,
                    timer: 2500
                });
                setTimeout(function() { 
                    location.reload();
                }, 2000);
            },error:function(err)
            {
                $("#companyStandardsErr").text(err.responseJSON.errors.company_standard_id);
                $("#projectTitleErr").text(err.responseJSON.errors.project_title);
                $("#auditeeErr").text(err.responseJSON.errors.company_id);
                $("#auditorErr").text(err.responseJSON.errors.assessor_id);
                $("#auditorIDErr").text(err.responseJSON.errors.auditor_id);
                $("#typeErr").text(err.responseJSON.errors.type);
                $("#yesno_idErr").text(err.responseJSON.errors.yesno_id);
                
                
            }
        });
    });

    $(".assessorLead").hide();
    // Get Company Locations 
    $(".modal").on('change','#assessor_location_id',function(e){
    // jQuery("#assessor_location_id").on('change',function(){
        var id = $(this).val();
        $(".assessorLead").show();
        if(id != ""){
            $.ajax({
                url:"get_users_by_auditor_company/"+id,
                type : 'GET',
                dataType: 'html',
                success:function(data) {
                    // Select Assessor Lead
                    $("#users_data").html(data);
                }
            });
        }else{
            $("#users_data").html("<select class='form-control'><option value=''>Select Auditor</option></select>");
        }
    });

    // Get Company Locations 
    jQuery("#company_id").on('change',function(){
        var id = $(this).val();
        var uid = $('option:selected', this).attr('data-u-id');
        if(id != ""){
            $.ajax({
                url:"get_locations_by_companyID/"+id+"/"+uid,
                type : 'GET',
                dataType: 'html',
                success:function(data) {
                    $("#auditee_location_data").html(data);
                }
            });
        }else{
            $("#loc_data").html("<select class='form-control'><option value=''>Select Location</option></select>");
        }
    });

    // Get Assessor Locations 
    jQuery("#assessor_id").on('change',function(){
        var id = $(this).val();
        var uid = $('option:selected', this).attr('data-u-id');
        if(id != ""){
            $.ajax({
                url:"get_locations_by_assessorID/"+id+"/"+uid,
                type : 'GET',
                dataType: 'html',
                success:function(data) {
                    $("#assessor_location_data").html(data);
                }
            });
        }else{
            $("#loc_data").html("<select class='form-control'><option value=''>Select Location</option></select>");
        }
    });

    $(".addProject").on('click',function(){
        jQuery("#company_id").trigger('change');
    });

    
    // $('[name="same_qa"]').change(function(){
    $(".modal").on('click','[name="same_qa"]',function(e){
        if ($(this).is(':checked')) {
            $("#auditor_qa_id").attr('disabled','disabled');
        }else{
            $("#auditor_qa_id").removeAttr('disabled');
        }
    });
    
    function pad2(n) {
        return (n < 10 ? '0' : '') + n;
    }

    $(".now_date").on('change',function(){
        // alert($(this).val());
        var now = $(this).val();
        var enddateClass = $(this).attr('end-date');
        const date = new Date(now);
        futureDate = new Date(date.setDate(date.getDate() + 365)).toLocaleDateString();
        edate = new Date(futureDate);
        edate_format = edate.getFullYear()+"-"+pad2((edate.getMonth()+1))+"-"+pad2(edate.getDate());
        $("#"+enddateClass).val(edate_format);
    });

    // $('#submit').prop("disabled", true);
    $('input:checkbox').click(function() {
        if ($(this).is(':checked')) {
            $('#savePlanning').prop("disabled", false);
        }else{
            $('#savePlanning').prop("disabled", true);
        }
    });
    
    $(".content-page").on('submit','#save_planning',function(e){
        e.preventDefault();
        $.ajax({
            url:"{{ route('save_planning') }}",
            type : 'POST',
            data:new FormData(this),
            dataType: 'json',
            contentType: false,  
            cache: false,  
            processData:false,
            success:function(data) {
                $('#save_planning')[0].reset();
                Swal.fire({
                    position: 'top-mid',
                    icon: 'success',
                    title: 'Record Saved Successfully',
                    showConfirmButton: false,
                    timer: 2500
                });
                setTimeout(function() { 
                    location.reload();
                }, 2000);
            },error:function(err)
            {
                // $("#companyStandardsErr").text(err.responseJSON.errors.company_standard_id);
            }
        });
    });

    $(".modal").on('submit','#addProjectTask',function(e){
        e.preventDefault();
        $.ajax({
            url:"{{ route('add_project_planning_task') }}",
            type : 'POST',
            data:new FormData(this),
            dataType: 'json',
            contentType: false,  
            cache: false,  
            processData:false,
            success:function(data) {
                $('#projectForm')[0].reset();
                Swal.fire({
                    position: 'top-mid',
                    icon: 'success',
                    title: 'Record Saved Successfully',
                    showConfirmButton: false,
                    timer: 2500
                });
                setTimeout(function() { 
                    location.reload();
                }, 2000);
            },error:function(err)
            {
                $("#taskTitleErr").text(err.responseJSON.errors.task_title);
                $("#tstartdateErr").text(err.responseJSON.errors.start_date);
                $("#tenddateErr").text(err.responseJSON.errors.end_date);
                $("#assignErr").text(err.responseJSON.errors.user_id);
                $("#taskstatusErr").text(err.responseJSON.errors.taskstatus_id); 
                $("#departErr").text(err.responseJSON.errors.department_id); 
                
            }
        });
    });

    function pad2(n) {
        return (n < 10 ? '0' : '') + n;
    }

    jQuery(".assignTask").on('click',function(){
        var id = $(this).attr('data-id');
        $.ajax({
            url:"{{ url('getTaskdata') }}/"+id,
            type : 'GET',
            dataType: 'json',
            success:function(data) {
                console.log(data);
                $("#hiddenTId").val(data[0].id);
                $("#task_title").val(data[0].template_name);
                $("#department_id").val(data[0].department_id);
                
                sdate = new Date(data[0].start_date);
                sdate_format = sdate.getFullYear()+"-"+pad2((sdate.getMonth()+1))+"-"+pad2(sdate.getDate());
                edate = new Date(data[0].end_date);
                edate_format = edate.getFullYear()+"-"+pad2((edate.getMonth()+1))+"-"+pad2(edate.getDate());
                if(data[0].start_date == null)
                {
                    $("#task_start_date").val("");
                }else{
                    $("#task_start_date").val(sdate_format);
                }
                if(data[0].start_date == null)
                {
                    $("#task_end_date").val("");
                }else{
                    $("#task_end_date").val(edate_format);
                }
                // $("#start_date").val(data[0].start_date);
                // $("#end_date").val(data[0].end_date);
                $("#user_id").val(data[0].responsible_user);
                $("#taskstatus_id").val(data[0].status);
                jQuery("#department_id").trigger('change');
                setTimeout(function() { 
                    $("#user_id").val(data[0].responsible_user);
                }, 500);
                $(".formBtn").text("Update");
                $(".modal-title").text("Update Task");
            }
        });
    });
    
    jQuery(".taskDelete").on('click',function(){
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to be delete this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                var id = $(this).attr('data-id');
                $.ajax({
                    url:"{{ route('task_delete') }}",
                    type : 'POST',
                    data:{
                        "_token": "{{ csrf_token() }}",
                        'id' : id
                    },
                    success:function(data) {
                        if(data.code == 200){
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
                    }
                });
            }
        });
    });

    $(".task_status").on('click',function(){
        id = $(this).data('id');
        status = $(this).data('status');
        $("#taskStatusUpdt").val(status);
        $("#statusId").val(id);
    });

    $(".modal").on('submit','#taskStatusUpdtForm',function(e){
        e.preventDefault();
        $.ajax({
            url:"{{ route('task_status_update') }}",
            type : 'POST',
            data:new FormData(this),
            dataType: 'json',
            contentType: false,  
            cache: false,  
            processData:false,
            success:function(data) {
                // $('#projectForm')[0].reset();
                Swal.fire({
                    position: 'top-mid',
                    icon: 'success',
                    title: 'Status Update Successfully',
                    showConfirmButton: false,
                    timer: 2500
                });
                setTimeout(function() { 
                    location.reload();
                }, 2000);
            },error:function(err)
            {
                $("#taskStatusUpdtErr").text(err.responseJSON.errors.taskStatusUpdt);
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
