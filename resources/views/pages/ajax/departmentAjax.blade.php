<!-- Modal  -->
<div id="exampleModalCenteredScrollable" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">{{ __('Add Department') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <form id="departmentForm" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="role">{{ __('Company') }}</label>
                    {!! company_dropdown() !!}
                    <span class="text-danger" id="companyErr"></span>
                </div>
                <div class="form-group">
                    <label for="role">{{ __('Location') }}</label>
                    <div id="loc_data">
                    <select class='form-control'><option value=''>Select Location</option></select>
                    </div>
                    <span class="text-danger" id="locationErr"></span>
                </div>
                <div class="form-group">
                    <label for="department">{{ __('Depart Name') }}</label>
                    <input type="text" class="form-control" id="department" name="department">
                    <span class="text-danger" id="departmentErr"></span>
                </div>
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

<!-- Department AJAX -->
<script type="text/javascript">
        
    jQuery(".delete_department").on('click',function(){
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
                    url:"{{ route('delete_department') }}",
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
        // }else{
        //     return false;
        // }
    });

    jQuery(".edit_department").on('click',function(){
        var id = $(this).attr('data-id');
        $.ajax({
            url:"edit_department/"+id,
            type : 'GET',
            dataType: 'json',
            success:function(data) {
                $("#department").val(data.department);
                $("#companyErr").text(data.company_id);
                $("#locationErr").text(data.location_id);
                $("#hiddenId").val(data.id);

                $(".formBtn").text("Update Department");
                $(".modal-title").text("Update Department");
            }
        });
    });

    $(".modal").on('submit','#departmentForm',function(e){
        e.preventDefault();
        $.ajax({
            url:"{{ route('add_department') }}",
            type : 'POST',
            data:new FormData(this),
            dataType: 'json',
            contentType: false,  
            cache: false,  
            processData:false,
            success:function(data) {
                $('#departmentForm')[0].reset();
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
                $("#departmentErr").text(err.responseJSON.errors.department);
                $("#companyErr").text(err.responseJSON.errors.company_id);
                $("#locationErr").text(err.responseJSON.errors.location_id);
            }
        });
    });

    // Get Company Locations 
    jQuery("#company_id").on('change',function(){
        var id = $(this).val();
        if(id != ""){
            $.ajax({
                url:"get_locations_by_companyID/"+id,
                type : 'GET',
                dataType: 'html',
                success:function(data) {
                    $("#loc_data").html(data);
                }
            });
        }else{
            $("#loc_data").html("<select class='form-control'><option value=''>Select Location</option></select>");
        }
    });
     
</script>