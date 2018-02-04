@extends('layouts.master')
@section('content')
<div class="container full-container d-flex justify-content-center align-items-center" style="margin-bottom: 2.3rem;">
    <div class="col-lg-6 col-md-8 col-12 mx-auto">
        <div class="font-blue h5 mt-3 mb-5 text-center">
            <b>PAYMENT CONFIRMATION</b>
        </div>
        <form>
            <div class="form-group">
                <label for="payment_bank">Nama Bank :</label>
                <select class="form-control" id="payment_bank">
                    <option>Bank BCA</option>
                </select>
            </div>
            <div class="form-group">
                <label for="payment_user">Nama :</label>
                <input type="text" class="form-control" id="payment_user" placeholder="Contoh : John Doe">
            </div>
            <div class="form-group">
                <label for="payment_account_number">No. Rekening :</label>
                <input type="text" class="form-control" id="payment_account_number" placeholder="Contoh : 123456789">
            </div>
            <div class="form-group">
                <label for="payment_account_number">Total Pembayaran :</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Rp</div>
                    </div>
                    <input type="text" class="form-control" id="payment_account_number" placeholder="Contoh : 1500000">
                </div>
            </div>
            <div class="text-center mt-5">
                <!-- <button type="submit" class="btn btn-blue btn-lg">CONFIRM</button> -->
                <a href="/thank_you" class="btn btn-blue btn-block btn-lg">CONFIRM PAYMENT</a>
            </div>
        </form>
    </div>
</div>
@stop