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
    <!-- content -->
    @yield('content')
    <!-- footer -->
    @include('partials.footer')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
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
    </script>
</body>

</html>