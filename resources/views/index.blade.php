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
                <a href="#raceagainsttime" class="page-scroll btn btn-xl btn-tk">Discover More</a>
            </div>
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
                    <h4 class="section-heading line-behind-text"><span>REGISTER NOW</span></h4> 
                </div>
            </div> 

            <div class="prize-container p-bot-0"> 
                <div class="row">
                    <div class="col-lg-12">
                        <form id="registration-form" method="POST" action="">
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
                                    <a id="register-submit" href="javascript:void(0);" type="button" class="btn btn-xl btn-register">Register</a>
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
                <h4 class="section-heading line-behind-text-yellow"><span>ENTER YOUR EMAIL TO START YOUR ENGINE</span></h4> 
            </div>

            <div class="prize-container p-bot-0"> 
                <div class="row">
                    <div class="col-lg-12">
                        <form id="update-form" method="POST" action="">
                            {{ csrf_field() }}
                            <div class="row"> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email *" id="email" name="email"  required data-validation-required-message="Please enter your email address.">
                                        <p id="update-email-error" class="help-block text-danger"></p>
                                    </div>
                                </div> 

                                <div class="clearfix"></div>
                                <div class="col-lg-12 text-center">
                                    <div id="success"></div>

                                    <a id="update-submit" href="javascript:void(0);" type="button" class="btn btn-xl btn-register">Go</a>
                                </div>

                            </div>
                        </form> 
                    </div>
                </div>
            </div> 
        </div>
    </section>

    <!-- Portfolio Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-responsive img-centered" src="{{ url('assets/img/portfolio/roundicons-free.png') }}" alt="">
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                <p>
                                    <strong>Want these icons in this portfolio item sample?</strong>You can download 60 of them for free, courtesy of <a href="https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc">RoundIcons.com</a>, or you can purchase the 1500 icon set <a href="https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc">here</a>.</p>
                                <ul class="list-inline">
                                    <li>Date: July 2014</li>
                                    <li>Client: Round Icons</li>
                                    <li>Category: Graphic Design</li>
                                </ul>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
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
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.2/jquery.scrollTo.min.js"></script>
    <script src="{{ url('assets/js/tk.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#register-submit').on('click', function(e) {
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
                            $('#update-email-error').html(result.message);
                        }
                    },
                    errpr: function(jqXHR, exception) {
                        $('#overlay').css('display','none');
                        //alert(jqXHR);
                    }
                });
            });
        });

        // Agency Theme JavaScript

(function($) {
    "use strict"; // Start of use strict

    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.navbar-fixed-top',
        offset: 51
    });

    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a').click(function(){ 
            $('.navbar-toggle:visible').click();
    });

    // Offset for Main Navigation
    $('#mainNav').affix({
        offset: {
            top: 100
        }
    })

})(jQuery); // End of use strict

    </script>

</body>

@endsection
