<html lang="{{ app()->getLocale() }}">

<head>
    @include('partials.head')
</head>

<body>
    <!-- navbar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-white">
    <a class="navbar-brand" href="/"><img class="img-fluid" src="image/baiza-logo.png" alt="baiza"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">HOME <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/product">PRODUCT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/promo">PROMO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">HOW TO ORDER</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about_us">ABOUT US</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">            
            <a href="https://www.facebook.com/baizasushi/" target="_blank"><div class="navbar-facebook"></div></a>
            <a href="https://www.instagram.com/baizasushi/" target="_blank"><div class="navbar-instagram"></div></a>
            <a href="/detail_order"><div class="navbar-cart"></div></a>
            @guest
                <a href="{{ route('login') }}" class="btn btn-blue my-2 my-sm-0">LOGIN</a>
            @else
                <li class="dropdown">
                    <a href="#" class="btn btn-blue dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a href="{{ route('logout') }}" class="mx-3" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}</form>
                        </li>
                    </ul>
                </li>
            @endguest
        </form>
    </div>
</nav>

    <!-- login/register -->
    <!-- @include('partials.login')
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
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('footer_scripts')
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
    function buysushi($this) {
        var id = $this.attr("id");
        var user = $('#user').val();
        if(user!=''){
            $.ajax({
                type: "post",
                "url": "/add_to_cart",
                data: {
                    id_product: id
                },
                success: function (response) {
                    console.log(response);
                    $('.cart-pop-up').toggleClass('open');
                },
                error: function (response) {
                    console.log(response);
                }
            });
        }else{
            window.location.href = "/login";
        }
    };

    </script>
</body>

</html>