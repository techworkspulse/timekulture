@extends('layouts.user')

@section('title', 'Race Against Time')

@section('content')

<body>

	<div id="overlay" class="hide">
    <img id="loading" src="{{ url('assets/img/tk/loading.gif') }}">
</div>
	<input type="hidden" id="uniqueToken" name="uniqueToken" value="{{ app('request')->input('token') }}">
	<input type="hidden" id="matchId" name="matchId" value="{{ app('request')->input('matchid') }}">

	<div class="container">
		<div class="app-header">
			@php($uniqueToken = app('request')->input('token'))
			@php($firstname = explode(" ",getFullNameByToken($uniqueToken)))
			<div class="outline-yellow tk greeting ml-0 mmr-0">GOOD LUCK <span class="text-yellow limit-name">
			 {{ $firstname[0] }}</span></div>
			<div class="date tk mr-0 mml-0"></div>
		</div>
		<div class="start-container text-center">
			<div class="text-purple p-1">SOLVE THE PUZZLE AS FAST AS YOU CAN & REVEAL 1 OF 9 TIMEPIECES, EXCLUSIVELY AVAILABLE AT TIME KULTURE</div>
			<div class="img-container p-2">
				<img src="{{ url('assets/img/tk-game/pointer-02.png') }}" alt="options">
			</div>
			<p class="text-white p-3 f-montserrate">TAP TO SWITCH YOUR PUZZLE PIECES</p>
			<a href="#" class="btn-start start">START</a>
		</div>
		<div class="box this-slide-up">
			<div class="cover">
				<div class="score">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-6 text-center">
							<div class="img-container-2">
								<img src="{{ url('assets/img/tk-game/flag-game.png') }}" alt="end flag">
							</div>
							<h2 class="text-purple">PUZZLE SOLVED</h2>
							<div class="results">
								<p class="mb-0 f-montserrate">You have scored</p>
								<h1 id="player-final-score" class="text-yellow f-montserrate my-score"></h1>
								<p id="player-final-time" class="f-montserrate mlh"></p>
								<a id="btn-retry" href="javascript:void(0);" class="btn-retry">RETRY</a>
								<p id="limit-error" class="help-block text-danger results"></p>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-6 text-center">
							<h2 class="text-yellow">SCOREBOARD</h2>
							<div class="scoreboard">
								@php($scoreboard = getScoreboardNames())
								@php($count = count($scoreboard))
								@php($increment = 1)
								@foreach($scoreboard as $item)
									@if($increment == 2)
										<div class="score-num">
											<div class="row">
												<div class="col-md-3 col-3 ta-l">
													{{ $increment }}
												</div>
												<div class="col-md-9 col-9 ta-l overflow-text ">
													@php($scoreboardName = explode(" ",getFullNameById($item['player_id'])->name))
													{{ $scoreboardName[0] }}
												</div>
											</div>
										</div>
									@else
										<div class="score-num">
											<div class="row">
												<div class="col-md-3 col-3 ta-l">
													{{ $increment }}
												</div>
												<div class="col-md-9 col-9 ta-l overflow-text ">
													@php($scoreboardName = explode(" ",getFullNameById($item['player_id'])->name))
													{{ $scoreboardName[0] }}
												</div>
											</div>
										</div>
									@endif		
									@php($increment++)
								@endforeach

								@for($i=$count+1;$i<=10;$i++)
									@if($i == 2)
										<div class="score-num">
											<div class="row">
												<div class="col-md-3 col-3 ta-l">
													{{ $i }}
												</div>
												<div class="col-md-9 col-9 ta-l">
													-
												</div>
											</div>
										</div>
									@else
										<div class="score-num">
											<div class="row">
												<div class="col-md-3 col-3 ta-l">
													{{ $i }}
												</div>
												<div class="col-md-9 col-9 ta-l">
													-
												</div>
											</div>
										</div>
									@endif
								@endfor
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="r-m text-center">
								<div class="mb-4 w-fix text-large f-montserrate uppercase">GET AHEAD BY EARNING EXTRA POINTS.<span class="clickheremobile"><a class="text-yellow click-here" href="{{ url('/bonus') }}?token={{ app('request')->input('token') }}&matchid={{ app('request')->input('matchid') }}"> CLICK HERE</a></span></div>
								<p class="text-yellow f-montserrate mb-1 mlh">Check your email at 12:30am to see if you are the daily champion</p>
								<a href="/Time_Kulture_2018_TC_Puzzle_Game.pdf" target="_blank" class="text-white text-underline tnc f-montserrate">Terms & Conditions</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="full"></div>
		</div>
		<div class="app-footer d-flex justify-content-center">
			<div class="group text-center">
				<div id="player-points" class="outline-yellow tk point-tk bg-black">00000</div>
				POINTS
			</div>
			<div class="group text-center">
				<div id="stopwatch" class="outline-yellow tk time-tk bg-black"></div>
				TIME
			</div>

		</div>
		<div class="timekulture-modal modal fade" id="maxedout" tabindex="-1" role="dialog" aria-hidden="true">
	        <div class="modal-dialog">
	            <div class="modal-content"> 
	                <div class="container">
	                    <div class="row">
	                        <div class="col-xs-12 col-lg-12">
	                            <div class="modal-body">  
	                                <p class="help-block text-danger">**Uh Oh! You have reached your limit to play the game</p>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<script src="{{ url('assets/js/index.js') }}"></script>
	<script src="{{ url('assets/js/touche.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#player-points').html('1000');

			var today = new Date();
			var dd = today.getDate();
			var mm = today.getMonth() + 1; //January is 0!
			var yyyy = today.getFullYear();

			if (dd < 10) {
				dd = '0' + dd
			}

			if (mm < 10) {
				mm = '0' + mm
			}

			today =  dd + '/' +  mm + '/' + yyyy;

			$('.date').append(today);
		});
	</script>

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
    	var hideKeyboard = function() {
			 document.activeElement.blur();
			 $("body").blur();
			};
    </script>
</body>
@endsection
