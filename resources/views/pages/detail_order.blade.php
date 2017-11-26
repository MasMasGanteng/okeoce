@extends('layouts.master')
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
                <th scope="col">Option</th>
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
                    @if($op->id==3)
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
                <td class="jml_product_order"><input class="form-control" id="jml{{$op->id}}" type="number" min="1" oninput="calculate({{$op->id}})" value="1" required></td>
                <td class="price_product_default">
                    <span id="price{{$op->id}}">{{'Rp. '.number_format($op->price,2,",",".")}}</span>
                    <input id="price_hidden{{$op->id}}" type="number" min="1" value="{{$op->price}}" hidden>
                </td>
                <td><button id="cancel{{$op->id}}" class="btn btn-peach btn-lg">Cancel</button></td>
            </tr>
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
                    <span id="total"></span>
                </th>
            </tr>
        </tfoot>
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
@stop {{-- local scripts --}} @section('footer_scripts')
<script>
    function calculate(id_product){
        var jml = parseInt($('#jml'+id_product).val()) || 0;
        var harga = parseInt($('#price_hidden'+id_product).val()) || 0;
        var total = jml * harga;
        var set = total.toString();
        set += '';
        x = set.split('.');
        x1 = x[0];
        x2 = ',00';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
        }
        $('#price'+id_product).text('Rp. '+(x1 + x2));
    };

    function total_harga(){
        var dataRows = $("#order_table tbody tr");

        var jml = new Array();
        var price = new Array();
        var total = 0;

        dataRows.each(function(){
            $(this).find('.jml_product_order input').each(function(i){
                jml.push(parseInt($(this).val()) || 0);
            });
            $(this).find('.price_product_default input').each(function(i){
                price.push(parseInt($(this).val()) || 0);
            });
        });


        if(jml.length==price.length){
            for(i=0;i<jml.length;i++){
                total+=(jml[i]*price[i]);
            }
        }

        var set = total.toString();
        set += '';
        x = set.split('.');
        x1 = x[0];
        x2 = ',00';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
        }
        $('#total').text('Rp. '+(x1 + x2));
    };
    $('#order_table').on('input', 'input', function () {
        total_harga();
    });
    $(document).ready(function(){
        total_harga();
    });
</script>
@stop