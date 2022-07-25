<!-- Modal  -->
<div id="exampleModalCenteredScrollable" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">{{ __('Add Task') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <form id="taskForm" method="POST">
            @csrf
            <div class="modal-body row">
                <div class="form-group col-sm-6">
                    <label for="project">{{ __('Project') }}</label>
                    {!! company_dropdown() !!}
                    <span class="text-danger" id="projectErr"></span>
                </div>
                <div class="form-group col-sm-6">
                    <label for="title">{{ __('Title') }}</label>
                    <input type="text" class="form-control" id="title" name="title">
                    <span class="text-danger" id="titleErr"></span>
                </div>
                <div class="form-group col-sm-6">
                    <label for="start_datetime">{{ __('Start Date Time') }}</label>
                    <input type="date" class="form-control" id="start_datetime" name="start_datetime">
                    <span class="text-danger" id="start_datetimeErr"></span>
                </div>
                <div class="form-group col-sm-6">
                    <label for="end_datetime">{{ __('End Date Time') }}</label>
                    <input type="date" class="form-control" id="end_datetime" name="end_datetime">
                    <span class="text-danger" id="end_datetimeErr"></span>
                </div>
                <div class="form-group col-sm-4">
                    <label for="phone">{{ __('Assign To') }}</label>
                    {!! company_dropdown() !!}
                    <span class="text-danger" id="assignErr"></span>
                </div>
                <div class="form-group col-sm-4">
                    <label for="phone">{{ __('Priority') }}</label>
                    {!! company_dropdown() !!}
                    <span class="text-danger" id="priorityErr"></span>
                </div>
                <div class="form-group col-sm-4">
                    <label for="phone">{{ __('Status') }}</label>
                    {!! company_dropdown() !!}
                    <span class="text-danger" id="statusErr"></span>
                </div>
                <div class="form-group col-sm-12">
                    <label for="phone">{{ __('Description') }}</label>
                    <textarea name="description" class="form-control"></textarea>
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

<!-- Location AJAX -->
<script type="text/javascript">
        
    jQuery(".delete_task").on('click',function(){
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
                    url:"{{ route('delete_task') }}",
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

    jQuery(".edit_task").on('click',function(){
        var id = $(this).attr('data-id');
        $.ajax({
            url:"edit_task/"+id,
            type : 'GET',
            dataType: 'json',
            success:function(data) {
                $("#company_id").val(data.company_id);
                $("#name").val(data.name);
                $("#address").val(data.address);
                $("#phone").val(data.phone);
                $("#hiddenId").val(data.id);

                $(".formBtn").text("Update Task");
                $(".modal-title").text("Update Task");
            }
        });
    });

    $(".modal").on('submit','#taskForm',function(e){
        e.preventDefault();
        $.ajax({
            url:"{{ route('add_task') }}",
            type : 'POST',
            data:new FormData(this),
            dataType: 'json',
            contentType: false,  
            cache: false,  
            processData:false,
            success:function(data) {
                $('#taskForm')[0].reset();
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