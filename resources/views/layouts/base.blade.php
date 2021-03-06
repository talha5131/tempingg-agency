<html>

<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <!-- Favicons
    ================================================== -->
    <link rel="icon" href="{{ url('public/assets/images/logo-favicon.png')}}" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('public/assets/images/logo-favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ url('public/assets/images/logo-favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{ url('public/assets/images/logo-favicon.png')}}">

    <!-- CSS
    ================================================== -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ url('public/assets/css/bootstrap.min.css')}}">
    <!-- Template styles-->
    <link rel="stylesheet" href="{{ url('public/assets/css/style.css')}}">
    <!-- Responsive styles-->
    <link rel="stylesheet" href="{{ url('public/assets/css/responsive.css')}}">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ url('public/assets/css/font-awesome.min.css')}}">
    <!-- Animation -->
    <link rel="stylesheet" href="{{ url('public/assets/css/animate.css')}}">
    <!-- Prettyphoto -->
    <link rel="stylesheet" href="{{ url('public/assets/css/prettyPhoto.css')}}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ url('public/assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ url('public/assets/css/owl.theme.css')}}">
    <!-- Flexslider -->
    <link rel="stylesheet" href="{{ url('public/assets/css/flexslider.css')}}">
    <!-- Flexslider -->
    <link rel="stylesheet" href="{{ url('public/assets/css/cd-hero.css')}}">
    <!-- Style Swicther -->
    <link id="style-switch" href="{{ url('public/assets/css/presets/preset3.css')}}" media="screen" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ url('public/assets/css/richtext.min.css')}}">

    <link href="{{ url('public/assets/css/tagsinput.css')}}" rel="stylesheet" type="text/css">
    <style>
        /* html,
    body {
        width: 100%;
        margin: 0px;
        padding: 0px;
        overflow-x: hidden;
    } */
    </style>

</head>

<body>
    @include('layouts.header')
    <title>@yield('title')</title>


    @include('layouts.modal')



    @yield('content')



    @include('layouts.footer')
    <!-- Javascript Files
		================================================== -->

    <!-- initialize jQuery Library -->
    <script type="text/javascript" src="{{ url('public/assets/js/jquery.js')}}"></script>
    <!-- Bootstrap jQuery -->
    <script type="text/javascript" src="{{ url('public/assets/js/bootstrap.min.js')}}"></script>
    <!-- Style Switcher -->
    <script type="text/javascript" src="{{ url('public/assets/js/style-switcher.js')}}"></script>
    <!-- Owl Carousel -->
    <script type="text/javascript" src="{{ url('public/assets/js/owl.carousel.js')}}"></script>
    <!-- PrettyPhoto -->
    <script type="text/javascript" src="{{ url('public/assets/js/jquery.prettyPhoto.js')}}"></script>
    <!-- Bxslider -->
    <script type="text/javascript" src="{{ url('public/assets/js/jquery.flexslider.js')}}"></script>
    <!-- Owl Carousel -->
    <script type="text/javascript" src="{{ url('public/assets/js/cd-hero.js')}}"></script>
    <!-- Isotope -->
    <script type="text/javascript" src="{{ url('public/assets/js/isotope.js')}}"></script>
    <script type="text/javascript" src="{{ url('public/assets/js/ini.isotope.js')}}"></script>
    <!-- Wow Animation -->
    <script type="text/javascript" src="{{ url('public/assets/js/wow.min.js')}}"></script>
    <!-- SmoothScroll -->
    <script type="text/javascript" src="{{ url('public/assets/js/smoothscroll.js')}}"></script>
    <!-- Eeasing -->
    <script type="text/javascript" src="{{ url('public/assets/js/jquery.easing.1.3.js')}}"></script>
    <!-- Counter -->
    <script type="text/javascript" src="{{ url('public/assets/js/jquery.counterup.min.js')}}"></script>
    <!-- Waypoints -->
    <script type="text/javascript" src="{{ url('public/assets/js/waypoints.min.js')}}"></script>
    <!-- Template custom -->
    <script type="text/javascript" src="{{ url('public/assets/js/custom.js')}}"></script>
    
    <script src="{{ url('public/assets/js/tagsinput.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!-- Javascript Files
		================================================== -->

</body>

</html>