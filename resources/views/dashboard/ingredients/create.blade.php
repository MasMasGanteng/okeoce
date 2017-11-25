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
            <label>Title</label>
            <input class="form-control" placeholder="Title">
        </div>
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" placeholder="Price">
        </div>
        <div class="form-group">
            <label>Stock</label>
            <input class="form-control" placeholder="Stock">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Status</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option>Aktif</option>
                <option>Tidak Aktif</option>
            </select>
        </div>
        <div class="form-group">
            <label>Description</label>
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