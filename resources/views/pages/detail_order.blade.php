@extends('layouts.master')
@section('content')
<div class="container full-container">
    <table class="table">
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
                <th scope="col">Total</th>
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
            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Address 2</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip">
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox"> Check me out
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-blue btn-lg">Sign in</button>
    </form>
</div>
@stop