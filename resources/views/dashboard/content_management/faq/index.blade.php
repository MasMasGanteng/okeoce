@extends('layouts.dashboard')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/dashboard">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">FAQ</li>
</ol>
<!-- table -->
<div class="card mb-3">
    <div class="card-header">
        <div class="d-flex align-items-center">
            FAQ List
            <a href="/dashboard/faq/create" class="btn btn-success ml-auto"><i class="fa fa-plus-circle fa-fw"></i>Add FAQ</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" cellspacing="0" id="tables" style="width: 100%;min-width: 1300px;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ask</th>
                        <th>Question</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script src="{{asset('js/jquery-1.11.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/custom_js/alert.js')}}" type="text/javascript"></script>
<script>
$(document).ready(function () {
    var table = $('#tables').DataTable({
        // dom: 'Bflrtip',

        "processing": true,
        "serverSide": true,
        "ajax":{
                 "url": "/dashboard/faq",
                 "dataType": "json",
                 "type": "POST"
               },

        "columns": [
            { "data": "id" , "name":"id"},
            { "data": "ask" , name:"ask"},
            { "data": "question" , name:"question"},
            { "data": "status" , name:"status"},
            { "data": "option" , name:"option",orderable:false}
        ],
        "order": [[ 0, "desc" ]]
    });
    $('#tables_filter input').unbind();
    $('#tables_filter input').bind('keyup', function(e) {
        if(e.keyCode == 13) {
            table.search(this.value).draw();
        }
    });
});
</script>
@stop