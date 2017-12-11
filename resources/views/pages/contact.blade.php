@extends('layouts.master')
@section('content')
<style type="text/css">
    body {
        background: #79c6cc;
        height: auto;
        background-image: url(/image/refund-bg-1.png), url(/image/refund-bg-2.png);
        background-position: center left, bottom right;
        background-repeat: no-repeat;
    }
    .navbar-white {
        background: none;
    }
    .contact-container {
        height: calc(100% - 12.2em);
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        font-size: 1.4rem;
    }
    .contact-container .content .h3 {
        text-align: center;
        font-weight: 700;
    }
    .contact-container .content .bold {
        font-weight: 600;
    }
    /*.container h4 {
        margin-bottom: 2em;
        font-weight: 700;
    }
    .container p, .container a {
        font-weight: 700;
        font-size: .9rem;
    }
    .container ol {
        -webkit-padding-start: 20px;
    }*/
</style>
<div class="container contact-container">
    <div class="content col-5">
        <div class="h3 font-blue">CONTACT US</div>
        <div class="mt-5 mb-3">
            Baiza Sushi<br>Jalan Taman Patra XI, No 11 Kuningan Timur, Setiabudi, Jakarta Selatan.
        </div>
        <div class="bold">Call Center</div> +628117112112<br>(Senin-Jumat pukul 08.00-17.00)
    </div>
</div>
@stop