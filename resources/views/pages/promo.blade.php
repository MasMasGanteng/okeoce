@extends('layouts.master')
@section('content')
    @foreach($promo_list as $list)
    <div class="container">
        <img class="d-block w-100" src="uploads/front/banner/{{$list->url_img_banner}}">
        <div class="promo-detail">
            <div class="title">
                {{$list->title}}<br>
                Berlaku Hingga<br>
                {{$list->end_date}}
            </div>
            <div class="content">
                Syarat & ketentuan:<br>
                {{$list->description}}
            </div>
            <div class="contact">
                Lokasi & Contact :<br>
                {{$list->location}}
            </div>
        </div>
        <button class="btn btn-blue btn-toggle-promo" id="{{$list->id}}" type="button">DETAIL PROMO</button>
    </div>
    @endforeach
@stop
{{-- local scripts --}} @section('footer_scripts')
<script>
    
</script>
@stop