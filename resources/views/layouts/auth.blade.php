<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Irvine</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('public/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('public/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">
    <link href="{{ asset('public/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet">
        @stack('css')
</head>
<body>
    <main>
        <div id="header-sticky-wrapper" class="sticky-wrapper is-sticky" style="height: 88px;">
            <header id="header" class="header-scrolled">
                <div class="container">

                    <div class="logo">
                        @if(\Auth::check())
                            @if (\Auth::user()->is_owner == \Config::get('constant.owners.true'))
                                <a href="{{ route('owner-home') }}">
                                    <img src="{{ asset('public/assets/img/logo.png') }}">
                                </a>
                            @else
                                <a href="{{ route('tenant-home') }}">
                                    <img src="{{ asset('public/assets/img/logo.png') }}">
                                </a>
                            @endif
                        @else
                            <img src="{{ asset('public/assets/img/logo.png') }}">
                        @endif
                    </div>

                    <div class="box-icon">
                        @if(\Auth::check())
                            @if (\Auth::user()->is_owner == \Config::get('constant.owners.true'))
                                <a href="{{ route('owner-home') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
                                <a href="{{ route('owner-profile') }}"><i class="fa fa-user" aria-hidden="true"></i></a>
                            @else
                                <a href="{{ route('tenant-home') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
                                <a href="{{ route('tenant-profile') }}"><i class="fa fa-user" aria-hidden="true"></i></a>
                            @endif
                        @endif
                    </div>
                </div>
            </header>
        </div>
        @yield('content')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="{{ asset('public/assets/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/main.js') }}"></script>
        @stack('scripts')
    </main>
</body>

</html>