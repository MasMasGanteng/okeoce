@extends('layouts.master')
@section('content')
<div class="container full-container">
	<div class="font-blue h5 mt-3 mb-4">
        <b>RIWAYAT PEMESANAN</b>
    </div>
    <div class="table-responsive">
    	<table class="table baiza-table-order" id="order_h">
    		<thead>
                <tr class="header">
                	<th scope="col">No. Order</th>
                    <th scope="col">Detail Order</th>
                    <th scope="col">Detail Pengiriman</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
    	</table>
    </div>
</div>
@stop

{{-- local scripts --}}
@section('footer_scripts')
<script>
    $(document).ready(function () {
        var table = $('#order_h').DataTable({
            // dom: 'Bflrtip',

            "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": "/order_history",
                     "dataType": "json",
                     "type": "POST"
                   },

            "columns": [
                { "data": "order_code" , "name":"order_code"},
                { "data": "detail_order" , name:"detail_order"},
                { "data": "detail_pengiriman" , name:"detail_pengiriman"},
                { "data": "total" , name:"total"},
                { "data": "option" , name:"option"}
            ],
            "searching": false,
            "ordering": false
        });
        // $('#tables_filter input').unbind();
        // $('#tables_filter input').bind('keyup', function(e) {
        //     if(e.keyCode == 13) {
        //         table.search(this.value).draw();
        //     }
        // });
    });
</script>
@stop