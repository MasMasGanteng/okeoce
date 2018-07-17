@extends('layouts.master')
@section('content')
<style type="text/css">
    body{height:auto;background-image:url(/image/refund-bg-1.png), url(/image/refund-bg-2.png);background-position:bottom left, top right;background-repeat:no-repeat}.contact-container{display:flex;justify-content:center;align-items:center;font-size:1.4rem}.contact-container .content .h3{text-align:center;font-weight:700}.contact-container .content .bold{font-weight:600}@media only screen and (max-width: 576px){body{background-image:none;height:auto}.contact-container{font-size:1rem}}
</style>
<div class="container contact-container">
    <div class="content col-lg-6 col-md-8 col-12">
        <div class="h3 font-blue">CONTACT US</div>
        <div class="embed-responsive embed-responsive-4by3 mt-5">
        	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.049114793569!2d106.81787931426909!3d-6.257260663003414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3d524793b99%3A0x148388f5c81ef2f3!2sBaiza+Sushi!5e0!3m2!1sen!2sid!4v1531790715625" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="mt-2 mb-3">
            Baiza Sushi<br><br>
            Store :<br>Jl. Kemang Utara 29, Jakarta Selatan<br><br>
            Office :<br>Jalan Taman Patra XI, No 11 Kuningan Timur, Setiabudi, Jakarta Selatan.
        </div>
        <div class="bold">Call Center</div> +628117112112<br>(Senin-Jumat pukul 08.00-17.00)
    </div>
</div>
@stop