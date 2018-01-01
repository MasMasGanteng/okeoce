@extends('layouts.dashboard')

<link rel="stylesheet" type="text/css" href="{{asset('vendors/datatables/css/dataTables.bootstrap.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('vendors/datatables/css/buttons.bootstrap.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('vendors/datatables/css/colReorder.bootstrap.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('vendors/datatables/css/dataTables.bootstrap.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('vendors/datatables/css/rowReorder.bootstrap.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('vendors/datatables/css/buttons.bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/datatables/css/scroller.bootstrap.css')}}">
<link href="{{asset('vendors/hover/css/hover-min.css')}}" rel="stylesheet">
<link href="{{asset('css/buttons_sass.css')}}" rel="stylesheet">

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/dashboard">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Order</li>
</ol>
<!-- table -->
<div class="card mb-3">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="1500px" cellspacing="0" id="tables">
                <thead>
                    <tr>
                        <th rowspan="2">ID</th>
                        <th rowspan="2">User</th>
                        <th rowspan="2">Price</th>
                        <th rowspan="2">Payment</th>
                        <th rowspan="2">Shipping</th>
                        <th rowspan="2">Penerima</th>
                        <th rowspan="2">Address</th>
                        <th rowspan="2">Phone</th>
                        <th rowspan="2">Order Time</th>
                        <th rowspan="2">Action</th>
                        <th colspan="2">To Do</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
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
                     "url": "/dashboard/order",
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
            "order": [[ 1, "desc" ]]
        });
        $('#tables_filter input').unbind();
        $('#tables_filter input').bind('keyup', function(e) {
        if(e.keyCode == 13) {
            table.search(this.value).draw();
        }
    })
});
</script>
<script type="text/javascript" src="{{asset('vendors/datatables/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/datatables/js/buttons.html5.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/datatables/js/dataTables.buttons.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/datatables/js/dataTables.colReorder.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/datatables/js/dataTables.responsive.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/datatables/js/dataTables.rowReorder.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/datatables/js/buttons.colVis.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/datatables/js/buttons.html5.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/datatables/js/buttons.bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/datatables/js/buttons.print.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/datatables/js/dataTables.scroller.js')}}"></script>
<script src="{{asset('js/custom_js/alert.js')}}" type="text/javascript"></script>
@stop