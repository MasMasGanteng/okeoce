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
                <td>
                    Roll Kecil
                    <ul>
                        <li>Acar Timun</li>
                        <li>Timun</li>
                        <li>Tuna</li>
                    </ul>
                </td>
                <td>2</td>
                <td>15000</td>
            </tr>
            <tr>
                <td>California Makiki</td>
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
            <!-- <button type="submit" class="btn btn-blue btn-lg">PAYMENT</button> -->
            <a href="/payment_method" class="btn btn-blue btn-lg">PAYMENT</a>
        </div>
    </form>
</div>
@stop