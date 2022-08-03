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
        <form method="POST">
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

<div id="confirmModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="confirmModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body row">
                    <div class="form-group col-sm-6 text-center">
                        <a href="{{url()->current().'?type=company'}}">
                            <i class="ri-building-fill text-danger" style="font-size:50px;"></i>
                            <h5>Add Auditee Company</h5>
                        </a>                    
                    </div>
                    <div class="form-group col-sm-6 text-center">
                        <a href="{{url()->current().'?type=assessor'}}">
                            <i class="ri-account-box-line text-danger" style="font-size:50px;"></i>
                            <h5>Add Assessor Company</h5>                       
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Company AJAX -->
<script type="text/javascript">

    // jQuery(document).ready(function(){
    //     // $("#form_laoder").hide();
        
    // });
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
                $("#company").val(data[0].company);
                $("#hiddenId").val(data[0].id);

                $(".formBtn").text("Update Company");
                $(".modal-title").text("Update Company");
            }
        });
    });

    
    $(".content-page").on('submit','#companyForm',function(e){
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
                $("#companyNameErr").text(err.responseJSON.errors.company_name);
                $("#companyContactNameErr").text(err.responseJSON.errors.company_contact_name);
                $("#companyPhoneErr").text(err.responseJSON.errors.company_phone);
                $("#companyEmailErr").text(err.responseJSON.errors.email);
                $("#companyStandardsErr").text(err.responseJSON.errors.company_standard_id);
                
            }
        });
    });

    // Assessor Form Submission
    $(".content-page").on('submit','#form-wizard1',function(e){
        e.preventDefault();
        $.ajax({
            url:"{{ route('add_assessor') }}",
            type : 'POST',
            data:new FormData(this),
            dataType: 'json',
            contentType: false,  
            cache: false,  
            processData:false,
            success:function(data) {
                $('#form-wizard1')[0].reset();
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
                $("#companyNameErr").text(err.responseJSON.errors.company_name);
                $("#assessorNameErr").text(err.responseJSON.errors.assessor_name);
                $("#assessorCredErr").text(err.responseJSON.errors.assessor_creds);
                $("#assessorPhoneErr").text(err.responseJSON.errors.assessor_phone);
                $("#assessorEmailErr").text(err.responseJSON.errors.email);
                
            }
        });
    });

    
    jQuery(".block_company").on('click',function(){
        var umid = $(this).attr('data-umid');
        var id = $(this).attr('data-id');
        var block = $(this).attr('data-block');
        if(block == '1'){
            txt = "You want to block this account";
            suc_txt = "Blocked";
        }else{
            txt = "You want to unblock this account";
            suc_txt = "Unblocked";
        }
        Swal.fire({
            title: 'Are you sure?',
            text: txt,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
            }).then((result) => {
            if (result.isConfirmed) {
                
                $.ajax({
                    url:"{{ route('block_company') }}",
                    type : 'POST',
                    data:{
                        "_token": "{{ csrf_token() }}",
                        'id' : id,
                        'block' : block
                    },
                    success:function(data) {
                        if(data.code == 200){
                            Swal.fire(
                                suc_txt,
                                data.message,
                                'success'
                            );
                            setTimeout(function() { 
                                location.reload();
                            }, 1000);
                        }
                    }
                });
            }
        }); 
    });
    
</script>
