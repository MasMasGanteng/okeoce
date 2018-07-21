@extends('layouts.dashboard')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/dashboard">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Need Approval Order From Baiza Admin</li>
</ol>
<!-- table -->
<div class="card mb-3">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="1500px" cellspacing="0" id="tables">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Status</th>
                        <th>User</th>
                        <th>Price</th>
                        <th>Payment</th>
                        <th>Shipping</th>
                        <th>Penerima</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Order Time</th>
                        <th>Show</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script src="{{asset('js/jquery-1.11.1.min.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        var table = $('#tables').DataTable({
            // dom: 'Bflrtip',

            "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": "/dashboard/order_in",
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
                { "data": "status" , name:"status"},
                { "data": "id_user" , name:"id_user"},
                { "data": "price" , name:"price"},
                { "data": "payment_method" , name:"payment_method"},
                { "data": "shipping_method" , name:"shipping_method"},
                { "data": "nama_penerima" , name:"nama_penerima"},
                { "data": "address" , name:"address"},
                { "data": "phone_number" , name:"phone_number"},
                { "data": "order_time" , name:"order_time"},
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
});
</script>
@stop