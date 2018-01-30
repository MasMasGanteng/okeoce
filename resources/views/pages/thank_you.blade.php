@extends('layouts.master')
@section('content')
<div class="container full-container d-flex justify-content-center align-items-center" style="margin-bottom: 2.3rem;">
    <div class="text-center">
        <div class="font-blue h5 mt-3 mb-4">
            <b>TERIMA KASIH</b>
        </div>
        <div class="h6">
            TERIMA KASIH TELAH MELAKUKAN PEMBAYARAN.<br>
            PESANAN ANDA AKAN SEGERA DI PROSES SETELAH<br>
            PEMBAYARAN DI KONFIRMASI MELALUI EMAIL.<br><br>
            ANDA JUGA BISA MEMANTAU PESANAN ANDA<br>DI <a href="/order_history">ORDER HISTORY</a>
        </div>
        <a href="/" class="btn btn-blue btn-lg mt-4">BACK TO HOME</a>
    </div>
</div>
@stop