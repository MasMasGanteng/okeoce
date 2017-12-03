@extends('layouts.dashboard')
{{-- local styles --}} @section('header_styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet">
<link href="{{asset('vendors/bootstrap-fileinput/css/fileinput.min.css')}}" media="all" rel="stylesheet" type="text/css"/>
@stop
@section('content')
<!-- breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/dashboard">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="/dashboard/ready_to_eat">List Product</a>
    </li>
    <li class="breadcrumb-item active">Add Product</li>
</ol>
<!-- form -->
<div class="col-6 px-0 mb-4">
    <form id="form-validation" enctype="multipart/form-data" class="form-horizontal form-bordered">
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" type="hidden" placeholder="id" name="id" id="id" value="{{$id}}">
            <input class="form-control" type="text" placeholder="Name" name="name-input" id="name-input" value="{{$name}}" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Status</label>
            <select class="form-control" id="select-status-input" name="select-status-input">
                <option value="1" {!! $status=='1' ? 'selected':'' !!}>Aktif</option>
                <option value="0" {!! $status=='0' ? 'selected':'' !!}>Tidak Aktif</option>
            </select>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" type="number" placeholder="Price" name="price-input" id="price-input" value="{{$price}}" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" id="description-input" name="description-input" rows="10">{{$description}}</textarea>
        </div>
        <div class="form-group">
            <label>Upload Images</label>
            <img id="url_img_product" alt="gallery" src="/uploads/product/product/{{$url_img_product}}" {!! $url_img_product==null ? 'style="display:none"':'style="width:150px"' !!} >
            <input id="url_img_product-input" name="url_img_product-input" type="file" class="file" accept="image/*">
            <input type="hidden" id="url_img_product-file" name="url_img_product-file" value="{{$url_img_product}}">
            <button type="button" class="btn btn-effect-ripple btn-danger" {!! $url_img_product==null ? 'style="display:none"':'' !!} onclick="test('url_img_product')">Delete</button>
        </div>
        <div class="form-group form-actions">
            <a href="/dashboard/ready_to_eat" type="button" class="btn btn-effect-ripple btn-danger">
                Cancel
            </a>
            <button type="submit" class="btn btn-effect-ripple btn-primary">
                Submit
            </button>
            <button type="reset" class="btn btn-effect-ripple btn-default reset_btn2">
                Reset
            </button>
        </div>
    </form>
</div>
@stop {{-- local scripts --}} @section('footer_scripts')
<script>
function test(id){
    console.log(id)
    var elem = document.getElementById(id);
    elem.parentNode.removeChild(elem);
    var elem2 = $('#'+id+'-file');
    elem2.removeAttr('value');
    return false;
    }
    
$(document).ready(function () {

    $("#uri_img_ingredients-input").fileinput({
        previewFileType: "image",
        browseClass: "btn btn-success",
        browseLabel: " Pick Image",
        browseIcon: '<i class="glyphicon glyphicon-picture"></i>',
        removeClass: "btn btn-danger",
        removeLabel: "Delete",
        removeIcon: '<i class="glyphicon glyphicon-trash"></i>',
        showUpload: false
    });

    $('#form-validation').bootstrapValidator().on('success.form.bv', function(e) {
        $('#form-validation').on('submit', function (e) {
            e.preventDefault();
            var form_data = new FormData(this);
            $.ajax({
                type: 'post',
                processData: false,
                contentType: false,
                "url": "/dashboard/ready_to_eat/create",
                data: form_data,
                beforeSend: function (){
                    $("#submit").prop('disabled', true);
                },
                success: function () {
                    alert('From Submitted.');
                    window.location.href = "/dashboard/ready_to_eat";
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                    $("#submit").prop('disabled', false);
                }
            });
        });
    }).on('error.form.bv', function(e) {
        $("#submit").prop('disabled', false);
    });
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
<script src="{{asset('vendors/bootstrap-fileinput/js/fileinput.min.js')}}" type="text/javascript"></script>

@stop