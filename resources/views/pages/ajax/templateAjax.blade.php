<!-- Modal  -->
<div id="exampleModalCenteredScrollable" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">{{ __('Add Template') }}</h5>
            <button type="button" class="close" onclick="FormClear('designationForm')" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <form id="templateForm" method="POST">
            @csrf
            <div class="modal-body">
            <div class="form-group">
                <label for="templatename">{{ __('Template Name') }}</label>
                <input type="text" class="form-control" id="templatename" name="templatename">
                <span class="text-danger" id="templatenameErr"></span>
            </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary formBtn">{{ __('Save') }}</button>
                <input type="hidden" id="hiddenId" name="hiddenId">
                <input type="hidden" id="standardID" name="standardID" value="{{ Request::segment(2) }}">
                <button type="button" class="btn btn-secondary" onclick="FormClear('templateForm')" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </form>
        </div>
    </div>
</div>


<!-- Company AJAX -->
<script type="text/javascript">
        
    jQuery(".delete_template").on('click',function(){
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
                    url:"{{ route('delete_template') }}",
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

    jQuery(".edit_template").on('click',function(){
        var id = $(this).attr('data-id');
        $.ajax({
            url:"{{ url('edit_template') }}/"+id,
            type : 'GET',
            dataType: 'json',
            success:function(data) {
                $("#templatename").val(data[0].template_name);
                $("#hiddenId").val(data[0].id);

                $(".formBtn").text("Update Task");
                $(".modal-title").text("Update Task");
            }
        });
    });

    $(".modal").on('submit','#templateForm',function(e){
        e.preventDefault();
        $.ajax({
            url:"{{ route('add_template') }}",
            type : 'POST',
            data:new FormData(this),
            dataType: 'json',
            contentType: false,  
            cache: false,  
            processData:false,
            success:function(data) {
                $('#templateForm')[0].reset();
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
                $("#templatenameErr").text(err.responseJSON.errors.template_name);
            }
        });
    });
     
</script>