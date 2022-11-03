<!-- Modal  -->
<div id="exampleModalCenteredScrollable" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">{{ __('Add Package') }}</h5>
            <button type="button" class="close" onclick="FormClear('packageForm')" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <form id="packageForm" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="title">{{ __('Title') }}</label>
                    <input type="text" class="form-control" id="title" name="title">
                    <span class="text-danger" id="titleErr"></span>
                </div>
                <div class="form-group">
                    <label for="max_users">{{ __('Max Users') }}</label>
                    <input type="number" class="form-control" id="max_users" name="max_users">
                    <span class="text-danger" id="max_usersErr"></span>
                </div>
                <div class="form-group">
                    <label for="max_locations">{{ __('Max Locations') }}</label>
                    <input type="number" class="form-control" id="max_locations" name="max_locations">
                    <span class="text-danger" id="max_locationsErr"></span>
                </div>
                <div class="form-group">
                    <label for="max_locations_users">{{ __('Max Locations Users') }}</label>
                    <input type="number" class="form-control" id="max_locations_users" name="max_locations_users">
                    <span class="text-danger" id="max_locations_usersErr"></span>
                </div>
                 <div class="form-group">
                    <label for="package_type">{{ __('Package Type') }}</label>
                     {!! package_types_dropdown() !!}
                    <span class="text-danger" id="max_package_typeErr"></span>
                </div>
                 <div class="form-group">
                    <label for="package_amount">{{ __('Package Amount') }}</label>
                    <input type="number" class="form-control" id="package_amount" name="package_amount">
                    <span class="text-danger" id="package_amountErr"></span>
                </div>
               
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary formBtn">{{ __('Save') }}</button>
                <input type="hidden" id="hiddenId" name="hiddenId">
                <button type="button" class="btn btn-secondary" onclick="FormClear('packageForm')" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Department AJAX -->
<script type="text/javascript">
        
    jQuery(".delete_package").on('click',function(){
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
                    url:"{{ route('delete_package') }}",
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

    jQuery(".edit_package").on('click',function(){
        var id = $(this).attr('data-id');
        $.ajax({
            url:"edit_package/"+id,
            type : 'GET',
            dataType: 'json',
            success:function(data) {
                $("#title").val(data[0].title);
                $("#max_users").val(data[0].max_users);
                $("#max_locations").val(data[0].max_locations);
                $("#max_locations_users").val(data[0].max_locations_users);
                $("#package_type").val(data[0].package_type);
                $("#package_amount").val(data[0].package_amount);
                $("#hiddenId").val(data[0].package_id);

                // Triggers 
                // jQuery("#company_id").trigger('change');
                // setTimeout(function() { 
                //     $("#package_type").val(data[0].package_type);
                // }, 500);

                $(".formBtn").text("Update Package");
                $(".modal-title").text("Update Package");
            }
        });
    });

    $(".modal").on('submit','#packageForm',function(e){
        e.preventDefault();
        $.ajax({
            url:"{{ route('add_package') }}",
            type : 'POST',
            data:new FormData(this),
            dataType: 'json',
            contentType: false,  
            cache: false,  
            processData:false,
            success:function(data) {
                $('#packageForm')[0].reset();
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
                $("#titleErr").text(err.responseJSON.errors.title);
                $("#max_usersErr").text(err.responseJSON.errors.max_users);
                $("#max_locationsErr").text(err.responseJSON.errors.max_locations);
                $("#max_locations_usersErr").text(err.responseJSON.errors.max_locations_users);
                $("#package_typeErr").text(err.responseJSON.errors.package_type);
                $("#package_amountErr").text(err.responseJSON.errors.package_amount);
                
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

    // Triggers 
    jQuery("#company_id").trigger('change');
    setTimeout(function() { 
        $("#location_id").val(data[0].location_id);
    }, 500);
     
</script>