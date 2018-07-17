@extends('layouts.main')

@section('title', 'Race Against Time')

@section('content')
<body id="page-top" class="index">

    <div id="overlay" class="hide">
        <img id="loading" src="{{ url('assets/img/tk/loading.gif') }}">
    </div>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="row"><img src="{{ url('assets/img/tk/TK_Logo.png') }}" class="img-responsive tk-logo-banner" alt="Time Kulture 2018"></div>
                <div class="intro-lead-in">12 - 22 JULY 2018</div>
                <div class="intro-heading">LEVEL 2 CENTRE COURT <br> PAVILION KUALA LUMPUR</div>
                <a href="http://www.swisswatchgallery.com.my/timekulturerevolution/" target="_blank" class="page-scroll btn btn-xl btn-tk">About Time Kulture</a>
            </div>
        </div>

        <div class="playnow">
          <div class="text-center">Scroll Down <br> to Play</div>
          <img src="http://timekulture.swisswatchgallery.com.my/assets/img/tk/chevron-down-solid.svg" alt="down chevron">
        </div>
    </header>


    <section id="raceagainsttime" class="bg-flag">
        <div class="container yellow-hr">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">RACE AGAINST TIME</h2>
                    <h3 class="section-subheading">Solve the puzzle as fast as you can to be in the running for some amazing prizes</h3>
                    <h3 class="section-subheading yellow-text">Be the daily champion and win 1 of 10 daily prizes (RM100 Swiss Watch Gallery cash voucher)</h3>
                    <h3 class="section-subheading">Or put the pedal to the metal and keep your eye on the grand prizes:</h3>
                </div>
            </div>

            <div class="prize-container">
                <div class="row text-center">
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="prize-box">
                            <h4>1st Prize </h4>
                            <h2>RM 2500</h2>
                            <p>Swiss Watch Gallery <br> Cash voucher</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="prize-box">
                            <h4>2nd Prize </h4>
                            <h2>RM 1500</h2>
                            <p>Swiss Watch Gallery <br> Cash voucher</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="prize-box">
                            <h4>3rd Prize </h4>
                            <h2>RM 1000</h2>
                            <p>Swiss Watch Gallery <br> Cash voucher</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section id="form-register" class="bg-street">
        <div class="simple-linear"></div>
        <div class="container">

            <div class="row">
                <div class="col-lg-12 text-center">
                    <h4 class="section-heading line-behind-text-yellow"><span>REGISTER NOW</span></h4>
                </div>
            </div>

            <div class="prize-container p-bot-0">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="registration-form">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name *" id="name" name="name" required data-validation-required-message="Please enter your name.">
                                        <p id="name-error" class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email *" id="email" name="email"  required data-validation-required-message="Please enter your email address.">
                                        <p id="email-error" class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="tel" class="form-control" placeholder="Phone *" id="phone" name="phone"  required data-validation-required-message="Please enter your phone number.">
                                        <p id="phone-error" class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <!--<div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="IC Number *" id="ic-number" name="icNumber"  required data-validation-required-message="Please enter your ic number.">
                                        <p id="ic-number-error" class="help-block text-danger"></p>
                                    </div>
                                </div>-->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select class="form-control" name="gender" id="gender" name="gender">
                                            <?=generateGenderRadio()?>
                                        </select>
                                        <p id="gender-error" class="help-block text-danger"></p>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                                <div class="col-lg-12 text-center">
                                    <div id="success"></div>
                                    <a id="register-submit" class="btn btn-xl btn-register">Register</a>
                                </div>

                            </div>
                        </form>

                        <div class="clearfix"></div>

                        <div class="col-md-12">
                            <p class="next-try">Not your first time? <a href="#" onclick="return false;" id="playagain-btn"> Click here for your next try</a></p>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-md-12">
                            <p class="terms"><a href="/Time_Kulture_2018_TC_Puzzle_Game.pdf" target="_blank">Terms & Conditions</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="playagain-section" class="bg-street">
        <div class="container">
            <div class="col-lg-12 text-center">
                <h4 class="section-heading line-behind-text-yellow"><span>ENTER YOUR EMAIL TO <br class="visible-xs visible-sm"> START YOUR ENGINE</span></h4>
            </div>

            <div class="prize-container p-bot-0">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="update-form" onSubmit="return false;">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email *" id="email2" name="email" required data-validation-required-message="Please enter your email address.">
                                        <p id="update-email-error" class="help-block text-danger"></p>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                                <div class="col-lg-12 text-center">
                                    <div id="success"></div>
                                    <a id="update-submit" class="btn btn-xl btn-register">Go</a>
                                    <button id="retry-submit" onclick="window.location.reload()" class="btn btn-xl btn-register" style="display:none;">Register</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="timekulture-modal modal fade" id="browser" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="close-modal" data-dismiss="modal">

                    <img src="{{ url('assets/img/tk/delete-button.svg') }}" class="img-responsive center-block">

                </div>

                <div class="container">

                    <div id="invitefriend-content" class="row">

                        <div class="col-lg-12">

                            <div class="modal-body">  

                                <p class="browser-message"> </p>


                            </div>

                        </div>

                    </div> 

                </div>

            </div>

        </div>

    </div> 


    <!-- jQuery -->
    <!--<script src="{{ url('assets/vendor/jquery/jquery.min.js') }}"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.2/jquery.scrollTo.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="{{ url('assets/js/jqBootstrapValidation.js') }}"></script>

    <!-- Theme JavaScript -->
    <script src="{{ url('assets/js/agency.min.js') }}"></script> 
    <script src="{{ url('assets/js/query.scrollTo.min.js') }}"></script>
    <script src="{{ url('assets/js/tk.js') }}"></script>
    <script src="{{ url('assets/js/touche.js') }}"></script>

    <script type="text/javascript">
        console.log("%cStop!", "background: red; color: yellow; font-size: x-large");
        console.log("%cThis is a browser feature intended for developers. If someone told you to copy-paste something here or find a way to `hack`, it is a scam, we have your details and will give the authorized to access to your details.", "background: white; color: red; font-size: large");
        var lastTouchEnd = 0;
        document.addEventListener('touchend', function (event) {
            document.activeElement.blur();
          var now = (new Date()).getTime();
          if (now - lastTouchEnd <= 300) {
            event.preventDefault();
          }
          lastTouchEnd = now;
        }, false);


        // Opera 8.0+
        var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;

        // Firefox 1.0+
        var isFirefox = typeof InstallTrigger !== 'undefined';

        // Safari 3.0+ "[object HTMLElementConstructor]" 
        var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || (typeof safari !== 'undefined' && safari.pushNotification));

        // Internet Explorer 6-11
        var isIE = /*@cc_on!@*/false || !!document.documentMode;

        // Edge 20+
        var isEdge = !isIE && !!window.StyleMedia;

        // Chrome 1+
        var isChrome = !!window.chrome && !!window.chrome.webstore;

        // Blink engine detection
        var isBlink = (isChrome || isOpera) && !!window.CSS;

        if(isIE){
            $('.browser-message').html('This game is best experienced on Google Chrome, Mozilla Firefox & Safari.');
            $('#browser').modal('show');
        }

        if(isOpera){
            $('.browser-message').html('This game is best experienced on Google Chrome, Mozilla Firefox & Safari.');
            $('#browser').modal('show');
        }

        if(isEdge){
            $('.browser-message').html('This game is best experienced on Google Chrome, Mozilla Firefox & Safari.');
            $('#browser').modal('show');
        }



      function ajax_error_handling(jqXHR, exception){
        if (jqXHR.status === 0) {
            alert('Not connected.\n Verify Network.');
        } else if (jqXHR.status == 404) {
            alert('Requested page not found. [404]');
        } else if (jqXHR.status == 419) {
            alert('Time out! You have to refresh your page!');
        } else if (jqXHR.status == 500) {
            alert('Internal Server Error [500].');
        } else if (exception === 'parsererror') {
            alert('Requested JSON parse failed.');
        } else if (exception === 'timeout') {
            alert('Time out error.');
        } else if (exception === 'abort') {
            alert('Ajax request aborted.');
        } else {
            alert('Uncaught Error.\n' + jqXHR.responseText);
        }
    }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {	
			$('#email2').keypress(function(event) {
			   if (event.keyCode == '13') {
				   event.preventDefault();
			   }
			});
		
            $('#register-submit').on('click', function(e) {
				e.preventDefault();
                $('#overlay').css('display','block');


                $.ajax({
                    type: "POST",
                    url: "/createPlayer",
                    data: $("#registration-form").serialize(),
                    success: function(status) {
                        $('#overlay').css('display','none');
                        var result = JSON.parse(status);
                        if (result.status) {
                            window.location.href = '/game?token='+result.message+'&matchid='+result.matchid;
                        } else {
                            $('.help-block').html('');

                            var error = JSON.stringify(result.message);
                            var obj = JSON.parse(error);
							
							if (result.message == 'No more lives available')
							{
								$('#email-error').html(result.message);
							}

                            if (obj['name'] != '')
                            {
                                $('#name-error').html(obj['name']);
                            }
                            if (obj['email'] != '')
                            {
                                $('#email-error').html(obj['email']);
                            }
                            if (obj['phone'] != '')
                            {
                                $('#phone-error').html(obj['phone']);
                            }
                            if (obj['gender'] != '')
                            {
                                $('#gender-error').html(obj['gender']);
                            }
                        }
                    },
                    errpr: function(jqXHR, exception) {
                        $('#overlay').css('display','none');
                        //alert(jqXHR);
                    }
                });
            });

            $('#update-submit').on('click', function(e) {
                e.preventDefault();
                document.activeElement.blur();
                $('#overlay').css('display','block');
                $.ajax({
                    type: "POST",
                    url: "/updatePlayer",
                    data: $("#update-form").serialize(),
                    success: function(status) {
                        $('#overlay').css('display','none');
                        var result = JSON.parse(status);
                        if (result.status) {
                            window.location.href = '/game?token='+result.message+'&matchid='+result.matchid;
                        } else {
                            $('.help-block').html('');
                            if (result.message == '**Uh Oh! You have reached your limit to play the game')
                            {
                                $('#update-email-error').html(result.message);
                                $('#update-submit').hide();
                            }
                            else if(result.message == "**Uh Oh! You haven't register yet")
                            {
                                $('#update-email-error').html(result.message);
                                $("#update-submit").hide();
                                $("#retry-submit").show();
                                //$('#update-submit').attr("href", "http://swisswatchgallery.com.my/raceagainsttime");
                            }
                            else
                            {
                                $('#update-email-error').html(result.message);
                            }
                        }
                    },
                    errpr: function(jqXHR, exception) {
                        $('#overlay').css('display','none');
                        //alert(jqXHR);
                    }
                });
				
				return false;
            });
        });

        // Agency Theme JavaScript
    </script>

</body>

@endsection
