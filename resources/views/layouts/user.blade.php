<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width,initial-scale=1,maximum-scale=1,maximum-scale=1, user-scalable=0" name="viewport">
	<meta name="description" content="Be in the running for exclusive Grand Prizes worth up to RM5,000 in Swiss Watch Gallery Cash Vouchers. Click and visit www.swisswatchgallery.com.my/raceagainsttime to find out more.">
	<meta name="keywords" content="Digital Symphony, Swiss Watch Gallery, Revolution by Time Kulture 2018, Time Kulture, Revolution">
	<meta name="author" content="Digital Symphony, Revolution by Time Kulture 2018">
	<meta property="og:title" content="@yield('title') | {{ config('app.name', 'Revolution by Time Kulture 2018') }}" />
	<meta property="og:image" content="" />
	<meta property="og:image:width" content="500" />
	<meta property="og:image:height" content="500" />
	<meta property="og:description" content="" />
	<meta property="og:url" content="/" />
	<meta name="csrf_token" content="{{ csrf_token() }}" />
	<link href="{{ url('assets/img/tk/tk-favicon.png') }}" rel="icon" type="image/png">
	<title>@yield('title') | {{ config('app.name', 'Revolution by Time Kulture 2018') }}</title>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
	<link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
	<link href="{{ url('assets/css/fonts-tk.css') }}" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="{{ url('assets/vendor/jquery/jquery.min.js') }}"></script> 

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-122146968-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-122146968-1');
	</script>
	<script src='//cdn.freshmarketer.com/112328/202607.js'></script>


</head>

@yield('content')

</html>
