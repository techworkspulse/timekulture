@extends('layouts.bonus')

@section('title', 'Time Kulture 2018')

@section('content')
    <input type="hidden" id="uniqueToken" name="uniqueToken" value="{{ app('request')->input('token') }}">
    <input type="hidden" id="matchId" name="matchId" value="{{ app('request')->input('matchid') }}">

    <!-- Header -->

    <header class="bonus-checkpoint">

            <div class="bonus-container"> 

                <div class="row text-center">

                    <div class="col-xs-12 col-md-12"> 

                        <h5>Bonus Checkpoints</h5> 

                    </div> 

                </div>



                <div class="row text-center">

                    <div class="bonus-container-inner"> 

                        <div class="row text-center">

                            <div class="col-xs-12 col-md-12"> 

                                <h5>" I FEEL THE NEED - THE NEED FOR SPEED! "<br> - Top Gun </h5> 

                            </div> 



                            <div class="col-xs-12 col-md-12"> 

                                <p>SCORE MORE POINTS WITH THE FOLLOWING ACTIONS</p> 

                            </div> 

                        </div> 



                        <div class="prize-container p-bot-0 p-top-0"> 

                            <div class="row text-center">

                                <div class="col-6 col-sm-6 col-md-6"> 

                                    <a id="watchvideo-panel" href="#watchvideo" data-toggle="modal" class="bonus-action-panel">

                                        <div class="bonus-action">

                                            <h4>50 POINTS</h4>

                                            <img src="{{ url('assets/img/tk/play.svg') }}" class="img-responsive center-block">

                                            <br class="hidden-xs hidden-sm">

                                            <p>WATCH THE VIDEO</p> 

                                        </div>

                                    </a>

                                </div>





                                <div class="col-6 col-sm-6 col-md-6"> 

                                    <a id="share-panel" href="#share" data-toggle="modal" class="bonus-action-panel">

                                        <div class="bonus-action">

                                            <h4>100 POINTS</h4>

                                            <img src="{{ url('assets/img/tk/share.svg') }}" class="img-responsive center-block">

                                            <p>SHARE ON <br> SOCIAL MEDIA</p> 

                                        </div>

                                    </a>

                                </div>

                            </div>



                            <div class="row text-center">

                                <div class="col-6 col-sm-6 col-md-6"> 

                                    <a id="invitefriend-panel" href="#invitefriend" data-toggle="modal" class="bonus-action-panel">

                                        <div class="bonus-action">

                                            <h4>100 POINTS</h4>

                                            <img src="{{ url('assets/img/tk/user.svg') }}" class="img-responsive center-block">

                                            <br class="hidden-xs hidden-sm">

                                            <p>INVITE A FRIEND</p> 

                                        </div>

                                    </a>

                                </div>

                                <div class="col-6 col-sm-6 col-md-6"> 

                                    <a id="instagram-panel" href="#instagram" data-toggle="modal" class="bonus-action-panel">

                                        <div class="bonus-action">

                                            <h4>50 POINTS</h4>

                                            <img src="{{ url('assets/img/tk/instagram-logo.svg') }}" class="img-responsive center-block">

                                            <p>FOLLOW <br> SWISS WATCH GALLERY <br> ON INSTAGRAM</p> 

                                        </div>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div> 



                <div class="row text-center"> 

                    <div class="col-xs-12 col-lg-12">

                        <a href="scoreboard.html" class="btn btn-xl btn-scoreboard">Scoreboard</a>

                    </div>

                </div>

            </div>

    </header>

 



    <!-- Congrats invite a friend  -->

