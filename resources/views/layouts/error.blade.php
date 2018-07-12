<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta property="og:title" content="Revolution by Time Kulture 2018" />
    <meta property="og:image" content="{{url('assets/img/tk/TK_Logo.png')}}" /> 
    <meta property="og:image:width" content="500" /> 
    <meta property="og:image:height" content="500" /> 
    <meta property="og:description" content="" />  
    <meta property="og:url" content="https://timekulture.swisswatchgallery.com.my/error/500" />
    <link rel="icon" type="image/png" href="{{ url('assets/img/tk/tk-favicon.png') }}">
    <title>@yield('title') - {{ config('app.name', 'Revolution by Time Kulture 2018') }}</title> 
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="{{url('errorpkg/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('errorpkg/css/animate.css')}}">
    <link rel="stylesheet" href="{{url('errorpkg/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{url('errorpkg/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{url('errorpkg/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{url('errorpkg/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('errorpkg/css/shortcodes.css')}}">
    <link rel="stylesheet" href="{{url('errorpkg/css/style.css')}}">
    <link rel="stylesheet" href="{{url('errorpkg/css/style-responsive.css')}}">
    <link rel="stylesheet" href="{{url('errorpkg/css/default-theme.css')}}">
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->    
    <input id="baseURL" type="hidden" value="{{ url('/') }}">
    {{ csrf_field() }}
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    @yield('content')
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{url('errorpkg/js/modernizr.js')}}"></script>
    <script src="{{url('errorpkg/js/jquery-1.10.2.min.js')}}"></script>
    <script src="{{url('errorpkg/js/bootstrap.min.js')}}"></script>
    <script src="{{url('errorpkg/js/validator.min.js')}}"></script>
    <script src="{{url('errorpkg/js/breakpoint.js')}}"></script>
    <script src="{{url('errorpkg/js/jquery.flexslider-min.js')}}"></script>
    <script src="{{url('errorpkg/js/imagesloaded.js')}}"></script>
    <script src="{{url('errorpkg/js/jquery.isotope.js')}}"></script>
    <script src="{{url('errorpkg/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{url('errorpkg/js/menuzord.js')}}"></script>
    <script src="{{url('errorpkg/js/jquery.nav.js')}}"></script>
    <script src="{{url('errorpkg/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('errorpkg/js/smooth.js')}}"></script>
    <script src="{{url('errorpkg/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{url('errorpkg/js/jquery.sticky.min.js')}}"></script>
    <script src="{{url('errorpkg/js/wow.min.js')}}"></script>
    <script src="{{url('errorpkg/js/scripts.js')}}"></script>
    <script src="{{url('errorpkg/js/main.js')}}"></script>
    <script src='//cdn.freshmarketer.com/112328/202607.js'></script>
</body>

</html>
