<div id="order_make_your_own" hidden>
    
        <div class="row no-gutters justify-content-center my-5">
            <img class="img-fluid" src="image/myos-title.png">
        </div>
        <div class="row no-gutters justify-content-md-center">
            <div class="col col-lg-4 pr-2">
                <div class="choose-roll">
                    <div class="cr-text">
                        Roll Kecil
                        <div class="desc">
                            3 Essentials + 1 Sprinkle + 1 House Sauce
                        </div>
                    </div>
                    <div class="cr-checkbox">
                        <input id="cr-1" type="checkbox" value="1">
                        <!-- Use label even if no text required -->
                        <label for="cr-1"></label>
                    </div>
                </div>
            </div>
            <div class="col col-lg-4 pl-2">
                <div class="choose-roll">
                    <div class="cr-text">
                        Roll Besar
                        <div class="desc">
                            5 Essentials + 1 Special + 1 Sprinkle + 1 House Sauce
                        </div>
                    </div>
                    <div class="cr-checkbox">
                        <input id="cr-2" type="checkbox" value="2">
                        <!-- Use label even if no text required -->
                        <label for="cr-2"></label>
                    </div>
                </div>
            </div>
        </div>
        <!-- product list -->
        <div class="row no-gutters justify-content-md-center" id="ingredient" hidden>
            <div class="col col-lg-8 text-center">
                <!-- section 1 -->
                <div id="essential_list">
                    <div class="mt-5 mb-4">
                        <div class="myos-sect-title">
                            Essentials
                        </div>
                        <div class="myos-sect-sub-title" id="essential_roll_kecil">
                            3 Essentials
                        </div>
                        <div class="myos-sect-sub-title" id="essential_roll_besar">
                            5 Essentials
                        </div>
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Charge 7.000 untuk tambah 1 essential</span>
                        </label>
                    </div>
                    <div class="row mx-0 text-center">
                        @foreach($essential_list as $list)
                        <div class="col col-lg-4">
                            <div class="product-list">
                                <div class="img-product">
                                    <img class="img-fluid" src="image/cucumber.jpg">
                                </div>
                                <div class="row mx-0">
                                    <label class="btn-select" for="essential_checked">
                                        {{$list->name}}
                                    </label>
                                    <div class="cr-checkbox">
                                        <input type="text" id="essential_name{{$list->id}}" value="{{$list->name}}" hidden>
                                        <input id="essential_checked{{$list->id}}" name="essential_checked" type="checkbox" value="{{$list->id}}">
                                        <label for="essential_checked{{$list->id}}"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- section 2 -->
                <div id="special_list">
                    <div class="mt-5 mb-4">
                        <div class="myos-sect-title">
                            Specials
                        </div>
                        <div class="myos-sect-sub-title">
                            5 Specials
                        </div>
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Charge 18.000 untuk tambah 1 Specials</span>
                        </label>
                    </div>
                    <div class="row mx-0 text-center">
                        @foreach($special_list as $list)
                        <div class="col col-lg-4">
                            <div class="product-list">
                                <div class="img-product">
                                    <img class="img-fluid" src="image/cucumber.jpg">
                                </div>
                                <div class="row mx-0">
                                    <label class="btn-select" for="special_checked">
                                        {{$list->name}}
                                    </label>
                                    <div class="cr-checkbox">
                                        <input type="text" id="special_name{{$list->id}}" value="{{$list->name}}" hidden>
                                        <input id="special_checked{{$list->id}}" name="special_checked" type="checkbox" value="{{$list->id}}">
                                        <label for="special_checked{{$list->id}}"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- section 3 -->
                <div id="sprinkle_list">
                    <div class="mt-5 mb-4">
                        <div class="myos-sect-title">
                            Sprinkle
                        </div>
                        <div class="myos-sect-sub-title">
                            1 Sprinkle
                        </div>
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Charge 18.000 untuk tambah 1 Sprinkle</span>
                        </label>
                    </div>
                    <div class="row mx-0 text-center">
                        @foreach($sprinkle_list as $list)
                        <div class="col col-lg-4">
                            <div class="product-list">
                                <div class="img-product">
                                    <img class="img-fluid" src="image/cucumber.jpg">
                                </div>
                                <div class="row mx-0">
                                    <label class="btn-select" for="sprinkle_checked">
                                        {{$list->name}}
                                    </label>
                                    <div class="cr-checkbox">
                                        <input type="text" id="sprinkle_name{{$list->id}}" value="{{$list->name}}" hidden>
                                        <input id="sprinkle_checked{{$list->id}}" name="sprinkle_checked" type="checkbox" value="{{$list->id}}">
                                        <label for="sprinkle_checked{{$list->id}}"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- section 4 -->
                <div id="house_sauce_list">
                    <div class="mt-5 mb-4">
                        <div class="myos-sect-title">
                            House Sauce
                        </div>
                        <div class="myos-sect-sub-title">
                            1 House Sauce
                        </div>
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Charge 18.000 untuk tambah 1 House Sauce</span>
                        </label>
                    </div>
                    <div class="row mx-0 text-center">
                        @foreach($house_sauce_list as $list)
                        <div class="col col-lg-4">
                            <div class="product-list">
                                <div class="img-product">
                                    <img class="img-fluid" src="image/cucumber.jpg">
                                </div>
                                <div class="row mx-0">
                                    <label class="btn-select" for="house_sauce_checked">
                                        {{$list->name}}
                                    </label>
                                    <div class="cr-checkbox">
                                        <input type="text" id="house_sauce_name{{$list->id}}" value="{{$list->name}}" hidden>
                                        <input id="house_sauce_checked{{$list->id}}" name="house_sauce_checked" type="checkbox" value="{{$list->id}}">
                                        <label for="house_sauce_checked{{$list->id}}"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- <button class="btn btn-blue my-4" type="submit">DETAIL ORDER</button> -->
                <button type="button" class="btn btn-blue my-4" data-toggle="modal" data-target="#detail_order">DETAIL ORDER</button>
                <!-- <a href="/detail_order" class="btn btn-blue my-4">DETAIL ORDER</a> -->
                <!-- Modal -->
                <div class="modal fade" id="detail_order" role="dialog">
                    <div class="modal-dialog">
                    <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Detail Order</h4>
                                <button type="button" class="btn btn-blue " data-dismiss="modal">&times;</button>
                            </div>
                            <form id="form-makeyourown" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                <div class="modal-body">
                                    <table class="table baiza-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nama Barang</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p id="jns_roll"></p>
                                                    <p>Essential</p>
                                                    <ul id="modal_essential"></ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>Special</p>
                                                    <ul id="modal_special"></ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>Sprinkle</p>
                                                    <ul id="modal_sprinkle"></ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>House Sauce</p>
                                                    <ul id="modal_house_sauce"></ul>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-peach" data-dismiss="modal">Close</button>
                                    <button type="submit" id="submit" class="btn btn-blue">Add to Cart</button>
                                    <button onclick="new PNotify({
                                            title: 'Yayyy you clicked me',
                                            text: 'Haha, made you click'
                                        });">Click Me!</button>
                                </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
{{-- local scripts --}} @section('footer_scripts')
<script>
    //show/hidden order
    $('#make_your_own').click(function() {
        $('#order_make_your_own').prop('hidden', false);
        $('#order_ready_to_eat').prop('hidden', true);
        $('html, body').animate({
            scrollTop: $("#order_make_your_own").offset().top
        }, 1000);
    });
    $('#ready_to_eat').click(function() {
        $('#order_ready_to_eat').prop('hidden', false);
        $('#order_make_your_own').prop('hidden', true);
        $('#ingredient').prop('hidden', true);
        $("#cr-1").prop('checked', false);
        $("#cr-2").prop('checked', false);
        $('html, body').animate({
            scrollTop: $("#order_ready_to_eat").offset().top
        }, 1000);
    });
    //show/hide elemen order roll kecil/besar
    $("#cr-1").change(function() {
        if(this.checked) {
            $("#cr-2").prop('checked', false);
            $('#essential_roll_besar').prop('hidden', true);
            $('#essential_roll_kecil').prop('hidden', false);
            $('#special_list').prop('hidden', true);
            $('input[name="special_checked"]:checked').prop('checked', false);
            $('#ingredient').prop('hidden', false);
            $('html, body').animate({
                scrollTop: $("#essential_list").offset().top
            }, 1000);
        }else{
            $('#ingredient').prop('hidden', true);
            $('html, body').animate({
                scrollTop: $("#cr-1").offset().top
            }, 1000);
        }
    });
    $("#cr-2").change(function() {
        if(this.checked) {
            $("#cr-1").prop('checked', false);
            $('#essential_roll_besar').prop('hidden', false);
            $('#essential_roll_kecil').prop('hidden', true);
            $('#special_list').prop('hidden', false);
            $('#ingredient').prop('hidden', false);
            $('html, body').animate({
                scrollTop: $("#essential_list").offset().top
            }, 1000);
        }else{
            $('#ingredient').prop('hidden', true);
            $('input[name="special_checked"]:checked').prop('checked', false);
            $('html, body').animate({
                scrollTop: $("#cr-2").offset().top
            }, 1000);
        }
    });
    //on modal show
    $('#detail_order').on('shown.bs.modal', function (e) {
        $("#jns_roll").text($('#cr-1:checkbox:checked').length > 0?'Roll Kecil':'Roll Besar');
        $('input[name="essential_checked"]:checked').each(function() {
           $("#modal_essential").append('<li>'+$("#essential_name"+this.value).val()+'</li>');
           $("#modal_essential").append('<input name="essential_choosed[]" type="checkbox" value="'+this.value+'" checked hidden>');
           
        });
        $('input[name="special_checked"]:checked').each(function() {
           $("#modal_special").append('<li>'+$("#special_name"+this.value).val()+'</li>');
           $("#modal_special").append('<input name="special_choosed[]" type="checkbox" value="'+this.value+'" checked hidden>');
        });
        $('input[name="sprinkle_checked"]:checked').each(function() {
           $("#modal_sprinkle").append('<li>'+$("#sprinkle_name"+this.value).val()+'</li>');
           $("#modal_sprinkle").append('<input name="sprinkle_choosed[]" type="checkbox" value="'+this.value+'" checked hidden>');
        });
        $('input[name="house_sauce_checked"]:checked').each(function() {
           $("#modal_house_sauce").append('<li>'+$("#house_sauce_name"+this.value).val()+'</li>');
           $("#modal_house_sauce").append('<input name="house_sauce_choosed[]" type="checkbox" value="'+this.value+'" checked hidden>');
        });
    });
    $('#detail_order').on('hidden.bs.modal', function (e) {
        $("#modal_essential").empty();
        $("#modal_special").empty();
        $("#modal_sprinkle").empty();
        $("#modal_house_sauce").empty();
    });

    $(document).ready(function () {
        $('#form-makeyourown').bootstrapValidator().on('success.form.bv', function(e) {
            $('#form-makeyourown').on('submit', function (e) {
                e.preventDefault();
                var form_data = new FormData(this);
                $.ajax({
                    type: 'post',
                    processData: false,
                    contentType: false,
                    "url": "/add_to_cart",
                    data: form_data,
                    beforeSend: function (){
                        $("#submit").prop('disabled', true);
                    },
                    success: function () {
                        $.pnotify({
                            title: 'Success',
                            text: 'Order Added to Cart.',
                            type: 'success'
                        });
                        // window.location.href = "/";
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                        $("#submit").prop('disabled', false);
                    }
                });
            });
        }).on('error.form.bv', function(e) {
            $("#submit").prop('disabled', false);
        });
    });

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
<script src="{{asset('vendors/pnotify/js/pnotify.js')}}" type="text/javascript"></script>
@stop