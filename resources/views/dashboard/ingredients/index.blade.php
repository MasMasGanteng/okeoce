@extends('layouts.dashboard')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/dashboard">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">List Ingredients</li>
</ol>
<!-- table -->
<div class="card mb-3">
    <div class="card-header">
        <div class="d-flex align-items-center">
            Data Table Example
            <a href="/dashboard/ingredients/create" class="btn btn-success ml-auto"><i class="fa fa-plus-circle fa-fw"></i> Add Product</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>Shad Decker</td>
                        <td>Regional Director</td>
                        <td>Edinburgh</td>
                        <td>51</td>
                        <td>2008/11/13</td>
                        <td>
                            <button type="button" class="btn btn-outline-info btn-sm"><i class="fa fa-pencil"></i></button>
                            <button type="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Michael Bruce</td>
                        <td>Javascript Developer</td>
                        <td>Singapore</td>
                        <td>29</td>
                        <td>2011/06/27</td>
                        <td>
                            <button type="button" class="btn btn-outline-info btn-sm"><i class="fa fa-pencil"></i></button>
                            <button type="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Donna Snider</td>
                        <td>Customer Support</td>
                        <td>New York</td>
                        <td>27</td>
                        <td>2011/01/25</td>
                        <td>
                            <button type="button" class="btn btn-outline-info btn-sm"><i class="fa fa-pencil"></i></button>
                            <button type="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
@stop