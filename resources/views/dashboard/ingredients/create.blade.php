@extends('layouts.dashboard')
@section('content')
<!-- breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/dashboard">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="/dashboard/ingredients">List Ingredients</a>
    </li>
    <li class="breadcrumb-item active">Add Ingredients</li>
</ol>
<!-- form -->
<div class="col-6 px-0 mb-4">
    <form>
        <div class="form-group">
            <label>Email address</label>
            <input class="form-control" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input class="form-control" placeholder="Password">
        </div>
        <div class="form-group">
            <label>Add Text</label>
            <textarea class="form-control" name="editor1"></textarea>
        </div>
        <div class="form-group">
            <label>Upload File</label>
            <div class="file-loading">
                <input id="input-fa-1" name="input-fa-1[]" type="file" multiple>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@stop