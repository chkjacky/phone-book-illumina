<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title> Fone Book </title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
        <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="{{asset('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700')}}" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{asset('assets/reveal/aos/aos.css')}}" rel="stylesheet">
        <link href="{{asset('assets/reveal/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/reveal/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
        <!-- <link href="assets/reveal/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/reveal/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/reveal/swiper/swiper-bundle.min.css" rel="stylesheet"> -->

        <!-- Template Main CSS File -->
        <link href="{{asset('assets/reveal/style.css')}}" rel="stylesheet">

        <!-- =======================================================
        * Template Name: Reveal - v4.7.0
        * Template URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->

        <!-- FORM WIZARD -->
        <!-- Google Font -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">

        <!-- Font-Awesome Stylesheet -->
        <link rel="stylesheet" href="{{asset('assets/hitechparks/font-awesome/css/font-awesome.min.css')}}">

		<!-- Plugin Custom Stylesheet -->
		<link rel="stylesheet" href="{{asset('assets/hitechparks/css/form-wizard-blue.css')}}">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

        <script src="{{asset('/assets/custom/localise-time.js')}}"></script>
    </head>

    <body>
        <!-- ======= Header ======= -->
        <header id="header" class="d-flex align-items-center">
            <div class="container d-flex justify-content-between">

            <div id="logo">
                <h1><a href="/">Fon<span>e</span> Book</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt=""></a>-->
            </div>

            <nav id="navbar" class="navbar">
                @if(session()->has('user'))
                <ul>
                    <li class="dropdown"><a href="/menu"><span>Menu</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/add">Add Contacts</a></li>
                            <li><a href="/contacts">Browse Contacts</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="/profile"><span>My Account</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/profile">Profile</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="/logout"> <i class="fa fa-sign-out"></i> &nbsp; Logout</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
                @else
                <ul>
                    <li><a class="nav-link scrollto" href="/login">Login</a></li>
                    <li><a class="nav-link scrollto" href="/register"> &nbsp; Register</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
                @endif
            </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->

        <main id="main">
            @yield('content')
        </main>

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="{{asset('assets/reveal/aos/aos.js')}}"></script>
        <script src="{{asset('assets/reveal/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/reveal/glightbox/js/glightbox.min.js')}}"></script>
        <!-- <script src="assets/reveal/isotope-layout/isotope.pkgd.min.js"></script> -->
        <script src="{{asset('assets/reveal/swiper/swiper-bundle.min.js')}}"></script>
        <!-- <script src="assets/reveal/php-email-form/validate.js"></script> -->

        <!-- Template Main JS File -->
        <script src="{{asset('assets/reveal/main.js')}}"></script>

        <!-- FORM WIZARD -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

        <!-- Plugin Custom JS -->
        <script src="{{asset('assets/hitechparks/js/form-wizard.js')}}"></script>
        <!-- Plugin Custom JS -->

    </body>
</html>
