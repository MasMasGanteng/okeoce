@extends('layouts.master') @section('content')
<style type="text/css">
    body{
        background-image: url(/image/about-bg-1.png), url(/image/about-bg-2.png);
        background-position: bottom left, bottom right;
        background-repeat: no-repeat;
        height: auto;
    }
    .container ol{
        -webkit-padding-start:20px;
    }
    ol li {
        margin-bottom: 1rem;
        font-size: .9rem;
    }
</style>
<div class="container full-container">
    <div class="text-center">
        <div class="font-blue h5 mt-3 mb-5">
            <b>Cara Pemesanan</b>
        </div>        
    </div>
    <div class=" col-md-8 col-12 mx-auto">
        <ol type="1">
            <li>Waktu pemesanan jam 10.00 – 17.00</li>
            <li>Minimal order 2 box</li>
            <li>Pemesanan dilakukan melalui website</li>
            <li>Pembayaran melalui transfer ke Rek BCA</li>
            <li>Bukti pembayaran dikirim via WA</li>
            <li>Last order 17.00</li>
            <li>Pemesanan dalam jumlah besar dilakukan 3hr sebelum TANGGAL pengiriman dan dikenakan Dp 50%</li>
            <li>Cancel order dikenakan biaya 15% dari biaya yg sudah dibayarkan.</li>
            <li>Area Pengiriman (DKI JAKARTA)</li>
            <li>Pengiriman dilakukan setelah 30- 60 menit setelah diterima bukti transfer dari customer</li>
        </ol>
    </div>
    <div class="text-center col-md-3 col-12 mx-auto mt-5">
        <a href="/product" class="btn btn-blue btn-lg mt-4 btn-block">Buy Sushi</a>       
    </div>     
</div>
@stop