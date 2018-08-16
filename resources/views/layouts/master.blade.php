<html lang="{{ app()->getLocale() }}">

<head>
    @include('partials.head')
</head>

<body>
    <!-- navbar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-white">
        <a class="navbar-brand" href="/"><img class="img-fluid" src="image/baiza-logo.png" alt="baiza"></a>
        <button class="navbar-toggler" type="button" id="navToggle">
            <img src="image/hamburger-menu.png" alt="menu">
        </button>
        <div class="collapse navbar-collapse" id="navToggleContent">
            <ul class="navbar-nav mx-auto nav-mobile-menu">
                <li class="nav-item">
                    <a class="nav-link" href="/">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/product">PRODUCT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/promo">PROMO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/how_to_order">HOW TO ORDER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about_us">ABOUT US</a>
                </li>
                @guest
                <li class="nav-item d-sm-block d-md-none">
                    <a class="nav-link" href="{{ route('login') }}">LOGIN</a>
                </li>
                @else
                <li class="nav-item d-sm-block d-md-none">
                    <a class="nav-link" href="/order_history">ORDER HISTORY</a>
                </li>
                <li class="nav-item d-sm-block d-md-none">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">LOGOUT</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                </li>
                @endguest
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <a href="https://www.facebook.com/baizasushi/" target="_blank">
                    <div class="navbar-facebook"></div>
                </a>
                <a href="https://www.instagram.com/baizasushi/" target="_blank">
                    <div class="navbar-instagram"></div>
                </a>
                <a href="/detail_order">
                    <div class="navbar-cart"></div>
                </a>
                @guest
                <a href="{{ route('login') }}" class="btn btn-blue my-2 my-sm-0 d-none d-md-block">LOGIN</a>
                @else
                <li class="dropdown d-none d-md-block">
                    <a href="#" class="btn btn-blue dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a href="/order_history" class="mx-3">Order History</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" class="mx-3" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}</form>
                        </li>
                    </ul>
                </li>
                @endguest
            </ul>
        </div>
    </nav>
    <!-- content -->
    @yield('content')
    <!-- add to cart -->
    @include('partials.add_to_cart')
    <!-- footer -->
    @include('partials.footer')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://blackrockdigital.github.io/startbootstrap-sb-admin/vendor/datatables/jquery.dataTables.js"></script>
    <script src="https://blackrockdigital.github.io/startbootstrap-sb-admin/vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Page level plugin JavaScript-->
    <script src="https://blackrockdigital.github.io/startbootstrap-sb-admin/vendor/datatables/jquery.dataTables.js"></script>
    <script src="https://blackrockdigital.github.io/startbootstrap-sb-admin/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="https://blackrockdigital.github.io/startbootstrap-sb-admin/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="https://blackrockdigital.github.io/startbootstrap-sb-admin/js/sb-admin-datatables.min.js"></script>
    @yield('footer_scripts')
    <script type="text/javascript">
    // $('.login-overlay').click(function() {
    //     $('.login-pop-up').toggleClass('open');
    // });
    // $('.register-overlay').click(function() {
    //     $('.login-pop-up').removeClass('open');
    //     $('.register-pop-up').toggleClass('open');
    // });

    $("#navToggle").click(function() {
        $("#navToggleContent").slideToggle();
        $(this).toggleClass('show');
        if ($('#navToggle').hasClass('show')) {
            $(this).find('img').attr('src', 'image/close-menu.png');
        } else {
            $(this).find('img').attr('src', 'image/hamburger-menu.png');
        }
    });

    $('.cart-overlay').click(function() {
        $('.cart-pop-up').toggleClass('open');
    });

    function buysushi($this) {
        var id = $this.attr("id");
        var user = $('#user').val();
        if (user != '') {
            $.ajax({
                type: "post",
                "url": "/add_to_cart",
                data: {
                    id_product: id
                },
                success: function(response) {
                    console.log(response);
                    $('.cart-pop-up').toggleClass('open');
                },
                error: function(response) {
                    console.log(response);
                }
            });
        } else {
            window.location.href = "/login";
        }
    };
    </script>
</body>

</html>
