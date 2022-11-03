<!-- Modal  -->
<div id="exampleModalCenteredScrollable" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">{{ __('Add User') }}</h5>
            <button type="button" onclick="FormClear('userForm')" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <form id="userForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body row">
                <div class="form-group col-sm-6">
                    <label for="name">{{ __('Name') }}</label>
                    <input type="text" class="form-control" id="name" name="name">
                    <span class="text-danger" id="nameErr"></span>
                </div>
                <div class="form-group col-sm-6">
                    <label for="email">{{ __('Email') }}</label>
                    <input type="text" class="form-control" id="email" name="email">
                    <span class="text-danger" id="emailErr"></span>
                </div>
                <div class="form-group col-sm-6">
                    <label for="phone">{{ __('Phone Number') }}</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                    <span class="text-danger" id="phoneErr"></span>
                </div>
                <div class="form-group col-sm-6">
                    <label for="address">{{ __('Address') }}</label>
                    <input type="text" class="form-control" id="address" name="address">
                    <span class="text-danger" id="addressErr"></span>
                </div>
                <div class="form-group col-sm-6">
                    <label for="address">{{ __('Designation') }}</label>
                    {!! designation_dropdown() !!}
                    <span class="text-danger" id="designationErr"></span>
                </div>
                <div class="form-group col-sm-6">
                    <label for="role">{{ __('Company') }}</label>
                    {!! company_dropdown() !!}
                    <span class="text-danger" id="companyErr"></span>
                </div>
                <div class="form-group col-sm-6">
                    <label for="role">{{ __('Location') }}</label>
                    <div id="loc_data">
                        <select class='form-control'><option value=''>Select Location</option></select>
                    </div>
                    <span class="text-danger" id="locationErr"></span>
                </div>
                <div class="form-group col-sm-6">
                    <label for="role">{{ __('Department') }}</label>
                    <div id="dep_data">
                        <select class='form-control'><option value=''>Select Department</option></select>
                    </div>
                    <span class="text-danger" id="departmentErr"></span>
                </div>
                <div class="form-group col-sm-6">
                    <label for="role">{{ __('Role') }}</label>
                    {!! user_role_dropdown() !!}
                    <span class="text-danger" id="roleErr"></span>
                </div>
                <div class="form-group col-sm-6">
                    <label for="role">{{ __('Status') }}</label>
                    {!! status_dropdown() !!}
                    <span class="text-danger" id="statusErr"></span>
                </div>
                <div class="form-group col-sm-6">
                    <label for="image">{{ __('Image') }}</label>
                    <br>
                    <input type="file" id="image" name="image" accept=".jpg,.png,.gif">
                    <span class="text-danger" id="imgErr"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary formBtn">{{ __('Save') }}</button>
                <input type="hidden" id="hiddenId" name="hiddenId">
                <input type="hidden" id="hiddenProfile" name="hiddenProfile">
                <button type="button" onclick="FormClear('userForm')" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- AJAX -->
<script type="text/javascript">
        
    jQuery(".delete_user").on('click',function(){
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
                    url:"{{ route('delete_user') }}",
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

    jQuery(".edit_user").on('click',function(){
        var id = $(this).attr('data-id');
        $.ajax({
            url:"edit_user/"+id,
            type : 'GET',
            dataType: 'json',
            success:function(data) {
                $("#email").val(data[0].email);
                $("#email").val(data[0].email);
                $("#company_id").val(data[0].company_id);
                $("#designation_id").val(data[0].designation_id);
                $("#role_id").val(data[0].role_id);
                $("#name").val(data[0].name);
                $("#address").val(data[0].address);
                $("#phone").val(data[0].phone);
                $("#hiddenId").val(data[0].user_id);
                $("#hiddenProfile").val(data[0].profile_image);

                $(".formBtn").text("Update User");
                $(".modal-title").text("Update User");

                // Triggers 
                jQuery("#company_id").trigger('change');
                setTimeout(function() { 
                    $("#location_id").val(data[0].location_id);
                    jQuery("#location_id").trigger('change');
                    $("#department_id").val(data[0].department_id).delay("slow");
                }, 500);
                setTimeout(function() { 
                    $("#department_id").val(data[0].department_id).delay("slow");
                }, 800);
            }
        });
    });

    $(".modal").on('submit','#userForm',function(e){
        e.preventDefault();
        $.ajax({
            url:"{{ route('add_user') }}",
            type : 'POST',
            data:new FormData(this),
            dataType: 'json',
            contentType: false,  
            cache: false,  
            processData:false,
            success:function(data) {
                $('#userForm')[0].reset();
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
                $("#nameErr").text(err.responseJSON.errors.name);
                $("#emailErr").text(err.responseJSON.errors.email);
                $("#phoneErr").text(err.responseJSON.errors.phone);
                // $("#addressErr").text(err.responseJSON.errors.address);
                $("#designationErr").text(err.responseJSON.errors.designation_id);
                $("#companyErr").text(err.responseJSON.errors.company_id);
                $("#locationErr").text(err.responseJSON.errors.location_id);
                $("#departmentErr").text(err.responseJSON.errors.department_id);
                $("#roleErr").text(err.responseJSON.errors.role_id);
            }
        });
    });

    // Get Company => Locations 
    jQuery("#company_id").on('change',function(){
        var id = $(this).val();
        var uid = $('option:selected', this).attr('data-u-id');
        if(id != ""){
            $.ajax({
                url:"get_locations_by_companyID/"+id+"/"+uid,
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

    // Get Company Locations => Department 
    $(".modal").on('change','#location_id',function(){
        var com_id = $('#company_id').val();
        var loc_id = $(this).val();
        if(com_id != "" && loc_id != ""){
            $.ajax({
                url:"get_department_by_companyID/"+com_id+"/"+loc_id,
                type : 'GET',
                dataType: 'html',
                success:function(data) {
                    $("#dep_data").html(data);
                }
            });
        }else{
            $("#dep_data").html("<select class='form-control'><option value=''>Select Location</option></select>");
        }
    });

    $(".content-page").on('submit','#userProfileUpdate',function(e){
        e.preventDefault();
        $.ajax({
            url:"{{ route('user-profile-update') }}",
            type : 'POST',
            data:new FormData(this),
            dataType: 'json',
            contentType: false,  
            cache: false,  
            processData:false,
            success:function(data) {
                Swal.fire({
                    position: 'top-mid',
                    icon: 'success',
                    title: 'Profile Updated Successfully',
                    showConfirmButton: false,
                    timer: 2500
                });
                setTimeout(function() { 
                    location.reload();
                }, 2000);
            },error:function(err)
            {
                $("#pemailErr").text(err.responseJSON.errors.email);
                $("#pnameErr").text(err.responseJSON.errors.name);
                $("#passErr").text(err.responseJSON.errors.new_password);
            }
        });
    });

    $(".content-page").on('click','.addUserModal',function(e){
        // Triggers 
        jQuery("#company_id").trigger('change');
        setTimeout(function() { 
            $("#location_id").val(data[0].location_id);
        }, 500);
    });
 
</script>