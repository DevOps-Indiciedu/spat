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
        <form id="companyForm" method="POST">
            @csrf
            <div class="modal-body">
            <div class="form-group">
                <label for="company">{{ __('Company') }}</label>
                <input type="text" class="form-control" id="company" name="company">
                <span class="text-danger" id="companyErr"></span>
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

<!-- Company AJAX -->
<script type="text/javascript">
        
    jQuery(".delete_company").on('click',function(){
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
                    url:"{{ route('delete_company') }}",
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

    jQuery(".edit_company").on('click',function(){
        var id = $(this).attr('data-id');
        $.ajax({
            url:"edit_company/"+id,
            type : 'GET',
            dataType: 'json',
            success:function(data) {
                $("#company").val(data.company);
                $("#hiddenId").val(data.id);

                $(".formBtn").text("Update Company");
                $(".modal-title").text("Update Company");
            }
        });
    });

    $(".modal").on('submit','#companyForm',function(e){
        e.preventDefault();
        $.ajax({
            url:"{{ route('add_company') }}",
            type : 'POST',
            data:new FormData(this),
            dataType: 'json',
            contentType: false,  
            cache: false,  
            processData:false,
            success:function(data) {
                $("#category_name").val('');
                $('#companyForm')[0].reset();
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
                $("#companyErr").text(err.responseJSON.errors.company);
            }
        });
    });
     
</script>