<!-- Modal  -->
<div id="CompanyEditModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="CompanyEditModal" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="CompanyEditModal">{{ __('Edit Company') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form method="POST" id="companyForm">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_name">Company Name <span class="text-danger">*</span></label> 
                            <input type="text" class="form-control" id="companyname" readonly name="company_name" placeholder="" />
                            <span class="text-danger" id="companyNameErr"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"> 
                            <label for="company_contact_name">Company Contact Name <span class="text-danger">*</span></label> 
                            <input type="text" class="form-control" id="company_contact_name" name="company_contact_name" placeholder="" />
                            <span class="text-danger" id="companyContactNameErr"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"> 
                            <label for="company_phone">Company Phone No <span class="text-danger">*</span></label> 
                            <input type="number" class="form-control" id="company_phone" name="company_phone" placeholder="" />
                            <span class="text-danger" id="companyPhoneErr"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"> 
                            <label for="company_email">Company E-mail Address <span class="text-danger">*</span></label> 
                            <input type="email" class="form-control" id="company_email" name="email" placeholder="" />
                            <span class="text-danger" id="companyEmailErr"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_website">Company Website</label>
                            <input type="url" class="form-control" id="company_website" name="company_website" value="" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"> 
                            <label for="company_type">Company Type <span class="text-danger">*</span></label> 
                            {!! company_types() !!}
                            <span class="text-danger" id="companyTypeErr"></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="company_address">Company Physical Address</label>
                            <textarea class="form-control" id="company_address" name="company_address" rows="2"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary formBtn">{{ __('Update') }}</button>
                <input type="hidden" id="hiddenId" name="hiddenId">
                <input type="hidden" id="hiddenUserId" name="hiddenUserId">
                
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
                $("#companyname").val(data[0].company_name);
                $("#company_contact_name").val(data[0].company_contact_name);
                $("#company_phone").val(data[0].company_phone);
                $("#company_email").val(data[0].company_email);
                $("#company_website").val(data[0].company_website);
                $("#company_type").val(data[0].company_type);
                $("#company_address").val(data[0].company_address);
                $("#hiddenId").val(data[0].id);
                $("#hiddenUserId").val(data[0].user_id);

                $(".formBtn").text("Update Company");
                $(".modal-title").text("Update Company");
            }
        });
    });

    @if(Route::currentRouteName() == "company")
        $(".modal").on('submit','#companyForm',function(e){
    @else
        $(".content-page").on('submit','#companyForm',function(e){
    @endif
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
                $("#companyTypeErr").text(err.responseJSON.errors.company_type);
                
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
