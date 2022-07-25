<!-- Modal  -->
<div id="exampleModalCenteredScrollable" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">{{ __('Add Company') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <form id="roleForm" method="POST">
            @csrf
            <div class="modal-body">
            <div class="form-group">
                <label for="role">{{ __('Role') }}</label>
                <input type="text" class="form-control" id="role" name="role">
                <span class="text-danger" id="roleErr"></span>
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

<!-- USER ROLE AJAX -->
<script type="text/javascript">
        
    jQuery(".delete_role").on('click',function(){
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
                    url:"{{ route('delete_userrole') }}",
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
                            }, 1000);
                            
                        }
                    }
                });
            }
        });    
        // }else{
        //     return false;
        // }
    });

    jQuery(".edit_role").on('click',function(){
        var id = $(this).attr('data-id');
        $.ajax({
            url:"edit_userrole/"+id,
            type : 'GET',
            dataType: 'json',
            success:function(data) {
                $("#role").val(data.role);
                $("#hiddenId").val(data.id);

                $(".formBtn").text("Update Role");
                $(".modal-title").text("Update Role");
            }
        });
    });

    $(".modal").on('submit','#roleForm',function(e){
        e.preventDefault();
        $.ajax({
            url:"{{ route('add_userrole') }}",
            type : 'POST',
            data:new FormData(this),
            dataType: 'json',
            contentType: false,  
            cache: false,  
            processData:false,
            success:function(data) {
                $('#roleForm')[0].reset();
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
                $("#roleErr").text(err.responseJSON.errors.role);
            }
        });
    });
     
</script>