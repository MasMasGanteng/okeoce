@extends('layouts.dashboard')
@section('content')
<!-- breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/dashboard">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="/dashboard/banner">List Banner</a>
    </li>
    <li class="breadcrumb-item active">Add Banner</li>
</ol>
<!-- form -->
<div class="col-6 px-0 mb-4">
    <form id=form-validation enctype="multipart/form-data" class="form-horizontal form-bordered">
        <div class="form-group">
            <label>Title</label>
            <input class="form-control" placeholder="Title" value="{{$title}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Status</label>
            <select class="form-control" id="select-status-input" name="select-status-input">
                <option value="0" {!! $status=='0' ? 'selected':'' !!}>Aktif</option>
                <option value="1" {!! $status=='1' ? 'selected':'' !!}>Tidak Aktif</option>
            </select>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" id="description-input" name="description-input">{{$description}}</textarea>
        </div>
        <div class="form-group">
            <label>Upload Images</label>
            <div class="file-loading">
                <input id="url_img_banner-input" name="url_img_banner-input" type="file" class="file" accept="image/*">
                <img id="url_img_banner" alt="gallery" src="/uploads/dashboard/banner/{{$url_img_banner}}" {!! $url_img_banner==null ? 'style="display:none"':'style="width:150px"' !!} >
                <input type="hidden" id="url_img_banner-file" name="url_img_banner-file" value="{{$url_img_banner}}">
                <button type="button" class="btn btn-effect-ripple btn-danger" {!! $url_img_banner==null ? 'style="display:none"':'' !!} onclick="test('url_img_banner')">Delete</button>
            </div>
        </div>
        <div class="form-group form-actions">
            <a href="/dashboard/banner" type="button" class="btn btn-effect-ripple btn-danger">
                Cancel
            </a>
            <button type="submit" id="submit" class="btn btn-effect-ripple btn-primary">
                Submit
            </button>
            <button type="reset" class="btn btn-effect-ripple btn-default reset_btn2">
                Reset
            </button>
        </div>
    </form>
</div>
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

    $("#uri_img_banner-input").fileinput({
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
                "url": "/dashboard/banner/create",
                data: form_data,
                beforeSend: function (){
                    $("#submit").prop('disabled', true);
                },
                success: function () {
                    alert('From Submitted.');
                    window.location.href = "/dashboard/banner";
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                    $("#submit").prop('disabled', false);
                }
            });
        });
    });
});
</script>
@stop