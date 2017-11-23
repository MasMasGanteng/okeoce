@extends('layouts.master')
@section('content')
<div class="container full-container">
    <div class="font-blue h5 mt-3 mb-4">
        <b>DETAIL ORDER</b>
    </div>
    <table class="table baiza-table">
        <thead>
            <tr>
                <th scope="col">Nama Barang</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Harga</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th scope="col"></th>
            </tr>
            <tr>
                <th scope="col"></th>
                <th scope="col"><span class="font-blue">Total</span></th>
                <th scope="col">265000</th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td>Product 1</td>
                <td>2</td>
                <td>15000</td>
            </tr>
            <tr>
                <td>Product 2</td>
                <td>5</td>
                <td>250000</td>
            </tr>
        </tbody>
    </table>
    <form>
        <div class="form-row">
            <div class="form-group col-md-4">
                <input type="text" class="form-control" placeholder="NAMA PENERIMA">
            </div>
            <div class="form-group col-md-4">
                <input type="number" class="form-control" placeholder="NO HP PENERIMA">
            </div>
            <div class="form-group col-md-4">
                <input type="number" class="form-control" placeholder="KODE POS">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <select class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <select class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <select class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <textarea class="form-control" placeholder="ALAMAT" rows="3"></textarea>
        </div>
        <div class="text-center mt-5 mb-3">
            <button type="submit" class="btn btn-blue btn-lg">PAYMENT</button>
        </div>
    </form>
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
            <button type="submit" class="btn btn-blue btn-lg">CONFIRM</button>
        </div>
    </form>
    <div class="text-center">
        <div class="font-blue h5">
            <b>TERIMA KASIH</b>
        </div>
        <div class="h6">
            TERIMA KASIH TELAH MELAKUKAN PEMBAYARAN.<br>
            PESANAN ANDA AKAN SEGERA DI PROSES SETELAH<br>
            PEMBAYARAN DI KONFIRMASI MELALUI EMAIL.
        </div>
        <button class="btn btn-blue btn-lg mt-4" type="button">FINISH</button>
    </div>
</div>
@stop