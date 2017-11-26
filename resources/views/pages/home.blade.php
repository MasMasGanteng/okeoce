@extends('layouts.master')
{{-- local styles --}} @section('header_styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet">
<link href="{{asset('vendors/pnotify/css/pnotify.css')}}" rel="stylesheet" type="text/css">
@stop
@section('content')
    <div class="container-fluid">
        <!-- banner -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="image/slider-1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="image/slider-2.jpg" alt="Second slide">
                </div>
            </div>
        </div>
        <!-- call to action -->
        <div class="row no-gutters mx-auto mt-4" style="max-width: 1233px;">
            <div class="col myos-div">
                <div class="row mx-0 align-items-center">
                    <div class="col-7 pl-0">
                    </div>
                    <div class="col pl-0">
                        <a href="javascript:void(0)">
                            <img class="img-fluid" src="image/myos-link.png" alt="Make your own sushi" id="make_your_own">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col rtos-div">
                <div class="row mx-0 align-items-center">
                    <div class="col-5 pl-0">
                    </div>
                    <div class="col pl-4">
                        <a href="javascript:void(0)" >
                            <img class="" src="image/rtos-link.png" alt="Ready to eat sushi" id="ready_to_eat">
                        </a>
                    </div>
                </div>
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