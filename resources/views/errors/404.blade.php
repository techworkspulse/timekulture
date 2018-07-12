@extends('layouts.error')

@section('title', '404')

@section('content')
    <div class="wrapper">
        <div id="fullscreen-banner" class="parallax text-center vertical-align ">
            <div class="container-mid">
                <div class="container">
                    <div class="banner-title dark-txt">
                        <h3>Please refresh the page and try again.</h3>
                        <h1>Error!</h1> 
                    </div>
                    <div class="row"> 
                        <div class="col-md-4 col-md-offset-4">
                            <img src="{{url('assets/img/tk/TK_Logo.png')}}" alt="Revolution by Time Kulture 2018" class="img-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--hero section-->
    </div>
@endsection

@section('customJS')
<script type="text/javascript">

    
</script>
@endsection
