<!-- Modal  -->
<div id="exampleModalCenteredScrollable" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">{{ __('Add Location') }}</h5>
            <button type="button" class="close" onclick="FormClear('locationForm')" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <form id="locationForm" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">{{ __('Company') }}</label>
                    {!! company_dropdown() !!}
                    <span class="text-danger" id="companyErr"></span>
                </div>
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input type="text" class="form-control" id="name" name="name">
                    <span class="text-danger" id="nameErr"></span>
                </div>
                <div class="form-group">
                    <label for="address">{{ __('Address') }}</label>
                    <input type="text" class="form-control" id="address" name="address">
                    <span class="text-danger" id="addressErr"></span>
                </div>
                <div class="form-group">
                    <label for="phone">{{ __('Phone') }}</label>
                    <input type="number" class="form-control" id="phone" name="phone">
                    <span class="text-danger" id="phoneErr"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary formBtn">{{ __('Save') }}</button>
                <input type="hidden" id="hiddenId" name="hiddenId">
                <button type="button" class="btn btn-secondary" onclick="FormClear('locationForm')" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Location AJAX -->
<script type="text/javascript">
        
    jQuery(".delete_location").on('click',function(){
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
                    url:"{{ route('delete_location') }}",
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

    jQuery(".edit_location").on('click',function(){
        var id = $(this).attr('data-id');
        $.ajax({
            url:"edit_location/"+id,
            type : 'GET',
            dataType: 'json',
            success:function(data) {
                $("#company_id").val(data[0].company_id);
                $("#name").val(data[0].name);
                $("#address").val(data[0].address);
                $("#phone").val(data[0].phone);
                $("#hiddenId").val(data[0].id);

                $(".formBtn").text("Update Location");
                $(".modal-title").text("Update Location");
            }
        });
    });

    $(".modal").on('submit','#locationForm',function(e){
        e.preventDefault();
        $.ajax({
            url:"{{ route('add_location') }}",
            type : 'POST',
            data:new FormData(this),
            dataType: 'json',
            contentType: false,  
            cache: false,  
            processData:false,
            success:function(data) {
                $('#locationForm')[0].reset();
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
                $("#companyErr").text(err.responseJSON.errors.company_id);
                $("#nameErr").text(err.responseJSON.errors.name);
                $("#addressErr").text(err.responseJSON.errors.address);
                $("#phoneErr").text(err.responseJSON.errors.phone);
            }
        });
    });
     
</script>