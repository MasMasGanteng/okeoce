@extends('layouts.master')
@section('content')
<div class="container full-container">
	<div class="font-blue h5 mt-3 mb-4">
        <b>RIWAYAT PEMESANAN</b>
    </div>
    <div class="table-responsive">
    	<table class="table baiza-table-order">
    		<thead>
                <tr class="header">
                	<th scope="col">No. Order</th>
                    <th scope="col">Detail Order</th>
                    <th scope="col">Detail Pengiriman</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
            	<tr>
            		<td><div class="price">BSRE001</div></td>
            		<td>
            			<div class="mb-3">
            				<span class="text-danger">Date : 30-01-2018</span>
            			</div>
            			<div class="d-flex flex-column mb-2">
            				<span><b>Sosis Fried Roll</b></span>
            				<span>Qty : 1</span>
            				<span>Price : Rp. 35.000</span>
            			</div>
            		</td>
            		<td>            			
            			<div class="d-flex flex-column">
            				<span><b>H. Saaba</b></span>
            				<span>
            					Jl. in aja dulu kali aja cocok<br>
            					Kelurahan, Kecamatan, Kotamadya<br>
            				</span>
            				<span>
            					08123456789
            				</span>
            			</div>
            		</td>
            		<td>
            			<div class="price">Rp. 35.000</div>
            		</td>
            		<td>
            			<a href="/payment_confirmation" class="btn btn-blue btn-block">Konfirmasi</a>
            		</td>
            	</tr>
            	<tr>
            		<td><div class="price">BSRE002</div></td>
            		<td>
            			<div class="mb-3">
            				<span class="text-danger">Date : 30-01-2018</span>
            			</div>
            			<div class="d-flex flex-column mb-2">
            				<span><b>Sosis Fried Roll</b></span>
            				<span>Qty : 2</span>
            				<span>Price : Rp. 70.000</span>
            			</div>
            			<div class="d-flex flex-column mb-2">
            				<span><b>Roll Besar</b></span>
            				<span>Essentials : Timun, Telur, Tamago,</span>
            				<span>Special : Timun</span>
            				<span>Sprinkle : Nori</span>
            				<span>House Sauce : Lemon Sauce</span>
            				<span>Qty : 1</span>
            				<span>Price : Rp. 35.000</span>
            			</div>
            		</td>
            		<td>
            			<div class="d-flex flex-column">
            				<span><b>Cherid Anis</b></span>
            				<span>
            					Jl. in aja dulu kali aja cocok<br>
            					Kelurahan, Kecamatan, Kotamadya<br>
            				</span>
            				<span>
            					08123456789
            				</span>
            			</div>
            		</td>
            		<td>
            			<div class="price">Rp. 105.000</div>
            		</td>
            		<td>
            			<button class="btn btn-warning btn-block">On Progress</button>
            			<button class="btn btn-info btn-block">On Delivery</button>
            		</td>
            	</tr>
            	<tr>
            		<td><div class="price">BSRE003</div></td>
            		<td>
            			<div class="mb-3">
            				<span class="text-danger">Date : 30-01-2018</span>
            			</div>
            			<div class="d-flex flex-column mb-2">
            				<span><b>Roll Kecil</b></span>
            				<span>Essentials : Timun, Telur, Tamago,</span>
            				<span>Sprinkle : Nori</span>
            				<span>House Sauce : Lemon Sauce</span>
            				<span>Qty : 2</span>
            				<span>Price : Rp. 35.000</span>
            			</div>
            		</td>
            		<td>
            			<div class="d-flex flex-column">
            				<span><b>Alexis Sanchez</b></span>
            				<span>
            					Deket Ancol<br>
            					Kelurahan, Kecamatan, Kotamadya<br>
            				</span>
            				<span>
            					08123456789
            				</span>
            			</div>
            		</td>
            		<td>
            			<div class="price">Rp. 75.000</div>
            		</td>
            		<td>
            			<button class="btn btn-success btn-block">Sukses</button>
            			<button class="btn btn-danger btn-block">Gagal</button>
            		</td>
            	</tr>
            </tbody>
    	</table>
    </div>
</div>
@stop

{{-- local scripts --}}
@section('footer_scripts')

@stop