<html lang="{{ app()->getLocale() }}">

<head>
    @include('partials.head')
</head>

<body>
    <!-- navbar -->
    @include('partials.header')
    <!-- login/register -->
    @include('partials.login')
    @include('partials.register')
    @include('partials.add_to_cart')
    <!-- content -->
    @yield('content')
    <!-- footer -->
    @include('partials.footer')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $('.login-overlay').click(function() {
        $('.login-pop-up').toggleClass('open');
    });
    $('.register-overlay').click(function() {
        $('.login-pop-up').removeClass('open');
        $('.register-pop-up').toggleClass('open');
    });
    $('.cart-overlay').click(function() {
        $('.cart-pop-up').toggleClass('open');
    });
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
        });
        $('input[name="special_checked"]:checked').each(function() {
           $("#modal_special").append('<li>'+$("#special_name"+this.value).val()+'</li>');
        });
        $('input[name="sprinkle_checked"]:checked').each(function() {
           $("#modal_sprinkle").append('<li>'+$("#sprinkle_name"+this.value).val()+'</li>');
        });
        $('input[name="house_sauce_checked"]:checked').each(function() {
           $("#modal_house_sauce").append('<li>'+$("#house_sauce_name"+this.value).val()+'</li>');
        });
    });
    $('#detail_order').on('hidden.bs.modal', function (e) {
        $("#modal_essential").empty();
        $("#modal_special").empty();
        $("#modal_sprinkle").empty();
        $("#modal_house_sauce").empty();
    });

    </script>
</body>

</html>