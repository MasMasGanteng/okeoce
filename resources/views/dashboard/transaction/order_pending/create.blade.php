@extends('layouts.dashboard')
{{-- local styles --}} @section('header_styles')
@stop
@section('content')
<div class="container full-container">
    <div class="font-blue h5 mt-3 mb-4">
        <b>DETAIL ORDER</b>
    </div>
    <table class="table baiza-table" id="order_table">
        <thead>
            <tr class="header">
                <th scope="col">Nama Barang</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order_product as $op)
            <tr style="border-bottom: 2px solid #ddd">
                <td>
                    {{$op->name}}
                    <ul>
                        <li>Essential</li>
                            <ol type="1">
                            @foreach($order_ingredient_essential as $essential)
                                @if($op->id_order_detail==$essential->order_detail_ref)
                                    <li>{{$essential->name}}</li>
                                @endif
                            @endforeach
                            </ol>
                    </ul>
                    @if($op->id==4)
                    <ul>
                        <li>Special</li>
                            <ol type="1">
                            @foreach($order_ingredient_special as $special)
                                @if($op->id_order_detail==$special->order_detail_ref)
                                    <li>{{$special->name}}</li>
                                @endif
                            @endforeach
                            </ol>
                    </ul>
                    @endif
                    <ul>
                        <li>Sprinkle</li>
                            <ol type="1">
                            @foreach($order_ingredient_sprinkle as $sprinkle)
                                @if($op->id_order_detail==$sprinkle->order_detail_ref)
                                    <li>{{$sprinkle->name}}</li>
                                @endif
                            @endforeach
                            </ol>
                    </ul>
                    <ul>
                        <li>House Sauce</li>
                            <ol type="1">
                            @foreach($order_ingredient_house_sauce as $house_sauce)
                                @if($op->id_order_detail==$house_sauce->order_detail_ref)
                                    <li>{{$house_sauce->name}}</li>
                                @endif
                            @endforeach
                            </ol>
                    </ul>
                </td>
                <td class="jml_product_order"><input class="form-control" id="jml{{$op->id_order_detail}}" type="number" min="1" oninput="calculate({{$op->id_order_detail}})" value="1" required></td>
                <td class="price_product_default">
                    <span id="price{{$op->id_order_detail}}">{{'Rp. '.number_format($op->price,2,",",".")}}</span>
                    <input id="price_hidden{{$op->id_order_detail}}" type="number" min="1" value="{{$op->price}}" hidden>
                </td>
            </tr>
            </div>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="spasi">
                <th scope="col"></th>
            </tr>
            <tr class="total">
                <th scope="col"></th>
                <th scope="col"><span class="font-blue">Total</span></th>
                <th class="total_order_rp" scope="col">
                    <span id="total">{{'Rp. '.number_format($price,2,",",".")}}</span>
                </th>
            </tr>
        </tfoot>
    </table>
    <form id=form>
        <div class="form-row">
           <div class="form-group col-md-4">
                <input type="hidden" class="form-control" name="id" id="id" value="{{$id}}">
                <input type="text" class="form-control" placeholder="NAMA PENERIMA" value="{{$nama_penerima}}">
            </div>
            <div class="form-group col-md-4">
                <input type="number" class="form-control" placeholder="NO HP PENERIMA" value="{{$phone_number}}">
            </div>
            <div class="form-group col-md-4">
                <input type="number" class="form-control" placeholder="KODE POS" value="{{$kode_pos}}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <select id="select-kode_kota-input" name="select-kode_kota-input" class="form-control select2" size="1" required>
                    <option value>Please select</option>
                    @foreach ($kode_kota_list as $list)
                        <option value="{{$list->kode}}" {!! $kode_kota==$list->kode ? 'selected':'' !!}>{{$list->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <select id="select-kode_kec-input" name="select-kode_kec-input" class="form-control select2" size="1" required>
                    <option value>Please select</option>
                    @foreach ($kode_kec_list as $list)
                        <option value="{{$list->kode}}" {!! $kode_kec==$list->kode ? 'selected':'' !!}>{{$list->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <select id="select-kode_kel-input" name="select-kode_kel-input" class="form-control select2" size="1" required>
                    <option value>Please select</option>
                    @foreach ($kode_kel_list as $list)
                        <option value="{{$list->kode}}" {!! $kode_kel==$list->kode ? 'selected':'' !!}>{{$list->nama}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <textarea class="form-control" placeholder="ALAMAT" rows="3">{{$address}}</textarea>
        </div>
        <div class="text-center mt-5 mb-3">
            <button type="submit" class="btn btn-info btn-lg">Manual Confirmation</button>
        </div>
    </form>
</div>
@stop {{-- local scripts --}} @section('footer_scripts')
<script>
    $(document).ready(function(){
        $('#form').bootstrapValidator().on('success.form.bv', function(e) {
            $('#form').on('submit', function (e) {
                e.preventDefault();
                var form_data = new FormData(this);
                var id = $('#id').val();
                $.ajax({
                    type: 'post',
                    processData: false,
                    contentType: false,
                    "url": "/dashboard/order_pending/create",
                    data: form_data,
                    beforeSend: function (){
                        $("#submit").prop('disabled', true);
                    },
                    success: function () {
                        alert('From Submitted.');
                        window.location.href = "/dashboard/order_in";
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                        $("#submit").prop('disabled', false);
                    }
                });
            });
        });
    });
</script>
@stop