@extends('layouts.dashboard')
{{-- local styles --}} @section('header_styles')
@stop
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/dashboard">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Confirmation List</li>
</ol>
<!-- table -->
<div class="card mb-3">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="1500px" cellspacing="0" id="tables">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Order ID</th>
                        <th>Bank</th>
                        <th>Account No</th>
                        <th>Amount</th>
                        <th>References</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div id="submit_confirmation" class="modal fade animated position_modal" role="dialog">
    <form id="form_confirmation">    
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="" class="form-control" name="id" id="id" value="">
                    <input type="" class="form-control" name="order_id" id="order_id" value="">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to confirm this payment?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-effect-ripple btn-success" id="submit_confirmation_btn">
                        Yes
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="{{asset('js/jquery-1.11.1.min.js')}}" type="text/javascript"></script>
<script>
    function approve_func(data){
        console.log($data);
        $('#submit_confirmation').modal('show');
    }

    $(document).ready(function () {
        var table = $('#tables').DataTable({
            // dom: 'Bflrtip',

            "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": "/dashboard/confirmation",
                     "dataType": "json",
                     "type": "POST"
                   },
            success: function(data) {
                 alert('success')
              },
              error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
              },
            "columns": [
                { "data": "id" , name:"id"},
                { "data": "order_id" , name:"order_id"},
                { "data": "bank" , name:"bank"},
                { "data": "account_no" , name:"account_no"},
                { "data": "amount" , name:"payment_method"},
                { "data": "references" , name:"shipping_method"},
                { "data": "status" , name:"nama_penerima"},
                { "data": "url_img" , name:"address"},
                { "data": "option" , name:"option",orderable:false}
            ],
            "order": [[ 0, "desc" ]]
        });
        $('#tables_filter input').unbind();
        $('#tables_filter input').bind('keyup', function(e) {
        if(e.keyCode == 13) {
            table.search(this.value).draw();
        }
    })

    $('#form_confirmation').bootstrapValidator().on('success.form.bv', function(e) {
        $('#form_confirmation').on('submit', function (e) {
            e.preventDefault();
            var form_data = new FormData(this);
            $.ajax({
                type: 'post',
                processData: false,
                contentType: false,
                "url": "/dashboard/confirmation/create",
                data: form_data,
                beforeSend: function (){
                    $("#susubmit_confirmation_btnbmit").prop('disabled', true);
                },
                success: function () {
                    alert('From Submitted.');
                    // window.location.href = "/dashboard/confirmation";
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                    $("#submit_confirmation_btn").prop('disabled', false);
                }
            });
        });
    });

    $('#submit_confirmation_btn').on('click', function () {
        var form = $("#form_confirmation");
        form.submit();
    })
});
</script>
@stop