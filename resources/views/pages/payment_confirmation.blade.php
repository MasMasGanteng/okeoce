@extends('layouts.master')
{{-- local styles --}} @section('header_styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet">
<link href="{{asset('vendors/bootstrap-fileinput/css/fileinput.min.css')}}" media="all" rel="stylesheet" type="text/css"/>
@stop
@section('content')
<div class="container full-container d-flex justify-content-center align-items-center" style="margin-bottom: 2.3rem;">
    <div class="col-lg-6 col-md-8 col-12 mx-auto">
        <div class="font-blue h5 mt-3 mb-5 text-center">
            <b>PAYMENT CONFIRMATION</b>
        </div>
        <form id="form">
            <input type="hidden" id="order_id" name="order_id" value="{{$id}}">
            <div class="form-group">
                <label for="payment_bank">Nama Bank :</label>
                <select class="form-control" id="payment_bank" name="payment_bank">
                    <option>Bank BCA</option>
                </select>
            </div>
            <div class="form-group">
                <label for="payment_user">Nama :</label>
                <input type="text" class="form-control" id="payment_user" name="payment_user" placeholder="Contoh : John Doe">
            </div>
            <div class="form-group">
                <label for="payment_account_number">No. Rekening :</label>
                <input type="tel" class="form-control" id="payment_account_number" name="payment_account_number" min="0" placeholder="Contoh : 123456789">
            </div>
            <div class="form-group">
                <label for="payment_account_number">Total Pembayaran :</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Rp</div>
                    </div>
                    <input type="number" class="form-control" id="payment_amount" name="payment_amount" min="0" placeholder="Contoh : 1500000">
                </div>
            </div>
            <div class="form-group">
                <label for="payment_user">References :</label>
                <input type="text" class="form-control" id="payment_references" name="payment_references" placeholder="Contoh : John Doe">
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <input class="url_img-view" id="url_img-input" name="url_img-input" type="file" class="file" accept="image/*">
                <input type="hidden" id="url_img-file" name="url_img-file" value="">
            </div>
            <div class="text-center mt-5">
                <button type="submit" class="btn btn-blue btn-block btn-lg">CONFIRM PAYMENT</button>
                <a href="https://wa.me/6287881604062" class="btn btn-blue btn-block btn-lg">CONFIRM PAYMENT VIA WHATSAPP</a>
            </div>
        </form>
    </div>
</div>
@stop {{-- local scripts --}} @section('footer_scripts')
<script>
    var url_img = '/uploads/confirmation/';
    $(".url_img-view").fileinput({
        initialPreview: [url_img],
        initialPreviewAsData: true,
        // initialPreviewConfig: [
        //     {downloadUrl: ingredientsurl, key: 1}
        // ],
        theme: "fa",
        showCaption: false,
        showDownload: false,
        showDrag: false,
        showUpload: false
    });

    $(document).ready(function(){
        $('#form').bootstrapValidator().on('success.form.bv', function(e) {
            $('#form').on('submit', function (e) {
                e.preventDefault();
                var form_data = new FormData(this);
                $.ajax({
                    type: 'post',
                    processData: false,
                    contentType: false,
                    "url": "/payment_confirmation/check",
                    data: form_data,
                    beforeSend: function (){
                        $("#submit").prop('disabled', true);
                    },
                    success: function () {
                        alert('From Submitted.');
                        // window.location.href = "/thank_you";
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                        // $("#submit").prop('disabled', false);
                    }
                });
            });
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
<script src="{{asset('vendors/bootstrap-fileinput/js/fileinput.min.js')}}" type="text/javascript"></script>
@stop