<!DOCTYPE html>

<html lang="en">



<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8"> 

    <meta content="width=device-width,initial-scale=1,maximum-scale=1,maximum-scale=1, user-scalable=0" name="viewport">

    <meta name="description" content="Be in the running for exclusive Grand Prizes worth up to RM5,000 in Swiss Watch Gallery Cash Vouchers. Click and visit www.swisswatchgallery.com.my/raceagainsttime to find out more."> 

    <meta name="keywords" content="Digital Symphony, Swiss Watch Gallery, Time Kulture Revolution, Time Kulture">  

    <meta name="author" content="Digital Symphony, Time Kulture 2018">  

    <meta property="og:title" content="@yield('title') | {{ config('app.name', 'Time Kulture 2018') }}" />

    <meta property="og:image" content="{{ url('assets/img/tk/tk-share.jpg') }}" /> 

    <meta property="og:image:width" content="500" /> 

    <meta property="og:image:height" content="500" /> 

    <meta property="og:description" content="Be in the running for exclusive Grand Prizes worth up to RM5,000 in Swiss Watch Gallery Cash Vouchers. Click and visit www.swisswatchgallery.com.my/raceagainsttime to find out more." />  

    <meta property="og:url" content="http://www.swisswatchgallery.com.my/raceagainsttime" />

    <link href="{{ url('assets/img/tk/tk-favicon.png') }}" rel="icon" type="image/png">



    <title>Bonus Checkpoints | Time Kulture 2018</title>



    <!-- Theme CSS -->

    <link href="{{ url('assets/css/tk.css') }}" rel="stylesheet">

    <link href="{{ url('assets/css/fonts-tk.css') }}" rel="stylesheet">

    <link href="{{ url('assets/css/tk-responsive.css') }}" rel="stylesheet">

    <link href="{{ url('assets/css/padding-margin-style.css') }}" rel="stylesheet"> 



    <!-- Bootstrap Core CSS -->

    <link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>

        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>

    <![endif]-->



</head>

<body id="page-top" class="index">

@yield('content')

<script src="{{ url('assets/vendor/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<!-- Plugin JavaScript -->

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>



<!-- Contact Form JavaScript -->

<script src="{{ url('assets/js/jqBootstrapValidation.js') }}"></script> 



<script src="{{ url('assets/js/tk.js') }}"></script>

@yield('customJS')

<script type="text/javascript">

    $(window).bind("load", function() {

        $('#congratspoints-invitefriend-content , #congratspoints-watchvideo-content , #congratspoints-instagram-content , #congratspoints-share-content').hide();

    });



    function invitefriendcongrats() {

      $('#invitefriend-content').fadeOut('fast');  

      $('#congratspoints-invitefriend-content').fadeIn('slow');   

      $('#invitefriend-panel').addClass('disabled-panel').attr('onclick', 'return false;').removeAttr('data-toggle', 'modal');
    }



    function watchvideocongrats() {

      $('#watchvideo-content').fadeOut('fast');  

      $('#congratspoints-watchvideo-content').fadeIn('slow');   

      $('#watchvideo-panel').addClass('disabled-panel').attr('onclick', 'return false;').removeAttr('data-toggle', 'modal');

    }



    function instagramcongrats() {

      $('#instagram-content').fadeOut('fast');  

      $('#congratspoints-instagram-content').fadeIn('slow');   

      $('#instagram-panel').addClass('disabled-panel').attr('onclick', 'return false;').removeAttr('data-toggle', 'modal');

    }



    function sharecongrats() {

      $('#share-content').fadeOut('fast');  

      $('#congratspoints-share-content').fadeIn('slow');   

       $('#share-panel').addClass('disabled-panel').attr('onclick', 'return false;').removeAttr('data-toggle', 'modal');

    }


    $("#submit-invitefriend").click(function() {  
        $.ajax({
        type: "POST",
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          url: "sendInvitationEmail",
          data: {
            'uniqueToken': $('#uniqueToken').val(),
            'email': $('#email').val(),
            'matchId': $('#matchId').val(),
            'invitation': 1,
          },
          success: function(status) {
            invitefriendcongrats();
          },
          error: function(jqXHR, exception) {

          }
      });
    }); 



    $("#submit-watchvideo").click(function() {  

        $.ajax({
        type: "POST",
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          url: "addExtraPoints",
          data: {
            'uniqueToken': $('#uniqueToken').val(),
            'matchId': $('#matchId').val(),
            'video': 1,
          },
          success: function(status) {
            watchvideocongrats();
          },
          error: function(jqXHR, exception) {

          }
      });
       

    });  



    $("#submit-instagram").click(function() {  
       $.ajax({
        type: "POST",
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          url: "addExtraPoints",
          data: {
            'uniqueToken': $('#uniqueToken').val(),
            'matchId': $('#matchId').val(),
            'instagramFollow': 1,
          },
          success: function(status) {
            instagramcongrats();
          },
          error: function(jqXHR, exception) {

          }
      });
    });  



    $("#submit-share").click(function() {  

        $.ajax({
        type: "POST",
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          url: "addExtraPoints",
          data: {
            'uniqueToken': $('#uniqueToken').val(),
            'matchId': $('#matchId').val(),
            'share': 1,
          },
          success: function(status) {
            sharecongrats();
          },
          error: function(jqXHR, exception) {

          }
      });
    });  

    $(document).ready(function() {
      $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "/getExtraPoints",
        data: {
          'uniqueToken': $('#uniqueToken').val(),
          'matchId': $('#matchId').val(),
        },
        success: function(status) {
          var result = JSON.parse(status);
          if (result.status) {
            if (result.video == 1)
            {
              $('#watchvideo-panel').addClass('disabled-panel').attr('onclick', 'return false;').removeAttr('data-toggle', 'modal');
            }
            if (result.share == 1)
            {
              $('#share-panel').addClass('disabled-panel').attr('onclick', 'return false;').removeAttr('data-toggle', 'modal');
            }
            if (result.invitation == 1)
            {
              $('#invitefriend-panel').addClass('disabled-panel').attr('onclick', 'return false;').removeAttr('data-toggle', 'modal');
            }
            if (result.instagram == 1)
            {
              $('#instagram-panel').addClass('disabled-panel').attr('onclick', 'return false;').removeAttr('data-toggle', 'modal');
            }
          }
        },
        errpr: function(jqXHR, exception) {

        }
      });
    });

</script>



<script type="text/javascript">   

    $("a#open-instagram").click(function(){

    $('#instagram-save').modal('hide');

    });
    

</script>



</body>



</html> 