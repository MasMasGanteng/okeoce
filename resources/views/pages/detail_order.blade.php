@extends('layouts.master')
@section('content')
<div class="container full-container">
    <div class="font-blue h5 mt-3 mb-4">
        <b>DETAIL ORDER</b>
    </div>
    <div class="table-responsive-sm mb-4">
        <table class="table baiza-table" id="order_table">
            <thead>
                <tr class="header">
                    <th scope="col" class="w-50">Nama Barang</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col" class="w-25">Harga</th>
                    <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order_product as $op)
                <tr>
                    <td>
                        <p><b>{{$op->name}}</b></p>
                        @if(in_array($op->id,array(3,4)))
                        <ul>
                            <li>Essential</li>
                            <ol type="1">
                                @foreach($order_ingredient_essential as $essential) @if($op->id_order_detail==$essential->order_detail_ref)
                                <li>{{$essential->name}}</li>
                                @endif @endforeach
                            </ol>
                        </ul>
                        @if($op->id==4)
                        <ul>
                            <li>Special</li>
                            <ol type="1">
                                @foreach($order_ingredient_special as $special) @if($op->id_order_detail==$special->order_detail_ref)
                                <li>{{$special->name}}</li>
                                @endif @endforeach
                            </ol>
                        </ul>
                        @endif
                        <ul>
                            <li>Sprinkle</li>
                            <ol type="1">
                                @foreach($order_ingredient_sprinkle as $sprinkle) @if($op->id_order_detail==$sprinkle->order_detail_ref)
                                <li>{{$sprinkle->name}}</li>
                                @endif @endforeach
                            </ol>
                        </ul>
                        <ul>
                            <li>House Sauce</li>
                            <ol type="1">
                                @foreach($order_ingredient_house_sauce as $house_sauce) @if($op->id_order_detail==$house_sauce->order_detail_ref)
                                <li>{{$house_sauce->name}}</li>
                                @endif @endforeach
                            </ol>
                        </ul>
                        @endif
                    </td>
                    <td class="jml_product_order">
                        <input class="form-control" id="jml{{$op->id_order_detail}}" type="number" min="1" oninput="calculate({{$op->id_order_detail}})" value="{{$op->jumlah}}" required>
                    </td>
                    <td class="price_product_default">
                        <span id="price{{$op->id_order_detail}}">{{'Rp. '.number_format($op->price,2,",",".")}}</span>
                        <input id="price_hidden{{$op->id_order_detail}}" type="number" min="1" value="{{$op->price}}" hidden>
                    </td>
                    <td>
                        <button id="cancel{{$op->id_order_detail}}" data-toggle="modal" data-target="#center_modal{{$op->id_order_detail}}" class="btn btn-peach btn-lg">Cancel</button>
                    </td>
                </tr>
                <div id="center_modal{{$op->id_order_detail}}" class="modal fade animated" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Cancel</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <p>You are about to cancel this order.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Back
                                </button>
                                <button type="button" id="dodol" onclick='delete_a("/detail_order/delete?id={{$op->id_order_detail}}");' data-dismiss="modal" class="btn btn-effect-ripple btn-primary">
                                    Ok
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="spasi">
                    <th scope="col"></th>
                </tr>
                <tr class="total">
                    <th scope="col"></th>
                    <th scope="col"><span class="font-blue">Ongkos Kirim</span></th>
                    <th class="ongkir_rp" scope="col">
                        <span id="ongkir"></span>
                    </th>
                </tr>
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
    </div>
    
    <div>
        <div class="font-blue h5 mt-3 mb-4">
            <b>DETAIL PENGIRIMAN</b>
        </div>
        <form id="form">
            <input type="hidden" id="id" name="id" value="{{$id}}">
            <input type="hidden" id="total_order_price" name="total_order_price">
            <input type="hidden" id="up" name="up">
            <input type="hidden" id="jml_all_id" name="jml_all_id">
            <input type="hidden" id="hidden_total" name="hidden_total">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="nama_penerima" placeholder="NAMA PENERIMA" maxlength="100" value="{{$nama_penerima}}" required>
                </div>
                <div class="form-group col-md-4">
                    <input type="tel" class="form-control" name="phone_number" placeholder="NO HP PENERIMA" maxlength="20" value="{{$phone_number}}" required>
                </div>
                <div class="form-group col-md-4">
                    <input type="number" class="form-control" name="kode_pos" placeholder="KODE POS" min="0" maxlength="5" value="{{$kode_pos}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <select id="select-kode_kota-input" name="select-kode_kota-input" class="form-control select2" size="1" required>
                        <option value>Please select</option>
                        @if ($kode_kota_list!=null) @foreach ($kode_kota_list as $list)
                        <option value="{{$list->kode}}" {!! $kode_kota==$list->kode ? 'selected':'' !!}>{{$list->nama}}</option>
                        @endforeach @endif
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <select id="select-kode_kec-input" name="select-kode_kec-input" class="form-control select2" size="1" required>
                        <option value>Please select</option>
                        @if ($kode_kec_list!=null) @foreach ($kode_kec_list as $list)
                        <option value="{{$list->kode}}" {!! $kode_kec==$list->kode ? 'selected':'' !!}>{{$list->nama}}</option>
                        @endforeach @endif
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <select id="select-kode_kel-input" name="select-kode_kel-input" class="form-control select2" size="1" required>
                        <option value>Please select</option>
                        @if ($kode_kel_list!=null) @foreach ($kode_kel_list as $list)
                        <option value="{{$list->kode}}" {!! $kode_kel==$list->kode ? 'selected':'' !!}>{{$list->nama}}</option>
                        @endforeach @endif
                    </select>
                </div>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="address" placeholder="ALAMAT" rows="3">{{$address}}</textarea>
            </div>
            <div class="text-center mt-5 mb-3">
                <button type="submit" class="btn btn-blue btn-lg" {{!! $id!=null? '': 'disabled' !!}}>PROCEED TO PAYMENT</button>
                <!-- <a href="/payment_method" class="btn btn-blue btn-lg">PAYMENT</a> -->
            </div>
        </form>
    </div>
