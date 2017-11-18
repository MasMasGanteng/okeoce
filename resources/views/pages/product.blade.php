@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <!-- call to action -->
        <div class="row no-gutters">
            <div class="col product-myos-div">
                <a href="#">
                    <img class="img-fluid" src="image/product-myos-link.png">
                </a>
            </div>
            <div class="col product-rtos-div">
                <a href="#">
                    <img class="img-fluid" src="image/product-rtos-link.png">
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- make your own sushi -->
        @include('partials.makesushi')
        <!-- ready to eat sushi -->
        @include('partials.buysushi')
    </div>
@stop