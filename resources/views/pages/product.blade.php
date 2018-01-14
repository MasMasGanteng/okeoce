@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <!-- call to action -->
        <div class="row mx-md-0">
            <div class="col product-myos-div">
                <a href="javascript:void(0)">
                    <img class="img-fluid" src="image/product-myos-link.png" alt="Make your own sushi" id="make_your_own">
                </a>
            </div>
            <div class="col product-rtos-div">
                <a href="javascript:void(0)">
                    <img class="img-fluid" src="image/product-rtos-link.png" alt="Ready to eat sushi" id="ready_to_eat">
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