</div>
@stop {{-- local scripts --}} @section('footer_scripts')

<script src="{{asset('vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}" type="text/javascript"></script>
<script>
    var id = $('#id').val();
    var hidden_total = $('#hidden_total');

    function delete_a(url){
        window.location = url;
    };

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
        $('#hidden_total').val(total);

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

        var unique_number = {!! $up !!};
        var set = (total+unique_number).toString();
        $('#total_order_price').val(total+unique_number);
        set += '';
        x = set.split('.');
        x1 = x[0];
        x2 = ',00';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
        }
        $('#total').text('Rp. '+(x1 + x2));
        $('#hidden_total').val(total+unique_number);
    };
    $('#order_table').on('input', 'input', function () {
        total_harga();
    });
    $(document).ready(function(){
        total_harga();
        $('#form').bootstrapValidator().on('success.form.bv', function(e) {
            $('#form').on('submit', function (e) {
                e.preventDefault();
                var form_data = new FormData(this);
                form_data.append('up',{!! $up !!});
                var order_detail = {!! json_encode($order_product) !!};
                for(i=0;i<order_detail.length;i++){
                    form_data.append('jml'+order_detail[i].id_order_detail, parseInt($('#jml'+order_detail[i].id_order_detail).val()) || 1);
                }
                $.ajax({
                    type: 'post',
                    processData: false,
                    contentType: false,
                    "url": "/detail_order/create",
                    data: form_data,
                    beforeSend: function (){
                        $("#submit").prop('disabled', true);
                    },
                    success: function (data) {
                        alert('From Submitted.');
                        window.location.href = "/payment_method?id="+data;
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                        $("#submit").prop('disabled', false);
                    }
                });
            });
        });

        var kota = $('#select-kode_kota-input');
        var kec = $('#select-kode_kec-input');
        var kel = $('#select-kode_kel-input');
        var kota_id,kec_id,kel_id;

        kota.change(function(){
            kota_id=kota.val();
            if(kota_id!=''){
                kec.empty();
                kec.append("<option value>Please select</option>");
                $.ajax({
                    type: 'get',
                    "url": "/detail_order/select?kec="+kota_id,
                    success: function (data) {
                        data=JSON.parse(data)
                        for (var i=0;i<data.length;i++){
                            kec.append("<option value="+data[i].kode+" >"+data[i].nama+"</option>");
                        }
                    }
                });
                if(kota_id == 3171 || kota_id == 3173){
                    $('#ongkir').text('Rp. 25.000,00');
                    
                    var ongkir = 25000;
                    var totals = $('#hidden_total').val();
                    var totals_ongkir = parseInt(totals) + parseInt(ongkir);

                    var set = totals_ongkir.toString();
                    set += '';
                    x = set.split('.');
                    x1 = x[0];
                    x2 = ',00';
                    var rgx = /(\d+)(\d{3})/;
                    while (rgx.test(x1)) {
                        x1 = x1.replace(rgx, '$1' + '.' + '$2');
                    }
                    $('#total').text('Rp. '+(x1 + x2));
                    $('#total_order_price').val(totals_ongkir);

                }else if(kota_id == 3172 || kota_id == 3174 || kota_id == 3175){
                    $('#ongkir').text('Rp. 30.000,00');

                    var ongkir = 30000;
                    var totals = $('#hidden_total').val();
                    var totals_ongkir = parseInt(totals) + parseInt(ongkir);

                    var set = totals_ongkir.toString();
                    set += '';
                    x = set.split('.');
                    x1 = x[0];
                    x2 = ',00';
                    var rgx = /(\d+)(\d{3})/;
                    while (rgx.test(x1)) {
                        x1 = x1.replace(rgx, '$1' + '.' + '$2');
                    }
                    $('#total').text('Rp. '+(x1 + x2));
                    $('#total_order_price').val(totals_ongkir);
                }else if(kota_id == 3216 || kota_id == 3603 || kota_id ==  3671){
                    $('#ongkir').text('Rp. 40.000,00');

                    var ongkir = 40000;
                    var totals = $('#hidden_total').val();
                    var totals_ongkir = parseInt(totals) + parseInt(ongkir);

                    var set = totals_ongkir.toString();
                    set += '';
                    x = set.split('.');
                    x1 = x[0];
                    x2 = ',00';
                    var rgx = /(\d+)(\d{3})/;
                    while (rgx.test(x1)) {
                        x1 = x1.replace(rgx, '$1' + '.' + '$2');
                    }
                    $('#total').text('Rp. '+(x1 + x2));
                    $('#total_order_price').val(totals_ongkir);
                }
            }
        });
        
        kec.change(function(){
            kec_id=kec.val();
            if(kec_id!=''){
                kel.empty();
                kel.append("<option value>Please select</option>");
                $.ajax({
                    type: 'get',
                    "url": "/detail_order/select?kel="+kec_id,
                    success: function (data) {
                        data=JSON.parse(data)
                        for (var i=0;i<data.length;i++){
                            kel.append("<option value="+data[i].kode+" >"+data[i].nama+"</option>");
                        }
                    }
                });
            }
        });
    });
</script>
@stop