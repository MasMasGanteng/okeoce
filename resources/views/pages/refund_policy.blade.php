@extends('layouts.master')
@section('content')
<style type="text/css">
    body {
        background: #fff8a0;
        height: auto;
        background-image: url(/image/refund-bg-1.png), url(/image/refund-bg-2.png);
        background-position: center left, bottom right;
        background-repeat: no-repeat;
    }
    .navbar-white {
        background: #fff8a0;
    }
    .container {
        padding: 4em 15px;
    }
    .container h3 {
        margin-bottom: 2em;
        font-weight: 700;
    }
    .container p, .container a {
        font-weight: 700;
        font-size: 1.2rem;
    }
    .container ol {
        -webkit-padding-start: 20px;
    }
    .container ol li {
        font-size: 1rem;
    }
</style>
<div class="container">
    <h3 class="font-blue text-center">REFUND POLICY</h4>
    <p>Kriteria Sushi yang boleh ditukar atau dikembalikan:</p>
    <ol>
        <li>Sushi yang tidak sesuai dengan pesanan (beda topping atau isian)</li>
        <li>Sushi yang packagingnya telah rusak pada saat barang diterima</li>
        <li>Sushi basi saat pengiriman</li>
        <li>Sushi tidak sesuai dengan pesanan (contoh: salah isian atau neta )</li>
        <li>Sushi tidak sesuai dengan spesifikasi, deskripsi dan gambar pada website dikarenakan kesalahan dari website</li>
    </ol>
    <p class="mt-5">Syarat dan Ketentuan</p>
    <ol>
        <li>Konsumen dapat melaporkan kerusakan produk dan deskripsi singkat mengenai kerusakan produk tersebut paling lambat 3 (tiga) hari kerja&nbsp;dari waktu Anda menerima produk dengan menghubungi Call Center Baiza Sushi.</li>
        <li>Pengembalian barang hanya berlaku paling lambat 1x24 jam setelah Anda menerima email konfirmasi.</li>
        <li>Konsumen wajib melakukan konfirmasi ke call center Baiza Sushi dan melakukan konfirmasi menyertakan bukti ke email Baiza Sushi baizasushi@gmail.com . Konsumen akan mendapatkan konfirmasi balasan melalui email.</li>
        <li>Surat Konfirmasi dan Bukti Pembayaran serta bukti percakapan antara Admin dan Customer harus dilampirkan pada saat pengiriman pengembalian Sushi. Jika persyaratan tersebut tidak dilampirkan, kami berhak untuk menolak pemrosesan pengembalian Sushi.</li>
        <li>Semua barang (beserta kemasan asli) yang akan dikembalikan harus dalam kondisi yang sama (masih utuh, tidak pernah makan, tidak kotor,).</li>
        <li>Untuk Sushi yang tidak dapat dimakan atau sudah basi (jika sudah lebih dari&nbsp;3 (tiga) hari kerja&nbsp;setelah Anda terima), kami sarankan untuk langsung meng hubungi layanan service center produk tersebut agar dapat memperoleh penanganan langsung.</li>
        <li>Refund hanya dapat diberikan jika stock sushi yang ingin Anda tukar tidak terse dia di Restaurant kami dan jika terdapat kesalahan pengiriman barang yang dise babkan oleh kesalahan dari kami.</li>
        <li>Semua&nbsp;penukaran dan pengembalian barang menjadi pertimbangan Baiza Sushi.</li>
        <li>Alamat untuk pengembalian : Baiza Sushi Jalan Taman Patra XI, No 11 Kuningan Timur, Setiabudi, Jakarta Selatan. Call Center:&nbsp; +628117112112 (Senin-Jumat pukul 08.00-17.00)</li>
    </ol>
</div>
@stop