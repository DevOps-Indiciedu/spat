@extends('layouts.app')

@section('content')
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">{{ __('Companies Managment') }}</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <form>
                        <div class="form-group">
                            <label for="email">{{ __('Company') }}</label>
                            <input type="email" class="form-control" id="email1">
                        </div>
                    </form>
                    <table id="datatable" class="table table-striped table-bordered" >
                       <thead>
                           <tr>
                               <th>{{ __('#') }}</th>
                               <th>{{ __('Company') }}</th>
                               <th>{{ __('Reg Date') }}</th>
                               <th>{{ __('Action') }}</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr id="row-{{ data->id }}" class="text-center">
                               <td>{{ data->id }}</td>
                               <td>{{ data->company }}</td>
                               <td>{{ data->created_at }}</td>
                               <td>
                                   <button type="button" data-id="{{ data->id }}" class="btn btn-warning mb-3 edit_company"><i class="ri-edit-box-fill pr-0"></i></button>
                                   <button type="button" dta-id="{{ data->id }}" class="btn btn-danger mb-3 delete_company" data-toggle="modal" data-target="#exampleModalCenteredScrollable">
                                        <i class="ri-delete-bin-2-fill pr-0"></i>
                                    </button>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal  -->

<!-- AJAX -->
<script type="text/javascript">
        
    jQuery(".delete_company").on('click',function(){
        if (confirm("Are you sure")) {
            var id = $(this).attr('data-id');
            $.ajax({
                url:"{{ route('delete_company') }}",
                type : 'POST',
                data:{
                    "_token": "{{ csrf_token() }}",
                    'id' : id
                },
                success:function(data) {
                    $("#row-"+id).css({"background-color": "#dc3545", "color": "white"});
                    setTimeout(function() { 
                        $("#row-"+id).remove();
                    }, 2000);
                }
            });
        }else{
            return false;
        }
    });

    jQuery(".edit_category").on('click',function(){
        var id = $(this).attr('data-id');
        $.ajax({
            url:"edit_category/"+id,
            type : 'GET',
            dataType: 'json',
            success:function(data) {
                $("#category_name").val(data.category_name);
                $("#status").val(data.status);
                $("#hiddenId").val(data.id);

                $('.card').addClass('blink_animate');
                $("form").attr("id","categoryForm");
                $("form").attr("action","#");
                $(".formBtn").text("Update Category");
                setTimeout(function() { 
                    $('.card').removeClass('blink_animate');
                }, 1500);
            }
        });
    });

    $(".card").on('submit','#categoryForm',function(e){
        e.preventDefault();

        $.ajax({
            url:"{{ route('update_category') }}",
            type : 'POST',
            data:new FormData(this),
            dataType: 'json',
            contentType: false,  
            cache: false,  
            processData:false,
            success:function(data) {
                $("#category_name").val('');
                $('form')[0].reset();
                $(".msg").html("<div class='alert alert-success'>Data Updated Successfully</div>");
                setTimeout(function() {
                    $('.msg').html('');
                }, 2000);
            },error:function(err)
            {
                $("#categoryErr").text(err.responseJSON.errors.category_name);
                $("#statusErr").text(err.responseJSON.errors.status);
            }
        });
    });
     
</script>

@endsection