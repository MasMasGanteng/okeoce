@extends('layouts.master')
@section('content')
    <style type="text/css">
        body {
            background: #fff8a0;
            height: auto;
        }
        .navbar-white {
            background: none;
        }
        .footer {
            margin-top: 0;
        }
        @media (min-height: 768px) {
            body {
                height: 100%;
            }
            .about-container {
                height: calc(100% - 20em);
            }
        }
    </style>
    <div class="container-fluid about-container">
        <!-- call to action -->
        <div class="row mx-0" style="max-width: 1233px;">
            <div class="col-md-4 col-12 text-center">
                <img class="img-fluid" src="image/about-img.png">
            </div>
            <div class="col-md-6 col-12">
                <div class="h6">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
            </div>
        </div>
    </div>
@stop