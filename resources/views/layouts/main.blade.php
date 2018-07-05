<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"> 
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,maximum-scale=1, user-scalable=0" name="viewport">
    <meta name="description" content=""> 
    <meta name="keywords" content="">  
    <meta name="author" content="Digital Symphony, Bath & Body Works">  
    <meta property="og:title" content="@yield('title') | {{ config('app.name', 'Time Kulture 2018') }}" />
    <meta property="og:image" content="" /> 
    <meta property="og:image:width" content="500" /> 
    <meta property="og:image:height" content="500" /> 
    <meta property="og:description" content="" />  
    <meta property="og:url" content="/" />
    <link href="{{ url('assets/img/tk/tk-favicon.png') }}" rel="icon" type="image/png">

    <title>{{ config('app.name', 'Time Kulture 2018') }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 
    <!-- Theme CSS -->
    <link href="{{ url('assets/css/tk.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/fonts-tk.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/tk-responsive.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/padding-margin-style.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">

    <!-- Bootstrap Core Js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
    <![endif]-->

</head>

@yield('content')

</html>
