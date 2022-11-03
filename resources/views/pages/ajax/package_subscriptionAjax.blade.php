<!-- Modal  -->
<div id="exampleModalCenteredScrollable" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">{{ __('Package Subscription') }}</h5>
            <button type="button" class="close" onclick="FormClear('package_subscriptionForm')" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <form id="package_subscriptionForm" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="company_id">{{ __('Company') }}</label>
                     {!! company_dropdown() !!}
                    <span class="text-danger" id="company_idErr"></span>
                </div>
                 <div class="form-group">
                    <label for="package_id">{{ __('Package') }}</label>
                     {!! packages_dropdown() !!}
                    <span class="text-danger" id="package_idErr"></span>
                </div>
                <div class="form-group">
                    <label for="start_date">{{ __('Start Date') }}</label>
                    <input type="date" class="form-control" id="start_date" name="start_date">
                    <span class="text-danger" id="max_usersErr"></span>
                </div>
                <div class="form-group">
                    <label for="end_date">{{ __('End Date') }}</label>
                    <input type="date" class="form-control" id="end_date" name="end_date">
                    <span class="text-danger" id="end_dateErr"></span>
                </div>
               
               <div id="amount_value"> 0 PKR</div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary formBtn">{{ __('Save') }}</button>
                <input type="hidden" id="hiddenId" name="hiddenId">
                <button type="button" class="btn btn-secondary" onclick="FormClear('package_subscriptionForm')" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Department AJAX -->
<script type="text/javascript">
        
    jQuery(".delete_package_subscription").on('click',function(){
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
                    url:"{{ route('delete_package_subscription') }}",
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

    jQuery(".edit_package_subscription").on('click',function(){
        var id = $(this).attr('data-id');
        $.ajax({
            url:"edit_package_subscription/"+id,
            type : 'GET',
            dataType: 'json',
            success:function(data) {
                $("#company_id").val(data[0].company_id);
                $("#package_id").val(data[0].package_id);
                $("#start_date").val(data[0].start_date);
                $("#end_date").val(data[0].end_date);
             
                $("#hiddenId").val(data[0].package_id);

                // Triggers 
                // jQuery("#company_id").trigger('change');
                // setTimeout(function() { 
                //     $("#package_type").val(data[0].package_type);
                // }, 500);

                $(".formBtn").text("Update Package Subscription");
                $(".modal-title").text("Update Subscription");
            }
        });
    });

    $(".modal").on('submit','#package_subscriptionForm',function(e){
        e.preventDefault();
        $.ajax({
            url:"{{ route('add_package_subscription') }}",
            type : 'POST',
            data:new FormData(this),
            dataType: 'json',
            contentType: false,  
            cache: false,  
            processData:false,
            success:function(data) {
                $('#package_subscriptionForm')[0].reset();
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
                $("#company_idErr").text(err.responseJSON.errors.company_id);
                $("#package_idErr").text(err.responseJSON.errors.package_id);
                $("#start_dateErr").text(err.responseJSON.errors.start_date);
                $("#end_dateErr").text(err.responseJSON.errors.end_date);
                
                
            }
        });
    });
    jQuery("#package_id").on('change',function(){
        var id = $(this).val();
        if(id != ""){
            $.ajax({
                url:"get_package_amount/"+id,
                type : 'GET',
                dataType: 'html',
                success:function(data) {
                    $("#amount_value").html(data);
                }
            });
        }else{
            $("#amount_value").html("0");
        }
    });
   
</script>