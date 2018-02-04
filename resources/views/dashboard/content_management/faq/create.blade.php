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
        <a href="/dashboard/promo">List FAQ</a>
    </li>
    <li class="breadcrumb-item active">Add FAQ</li>
</ol>
<!-- form -->
<div class="col-6 px-0 mb-4">
    <form id="form-validation" enctype="multipart/form-data" class="form-horizontal form-bordered">
        <div class="form-group">
            <label>Question</label>
            <textarea name="question-input" id="question-input" rows="10">
                {{$question}}
            </textarea>
        </div>
        <div class="form-group">
            <label>ASK</label>
            <textarea name="ask-input" id="ask-input" rows="10">
                {{$ask}}
            </textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Status</label>
            <select class="form-control" id="select-status-input" name="select-status-input">
                <option value="1" {!! $status=='1' ? 'selected':'' !!}>Aktif</option>
                <option value="0" {!! $status=='0' ? 'selected':'' !!}>Tidak Aktif</option>
            </select>
        </div>
        <div class="form-group form-actions">
            <a href="/dashboard/faq" type="button" class="btn btn-effect-ripple btn-danger">
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

$(document).ready(function() {
  $('#ask-input').summernote({
        height: 300
  });
  $('#question-input').summernote({
    height: 300
  });
});

$(document).ready(function () {

    $('#form-validation').bootstrapValidator().on('success.form.bv', function(e) {
        $('#form-validation').on('submit', function (e) {
            e.preventDefault();
            var form_data = new FormData(this);
            form_data.append('ask', $('#ask-input').val());
            form_data.append('question', $('#question-input').val());
            $.ajax({
                type: 'post',
                processData: false,
                contentType: false,
                "url": "/dashboard/faq/create",
                data: form_data,
                beforeSend: function (){
                    $("#submit").prop('disabled', true);
                },
                success: function () {
                    alert('From Submitted.');
                    window.location.href = "/dashboard/faq";
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