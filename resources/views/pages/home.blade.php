@extends('layouts.master')
{{-- local styles --}} @section('header_styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet">
@stop
@section('content')
    <div class="container-fluid">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($banner_list as $index => $banner)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$index}}" class="@if($index == 0) {{ 'active' }} @endif"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach($banner_list as $index => $banner)
                <div class="carousel-item @if($index == 0) {{ 'active' }} @endif">
                    <img class="d-block w-100" src="uploads/front/banner/{{$banner->url_img_banner}}" alt="{{$banner->description}}">
                </div>
                @endforeach
            </div>
        </div>
        <!-- call to action -->
        <div class="row no-gutters mx-auto mt-4" style="max-width: 1233px;">
            <input type="text" id="user" name="user" value="{{$user}}" hidden>
            <div class="col-12 col-lg-6 myos-div">
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
            <div class="col-12 col-lg-6 rtos-div">
                <div class="row mx-0 align-items-center">
                    <div class="col-5 pl-0">
                    </div>
                    <div class="col pl-5">
                        <a href="javascript:void(0)" >
                            <img class="img-fluid" src="image/rtos-link.png" alt="Ready to eat sushi" id="ready_to_eat">
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