<!--     <div class="timekulture-modal modal fade" id="congratspoints-invitefriend" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content"> 

                <div class="container">

                    <div class="row">

                        <div class="col-xs-12 col-lg-12">

                            <div class="modal-body">  

                                <p>Congrats! You have earned 100 points!</p>



                                <div class="col-xs-12  col-lg-12 text-center"> 

                                    <a type="submit" class="btn btn-xl btn-register" data-dismiss="modal">Continue</a>

                                </div>

 

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>  -->



    <!-- Invite a Friend Modal  -->

    <div class="timekulture-modal modal fade" id="invitefriend" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="close-modal" data-dismiss="modal">

                    <img src="{{ url('assets/img/tk/delete-button.svg') }}" class="img-responsive center-block">

                </div>

                <div class="container">

                    <div id="invitefriend-content" class="row">

                        <div class="col-lg-12">

                            <div class="modal-body">  

                                <p>Invite your friend to gain extra points!</p>

                                <form>

                                    <div class="row">

                                        <div class="col-md-12">

                                            <div class="form-group">

                                                <input type="email" class="form-control" placeholder="Enter email address" id="email" required data-validation-required-message="Please enter your email address.">

                                                <p class="help-block text-danger"></p>

                                            </div>

                                        </div>

                                        

                                        <div class="clearfix"></div>

                                        <div class="col-xs-12  col-lg-12 text-center"> 

                                              <a type="button" class="btn btn-xl btn-register" id="submit-invitefriend">SUBMIT</a>

                                        </div>



                                    </div>

                                </form>

 

                            </div>

                        </div>

                    </div>



                    <div id="congratspoints-invitefriend-content" class="row">

                        <div class="col-xs-12 col-lg-12">

                            <div class="modal-body">  

                                <p>Congrats! You have earned 100 points!</p>



                                <div class="col-xs-12  col-lg-12 text-center"> 

                                    <a type="submit" class="btn btn-xl btn-register" data-dismiss="modal">Continue</a>

                                </div>

 

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div> 



    <!-- Congrats watch video  -->

   <!--  <div class="timekulture-modal modal fade" id="congratspoints-watchvideo" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content"> 

                <div class="container">

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="modal-body">  

                                <p>Congrats! You have earned 50 points!</p>



                                <div class="col-xs-12  col-lg-12 text-center"> 

                                    <a type="submit" class="btn btn-xl btn-register" data-dismiss="modal">Continue</a>

                                </div>

 

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>  -->



    <!-- Watch Video Modal  -->

    <div class="timekulture-modal modal fade" id="watchvideo" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="close-modal" data-dismiss="modal">

                    <img src="{{ url('assets/img/tk/delete-button.svg') }}" class="img-responsive center-block">

                </div>

                <div class="container">

                    <div id="watchvideo-content" class="row">

                        <div class="col-lg-12">

                            <div class="modal-body">  

                                <p>Watch this video to gain extra points!</p> 

                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="embed-responsive embed-responsive-16by9">  

                                            <!-- <video id="video" controls preload>

                                                <source id="mp4" src="videos/ml-compressed.mp4" type="video/mp4" /> 

                                                <source id="mp4" src="videos/bm.mp4" type="video/mp4" /> 

                                                <source id="mp4" src="videos/longines.mp4" type="video/mp4" /> 

                                                <source id="mp4" src="videos/oris.mp4" type="video/mp4" /> 

                                                <source id="mp4" src="videos/tudor.mp4" type="video/mp4" />  

                                                Your browser does not support the video tag.

                                            </video> -->





                                            <iframe id="video" class="embed-responsive-item" src="{{ getVideoURL() }}" allowfullscreen></iframe>
                                        </div>



 

                                    </div>

                                    

                                    <div class="clearfix"></div>

                                    <div class="col-xs-12  col-lg-12 text-center">

                                        <div id="success"></div>

                                         <a type="button" class="btn btn-xl btn-register" id="submit-watchvideo">Continue</a>

                                    </div>



                                </div> 

 

                            </div>

                        </div>

                    </div>



                    <div id="congratspoints-watchvideo-content" class="row">

                        <div class="col-xs-12 col-lg-12">

                            <div class="modal-body">  

                                <p>Congrats! You have earned 100 points!</p>



                                <div class="col-xs-12  col-lg-12 text-center"> 

                                    <a type="submit" class="btn btn-xl btn-register" data-dismiss="modal">Continue</a>

                                </div>

 

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div> 



    <!-- Congrats instagram   -->

