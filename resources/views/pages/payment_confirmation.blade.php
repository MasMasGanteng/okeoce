@extends('layouts.master')
@section('content')
<div class="container full-container">
    <div class="font-blue h5 mt-3 mb-5">
        <b>PAYMENT CONFIRMATION</b>
    </div>
    <form>
        <div class="form-row">
            <div class="form-group col-md-4">
                <input type="text" class="form-control" placeholder="BANK">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" placeholder="ATAS NAMA">
            </div>
            <div class="form-group col-md-4">
                <input type="number" class="form-control" placeholder="TOTAL">
            </div>
        </div>
        <div class="text-center my-3">
            <!-- <button type="submit" class="btn btn-blue btn-lg">CONFIRM</button> -->
            <a href="/thank_you" class="btn btn-blue btn-lg">CONFIRM</a>
        </div>
    </form>
</div>
@stop