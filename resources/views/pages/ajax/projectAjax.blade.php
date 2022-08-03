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
                        <label for="assessor_id">Auditor Company</label>
                        {!! assessors() !!}
                        <span class="text-danger" id="auditorErr"></span>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="auditor_id">Auditor</label>
                        <div id="users_data"></div>
                        <span class="text-danger" id="auditorIDErr"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="start_date">Project Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date">
                        <span class="text-danger" id="startdateErr"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="end_date">Project End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date">
                        <span class="text-danger" id="enddateErr"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="implement_start_date">Implementation Start Date</label>
                        <input type="date" class="form-control" id="implement_start_date" name="implement_start_date">
                        <span class="text-danger" id="implementsdateErr"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="implement_end_date">Implementation End Date</label>
                        <input type="date" class="form-control" id="implement_end_date" name="implement_end_date">
                        <span class="text-danger" id="implementedateErr"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="certificate_valid_from">Certification Valid From</label>
                        <input type="date" class="form-control" id="certificate_valid_from" name="certificate_valid_from">
                        <span class="text-danger" id="certivalidfromErr"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="certificate_valid_to">Certification Valid To</label>
                        <input type="date" class="form-control" id="certificate_valid_to" name="certificate_valid_to">
                        <span class="text-danger" id="certivalidtoErr"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="type_id">Auditee type</label>
                        {!! auditeeType_dropdown() !!}
                        <span class="text-danger" id="typeErr"></span>
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
                <input type="hidden" id="hiddenId" name="hiddenId">
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
                $("#hiddenId").val(data[0].id);
                
                // Triggers 
                jQuery("#assessor_id").trigger('change');
                setTimeout(function() { 
                    $("#auditor_id").val(data[0].auditor_id);
                }, 500);

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
                
            }
        });
    });

    // Get Company Locations 
    jQuery("#assessor_id").on('change',function(){
        var id = $(this).val();
        if(id != ""){
            $.ajax({
                url:"get_users_by_auditor_company/"+id,
                type : 'GET',
                dataType: 'html',
                success:function(data) {
                    $("#users_data").html(data);
                }
            });
        }else{
            $("#users_data").html("<select class='form-control'><option value=''>Select Auditor</option></select>");
        }
    });


  
</script>
