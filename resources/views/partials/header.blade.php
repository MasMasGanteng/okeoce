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
        <form class="form-inline my-2 my-lg-0">
            <a href="https://www.facebook.com/baizasushi/" target="_blank">
                <div class="navbar-facebook"></div>
            </a>
            <a href="https://www.instagram.com/baizasushi/" target="_blank">
                <div class="navbar-instagram"></div>
            </a>
            <a href="/detail_order">
                <div class="navbar-cart"></div>
            </a>
            <!-- Authentication Links -->
            @guest
            <!-- <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li> -->
            <button type="button" class="btn btn-blue my-2 my-sm-0 login-overlay">SIGNUP/LOGIN</button>
            @else
            <div class="navbar-nav dropdown">
                <button class="btn btn-blue dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hi {{ Auth::user()->name }}</button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/detail_order">Detail Order</a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
            @endguest
        </form>
    </div>
</nav>