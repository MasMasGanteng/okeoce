<div id="order_make_your_own" hidden>
    <div class="text-center m-5">
        <img class="img-fluid" src="image/myos-title.png">
    </div>
        <div class="row no-gutters justify-content-md-center">
            <div class="col col-lg-4 m-2">
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
            <div class="col col-lg-4 m-2">
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
                            <input type="checkbox" class="custom-control-input" name="add_essential">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Charge 7.000 untuk tambah 1 essential</span>
                        </label>
                    </div>
                    <div class="scroll-div">
                        <div class="row mx-0 text-center scroll-gallery">
                            <input type="number" id="limit_essential" hidden> @foreach($essential_list as $list)
                            <div class="col col-md-3 col-lg-4 pb-3">
                                <div class="product-list">
                                    <div class="img-product d-flex align-items-end justify-content-center">
                                        <img class="img-fluid" src="uploads/product/ingredients/{{$list->url_img_ingredients}}">
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
                </div>
                <!-- section 2 -->
                <div id="special_list">
                    <div class="mt-5 mb-4">
                        <div class="myos-sect-title">
                            Specials
                        </div>
                        <div class="myos-sect-sub-title">
                            1 Specials
                        </div>
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="add_special">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Charge 18.000 untuk tambah 1 Specials</span>
                        </label>
                    </div>
                    <div class="scroll-div">
                        <div class="row mx-0 text-center scroll-gallery">
                            <input type="number" id="limit_special" value="1" hidden>
                            @foreach($special_list as $list)
                            <div class="col col-md-4 col-lg-4 pb-3">
                                <div class="product-list">
                                    <div class="img-product d-flex align-items-end justify-content-center">
                                        <img class="img-fluid" src="uploads/product/ingredients/{{$list->url_img_ingredients}}">
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
                            <input type="checkbox" class="custom-control-input" name="add_sprinkle">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Charge 18.000 untuk tambah 1 Sprinkle</span>
                        </label>
                    </div>
                    <div class="scroll-div">
                        <div class="row mx-0 text-center scroll-gallery">
                            <input type="number" id="limit_sprinkle" value="1" hidden>
                            @foreach($sprinkle_list as $list)
                            <div class="col col-md-4 col-lg-4 pb-3">
                                <div class="product-list">
                                    <div class="img-product d-flex align-items-end justify-content-center">
                                        <img class="img-fluid" src="uploads/product/ingredients/{{$list->url_img_ingredients}}">
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
                            <input type="checkbox" class="custom-control-input" name="add_sauce">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Charge 18.000 untuk tambah 1 House Sauce</span>
                        </label>
                    </div>
                    <div class="scroll-div">
                        <div class="row mx-0 text-center scroll-gallery">
                            <input type="number" id="limit_sauce" value="1" hidden>
                            @foreach($house_sauce_list as $list)
                            <div class="col col-md-4 col-lg-4 pb-3">
                                <div class="product-list">
                                    <div class="img-product d-flex align-items-end justify-content-center">
                                        <img class="img-fluid" src="uploads/product/ingredients/{{$list->url_img_ingredients}}">
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
                            <form id="form-makeyourown" enctype="multipart/form-data" class="form-horizontal form-bordered" data-bv-excluded="disabled">
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
            //ubah limit pilih essensial
            $('#limit_essential').val(3);
            $('input[name="essential_checked"]:checked').prop('checked', false);
            $('input[name="special_checked"]:checked').prop('checked', false);
            $('input[name="sprinkle_checked"]:checked').prop('checked', false);
            $('input[name="house_sauce_checked"]:checked').prop('checked', false);
        }else{
            $('#ingredient').prop('hidden', true);
            $('html, body').animate({
                scrollTop: $("#cr-1").offset().top
            }, 1000);
            $('#limit_essential').val(0);
            $('input[name="essential_checked"]:checked').prop('checked', false);
            $('input[name="special_checked"]:checked').prop('checked', false);
            $('input[name="sprinkle_checked"]:checked').prop('checked', false);
            $('input[name="house_sauce_checked"]:checked').prop('checked', false);
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
            //ubah limit pilih essensial
            $('#limit_essential').val(5);
            //clear checked
            $('input[name="essential_checked"]:checked').prop('checked', false);
            $('input[name="special_checked"]:checked').prop('checked', false);
            $('input[name="sprinkle_checked"]:checked').prop('checked', false);
            $('input[name="house_sauce_checked"]:checked').prop('checked', false);
        }else{
            $('#ingredient').prop('hidden', true);
            $('html, body').animate({
                scrollTop: $("#cr-2").offset().top
            }, 1000);
            $('#limit_essential').val(0);
            $('input[name="essential_checked"]:checked').prop('checked', false);
            $('input[name="special_checked"]:checked').prop('checked', false);
            $('input[name="sprinkle_checked"]:checked').prop('checked', false);
            $('input[name="house_sauce_checked"]:checked').prop('checked', false);
        }
    });
    //check max checked
    $('input[name="essential_checked"]').change(function(){
        var current = $('input[name="essential_checked"]').filter(':checked').length;
        var max_essential = parseInt($('#limit_essential').val());
        $('input[name="essential_checked"]').filter(':not(:checked)').prop('disabled', current >= max_essential);
    });
    $('input[name="special_checked"]').change(function(){
        var current = $('input[name="special_checked"]').filter(':checked').length;
        var max_special = parseInt($('#limit_special').val());
        $('input[name="special_checked"]').filter(':not(:checked)').prop('disabled', current >= max_special);
    });
    $('input[name="sprinkle_checked"]').change(function(){
        var current = $('input[name="sprinkle_checked"]').filter(':checked').length;
        var max_sprinkle = parseInt($('#limit_sprinkle').val());
        $('input[name="sprinkle_checked"]').filter(':not(:checked)').prop('disabled', current >= max_sprinkle);
    });
    $('input[name="house_sauce_checked"]').change(function(){
        var current = $('input[name="house_sauce_checked"]').filter(':checked').length;
        var max_sauce = parseInt($('#limit_sauce').val());
        $('input[name="house_sauce_checked"]').filter(':not(:checked)').prop('disabled', current >= max_sauce);
    });
    //tambah bahan
    $('input[name="add_essential"]').change(function(){
        if(this.checked) {
            var current = $('input[name="essential_checked"]').filter(':checked').length;
            var max_essential = parseInt($('#limit_essential').val())+1;
            $('#limit_essential').val(max_essential);
            $('input[name="essential_checked"]').filter(':not(:checked)').prop('disabled', current >= max_essential);
        }else{
            var current = $('input[name="essential_checked"]').filter(':checked').length;
            var max_essential = parseInt($('#limit_essential').val())-1;
            $('input[name="essential_checked"]').eq(max_essential).prop('checked', false);
            $('#limit_essential').val(max_essential);
            $('input[name="essential_checked"]').filter(':not(:checked)').prop('disabled', current >= max_essential);
        }
    });
    $('input[name="add_special"]').change(function(){
        if(this.checked) {
            var current = $('input[name="special_checked"]').filter(':checked').length;
            var max_special = parseInt($('#limit_special').val())+1;
            $('#limit_special').val(max_special);
            $('input[name="special_checked"]').filter(':not(:checked)').prop('disabled', current >= max_special);
        }else{
            var current = $('input[name="special_checked"]').filter(':checked').length;
            var max_special = parseInt($('#limit_special').val())-1;
            $('input[name="special_checked"]').eq(max_special).prop('checked', false);
            $('#limit_special').val(max_special);
            $('input[name="special_checked"]').filter(':not(:checked)').prop('disabled', current >= max_special);
        }
    });
    $('input[name="add_sprinkle"]').change(function(){
        if(this.checked) {
            var current = $('input[name="sprinkle_checked"]').filter(':checked').length;
            var max_sprinkle = parseInt($('#limit_sprinkle').val())+1;
            $('#limit_sprinkle').val(max_sprinkle);
            $('input[name="sprinkle_checked"]').filter(':not(:checked)').prop('disabled', current >= max_sprinkle);
        }else{
            var current = $('input[name="sprinkle_checked"]').filter(':checked').length;
            var max_sprinkle = parseInt($('#limit_sprinkle').val())-1;
            $('input[name="sprinkle_checked"]').eq(max_sprinkle).prop('checked', false);
            $('#limit_elimit_sprinkleslimit_sprinklesential').val(max_sprinkle);
            $('input[name="sprinkle_checked"]').filter(':not(:checked)').prop('disabled', current >= max_sprinkle);
        }
    });
    $('input[name="add_sauce"]').change(function(){
        if(this.checked) {
            var current = $('input[name="house_sauce_checked"]').filter(':checked').length;
            var max_sauce = parseInt($('#limit_sauce').val())+1;
            $('#limit_sauce').val(max_sauce);
            $('input[name="house_sauce_checked"]').filter(':not(:checked)').prop('disabled', current >= max_sauce);
        }else{
            var current = $('input[name="house_sauce_checked"]').filter(':checked').length;
            var max_sauce = parseInt($('#limit_sauce').val())-1;
            $('input[name="house_sauce_checked"]').eq(max_sauce).prop('checked', false);
            $('#limit_sauce').val(max_sauce);
            $('input[name="house_sauce_checked"]').filter(':not(:checked)').prop('disabled', current >= max_sauce);
        }
    });
    //on modal show
    $('#detail_order').on('shown.bs.modal', function (e) {
        var roll_kecil = $('#cr-1:checkbox:checked');
        var roll_besar = $('#cr-2:checkbox:checked');
        var essential_input = $('input[name="essential_checked"]:checked');
        var special_input = $('input[name="special_checked"]:checked');
        var sprinkle_input = $('input[name="sprinkle_checked"]:checked');
        var sauce_input = $('input[name="house_sauce_checked"]:checked');
        //jika roll kecil
        if(roll_kecil.length > 0){
            $("#jns_roll").text('Roll Kecil');
            $("#modal_essential").append('<input name="product" type="text" value="3" hidden>');
            if(essential_input.length == 0 || sprinkle_input.length == 0 || sauce_input.length == 0){
                var essensial = essential_input.length == 0 ? 'Essential ':'';
                var sprinkle = sprinkle_input.length == 0 ? 'Sprinkle ':'';
                var sauce = sauce_input.length == 0 ? 'House Sauce':'';
                $("#modal_essential").append('<input id="req_all" name="'+essensial+sprinkle+sauce+'" type="text" required hidden>');
            }else if(essential_input.length > 0 || sprinkle_input.length > 0 || sauce_input.length > 0){
                $('#req_all').remove();
            }
        //jika roll besar
        }else if(roll_besar.length > 0){
            $("#jns_roll").text('Roll Besar');
            $("#modal_essential").append('<input name="product" type="text" value="4" hidden>');
            if(essential_input.length == 0|| special_input.length == 0 || sprinkle_input.length == 0 || sauce_input.length == 0){
                var essensial = essential_input.length == 0 ? 'Essential ':'';
                var special = special_input.length == 0 ? 'Special ':'';
                var sprinkle = sprinkle_input.length == 0 ? 'Sprinkle ':'';
                var sauce = sauce_input.length == 0 ? 'House Sauce':'';
                $("#modal_essential").append('<input id="req_all" name="'+essensial+special+sprinkle+sauce+'" type="text" required hidden>');
            }else if(essential_input.length > 0 || special_input.length == 0 || sprinkle_input.length > 0 || sauce_input.length > 0){
                $('#req_all').remove();
            }
        }

        essential_input.each(function() {
           $("#modal_essential").append('<li>'+$("#essential_name"+this.value).val()+'</li>');
           $("#modal_essential").append('<input name="essential_choosed[]" type="checkbox" value="'+this.value+'" checked hidden>');
        });

        special_input.each(function() {
           $("#modal_special").append('<li>'+$("#special_name"+this.value).val()+'</li>');
           $("#modal_special").append('<input name="special_choosed[]" type="checkbox" value="'+this.value+'" checked hidden>');
        });
        sprinkle_input.each(function() {
           $("#modal_sprinkle").append('<li>'+$("#sprinkle_name"+this.value).val()+'</li>');
           $("#modal_sprinkle").append('<input name="sprinkle_choosed[]" type="checkbox" value="'+this.value+'" checked hidden>');
        });
        sauce_input.each(function() {
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

    document.addEventListener('invalid', (function () {
          return function (e) {
            e.preventDefault();
            console.log(e)
            alert('Belum memilih '+e.target.name+'.');
          };
        })(), true);

    $(document).ready(function () {
        // $('#form-makeyourown').bootstrapValidator().on('success.form.bv', function(e) {
            var user = $('#user').val();
            $('#form-makeyourown').on('submit', function (e) {
                e.preventDefault();
                if(user!=''){
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
                            alert('Form Submitted.');
                            window.location.href = "/";
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status);
                            alert(thrownError);
                            $("#submit").prop('disabled', false);
                        }
                    });
                }else{
                    window.location.href = "/login";
                }

            });
        // }).on('error.form.bv', function(e) {
        //     $("#submit").prop('disabled', false);
        //     alert('isi');
        // });
    });

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
@stop
