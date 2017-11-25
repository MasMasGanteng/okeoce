@extends('layouts.dashboard')
@section('content')
<!-- breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/dashboard">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="/dashboard/product">List Product</a>
    </li>
    <li class="breadcrumb-item active">Add Product</li>
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
            <label for="exampleFormControlSelect1">Example select</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
        <div class="form-group">
            <label>Add Radio Button</label>
            <div class="form-check form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> 1
                </label>
            </div>
            <div class="form-check form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> 2
                </label>
            </div>
        </div>
        <div class="form-group">
            <label>Add Checkbox</label>
            <div class="form-check form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"> 1
                </label>
            </div>
            <div class="form-check form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2"> 2
                </label>
            </div>
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