@extends('layouts.master')
@section('content')
<div class="container full-container">
    <div class="font-blue h5 mt-3">
        <b>PAYMENT</b>
    </div>
    <!-- <div class="h6">
        LIMIT WAKTU TRANSFER
    </div> -->
    <div class="my-3 py-3 row no-gutters h6" style="border-bottom: 2px solid #dedede;">
        <div class="col">
            TOTAL
        </div>
        <div class="col text-right">
            <b>{{$price}}</b>
        </div>
    </div>
    <nav class="nav nav-tabs baiza-nav" id="myTab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">BANK TRANSFER</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">KLIK BCA</a>
    </nav>
    <div class="tab-content baiza-tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <p>Melalui rekening BCA :</p>
            <ul>
                <li>Masukkan kartu ATM dan PIN ATM Anda</li>
                <li>Pilih menu lainnya</li>
                <li>Pilih menu TRANSFER</li>
                <li>Pilih menu ke Rekening BCA</li>
                <li>Masukkan nominal transfer sesuai dengan tagihan yang tertera pada website, pastikan Anda membayar sesuai dengan jumlah tagihan pembayaran tepat hingga 3 digit terakhir. Perbedaan nilai transfer akan menghambat proses verifikasi.</li>
                <li>Masukkan rekening <strong>0353202038 a/n PT. Arkamaya Baiza Pandhapa</strong></li>
                <li>Pilih Benar </li>
                <li>Selesai</li>
            </ul>
            <p>Melalui rekening bank lain :</p>
            <ul>
                <li>Masukkan kartu ATM dan PIN ATM Anda</li>
                <li>Pilih menu lainnya</li>
                <li>Pilih menu TRANSFER</li>
                <li>Pilih Ke Rekening Bank Lain</li>
                <li>Masukkan kode bank BCA “014”</li>
                <li>Pilih lanjut</li>
                <li>Masukkan rekening <strong>0353202038 a/n PT. Arkamaya Baiza Pandhapa</strong></li>
                <li>Masukkan nominal transfer sesuai dengan tagihan yang tertera pada website, pastikan Anda membayar sesuai dengan jumlah tagihan pembayaran tepat hingga 3 digit terakhir. Perbedaan nilai transfer akan menghambat proses verifikasi.</li>
                <li>Pilih Benar </li>
                <li>Selesai</li>
            </ul>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <p>Melalui Klik BCA :</p>
            <ul>
                <li>Pilih metode pembayaran “KlikBCA” lalu masukkan userid KlikBCA-mu</li>
                <li>Login ke akun KlikBCA-mu</li>
                <li>Masukkan respon dari token lalu klik “Kirim”</li>
            </ul>
            <small>*Note : Kamu punya waktu 2 jam untuk melakukan pembayaran dengan KlikBCA.</small>
        </div>
    </div>
    <div class="text-center mt-5 mb-3">
        <!-- <button type="submit" class="btn btn-blue btn-lg">CONFIRM PAYMENT</button> -->
        <form id="form">
            <input type="hidden" id="id" name="id" value="{{$id}}">
            <input type="hidden" id="payment_method" name="payment_method" value="1">
            <button type="submit" class="btn btn-blue btn-lg">CONFIRM PAYMENT</button>
        </form>
    </div>
</div>
@stop
{{-- local scripts --}} @section('footer_scripts')
<script src="{{asset('vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}" type="text/javascript"></script>
<script>
    $('#nav-home-tab').on('click', function(){
        $('#payment_method').val(1);
    });
    $('#nav-profile-tab').on('click', function(){
        $('#payment_method').val(2);
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
                    "url": "/payment_method/create",
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