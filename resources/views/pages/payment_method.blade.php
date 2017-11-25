@extends('layouts.master')
@section('content')
<div class="container full-container">
    <div class="font-blue h5 mt-3">
        <b>PAYMENT</b>
    </div>
    <div class="h6">
        LIMIT WAKTU TRANSFER
    </div>
    <div class="my-3 py-3 row no-gutters h6" style="border-bottom: 2px solid #dedede;">
        <div class="col">
            TOTAL
        </div>
        <div class="col text-right">
            <b>250000</b>
        </div>
    </div>
    <nav class="nav nav-tabs baiza-nav" id="myTab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">BANK TRANSFER</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">KLIK BCA</a>
    </nav>
    <div class="tab-content baiza-tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
        </div>
    </div>
    <div class="text-center mt-5 mb-3">
        <!-- <button type="submit" class="btn btn-blue btn-lg">CONFIRM PAYMENT</button> -->
        <a href="/payment_confirmation" class="btn btn-blue btn-lg">CONFIRM PAYMENT</a>
    </div>
</div>
@stop