<!--     <div class="timekulture-modal modal fade" id="congratspoints-instagram" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content"> 

                <div class="container">

                    <div class="row">

                        <div class="col-xs-12 col-lg-12">

                            <div class="modal-body">  

                                <p>Congrats! You have earned 50 points!</p>



                                <div class="col-xs-12  col-lg-12 text-center"> 

                                    <a type="submit" class="btn btn-xl btn-register" data-dismiss="modal">Continue</a>

                                </div>

 

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div> 

 -->

    <!-- Instagram Modal  -->

    <div class="timekulture-modal modal fade" id="instagram" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="close-modal" data-dismiss="modal">

                    <img src="{{ url('assets/img/tk/delete-button.svg') }}" class="img-responsive center-block">

                </div>

                <div class="container">

                    <div id="instagram-content" class="row">

                        <div class="col-xs-12 col-lg-12">

                            <div class="modal-body">  

                                <p>Follow Swiss Watch Gallery on Instagram to gain extra points</p>



                                <div class="row">

                                    <div class="col-xs-12 col-md-12 m-bot-0">

                                        <a href="https://www.instagram.com/swisswatchgallery/" target="_blank">

                                            <img src="{{ url('assets/img/tk/swg-instagram-02.png') }}" class="img-responsive center-block width-xs-50">

                                        </a>



                                        <div class="clearfix"></div>

                                        <div class="col-xs-12  col-lg-12 text-center">

                                            <div id="success"></div>

                                             <a type="button" href="https://www.instagram.com/swisswatchgallery/" target="_blank" class="btn btn-xl btn-register" id="submit-instagram">Follow Us</a>

                                        </div> 

                                    </div> 

                                </div>  

                                

                            </div>

                        </div>

                    </div>



                    <div id="congratspoints-instagram-content" class="row">

                        <div class="col-xs-12 col-lg-12">

                            <div class="modal-body">  

                                <p>Congrats! You have earned 100 points!</p>



                                <div class="col-xs-12  col-lg-12 text-center"> 

                                    <a type="submit" class="btn btn-xl btn-register" data-dismiss="modal">Continue</a>

                                </div>

 

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div> 



     <!-- Congrats share  -->

    <!-- <div class="timekulture-modal modal fade" id="congratspoints-share" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content"> 

                <div class="container">

                    <div class="row">

                        <div class="col-xs-12 col-lg-12">

                            <div class="modal-body">  

                                <p>Congrats! You have earned 100 points!</p>



                                <div class="col-xs-12  col-lg-12 text-center"> 

                                    <a type="submit" class="btn btn-xl btn-register" data-dismiss="modal">Continue</a>

                                </div>

 

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>  -->



    <!-- Share on Social Media Modal  -->

    <div class="timekulture-modal modal fade" id="share" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="close-modal" data-dismiss="modal">

                    <img src="{{ url('assets/img/tk/delete-button.svg') }}" class="img-responsive center-block">

                </div>

                <div class="container">

                    <div id="share-content" class="row">

                        <div class="col-xs-12 col-lg-12">

                            <div class="modal-body">  

                                <p>Share on your social media accounts to gain extra points!</p>



                               <!--  <div class="row"> 

                                    <div class="col-xs-12 col-lg-12 text-center">

                                        <div class="col-6 col-md-12 visible-xs"> 

                                            <a><img src="img/tk/instagram-logo.svg" class="img-responsive center-block social-share"></a>

                                        </div>  



                                        <div class="col-6 col-md-12"> 

                                            <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//www.swisswatchgallery.com.my/timekulturerevolution/" target="_blank"><img src="img/tk/003-facebook-logo-button.svg" class="img-responsive center-block social-share"></a>

                                        </div> 

                                    </div>

                                </div> -->



                                <div class="row text-center">

                                    <div class="col-6 col-sm-6  visible-xs visible-sm"> 

                                        <a href="#instagram-save" data-toggle="modal" ><img src="{{ url('assets/img/tk/instagram-logo.svg') }}" class="img-responsive center-block social-share"></a>

                                    </div>





                                    <div class="col-6 col-sm-12 col-md-12"> 

                                        <a id="facebookshare-btn" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//www.swisswatchgallery.com.my/timekulturerevolution/" target="_blank"><img src="{{ url('assets/img/tk/003-facebook-logo-button.svg') }}" class="img-responsive center-block social-share"></a>

                                    </div>

                                </div>



                                

                                <div class="col-xs-12 col-lg-12 text-center">  

                                    <a type="button" class="btn btn-xl btn-register" id="submit-share">Continue</a>
                                </div>

 

                            </div>

                        </div>

                    </div>



                    <div id="congratspoints-share-content" class="row">

                        <div class="col-xs-12 col-lg-12">

                            <div class="modal-body">  

                                <p>Congrats! You have earned 100 points!</p>



                                <div class="col-xs-12  col-lg-12 text-center"> 

                                    <a type="submit" class="btn btn-xl btn-register" data-dismiss="modal">Continue</a>

                                </div>

 

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div> 





     <!-- Instagram save  -->

    <div class="timekulture-modal modal fade" id="instagram-save" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content"> 

                <div class="container">

                    <div class="row">

                        <div class="col-xs-12 col-lg-12">

                            <div class="modal-body">  

                                <p>Save this photo and post to Instagram using <span class="purple-text">#TimeKultureRevolution #SwissWatchGallery</span>. <br> Once completed, return to this page.</p>



                                <div class="row text-center">

                                    <div class="col-12"> 

                                        <img src="{{ url('assets/img/tk-game/TUDOR.jpg') }}" class="img-responsive center-block width-100">

                                    </div> 

                                </div>



                                <div class="col-xs-12  col-lg-12 text-center"> 

                                     <a id="open-instagram" href="https://www.instagram.com/" target="_blank" class="btn btn-xl btn-register">Open Instagram</a>

                                </div>

 

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div> 

@endsection

@section('customJS')
<script type="text/javascript">
    $(document).ready(function() {
    });
</script>
@endsection

