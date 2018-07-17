@extends('layouts.master')
@section('content')
<div class="container full-container d-flex justify-content-center align-items-center" style="margin-bottom: 2.3rem;">
    <div class="col-lg-6 col-md-8 col-12 mx-auto">
        <div class="font-blue h5 mt-3 mb-5 text-center">
            <b>PAYMENT CONFIRMATION</b>
        </div>
        <form id="form">
            <input type="hidden" id="" name="">
            <div class="form-group">
                <label for="payment_bank">Nama Bank :</label>
                <select class="form-control" id="payment_bank">
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
            <div class="text-center mt-5">
                <a href="/payment_confirmation/check" class="btn btn-blue btn-block btn-lg">CONFIRM PAYMENT</a>
                <a href="https://wa.me/6287881604062" class="btn btn-blue btn-block btn-lg">CONFIRM PAYMENT VIA WHATSAPP</a>
            </div>
        </form>
    </div>
</div>
@stop