@extends('layouts.master')
@section('content')
<div class="container full-container">
    <div class="font-blue h5 mt-3">
        <b>PAYMENT Confirmation</b>
    </div>
    <div class="text-center mt-5 mb-3">
        <!-- <button type="submit" class="btn btn-blue btn-lg">CONFIRM PAYMENT</button> -->
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
                    <input type="number" class="form-control" id="payment_amount" name="payment_amount" min="0" placeholder="Contoh : 1500000" maxlength="20">
                </div>
            </div>
            <div class="form-group">
                <label for="payment_user">References :</label>
                <input type="text" class="form-control" id="payment_references" name="payment_references" placeholder="Contoh : John Doe">
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <input class="url_img-view" id="url_img-input" name="url_img-input" type="file" class="file" accept="image/*">
            </div>
            <div class="text-center mt-5">
                <button type="submit" class="btn btn-blue btn-block btn-lg">CONFIRM PAYMENT</button>
                <a href="https://wa.me/6287881604062" class="btn btn-success btn-block btn-lg">CONFIRM PAYMENT VIA WHATSAPP</a>
            </div>
        </form>
    </div>
</div>
@stop
{{-- local scripts --}} @section('footer_scripts')
<script src="{{asset('vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/bootstrap-fileinput/js/fileinput.min.js')}}" type="text/javascript"></script>
<script>
    // var url_img = '/uploads/confirmation';
    $(".url_img-view").fileinput({
        // initialPreview: [url_img],
        // initialPreviewAsData: true,
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
                    success: function (data) {
                        alert('From Submitted.');
                        window.location.href = "/thank_you";
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