@extends('layouts.main')

@section('title', 'Time Kulture 2018')

@section('content')

<body>

	<div class="container">
		<div class="app-header">
			<div class="outline-yellow tk greeting ml-0 mmr-0">GOOD LUCK <span class="text-yellow">Ahdesya</span></div>
			<div class="date tk mr-0 mml-0"></div>
		</div>
		<div class="start-container text-center">
			<div class="text-purple p-1">SOLVE THE PUZZLE AS FAST AS YOU CAN & REVEAL 1 OF 9 TIMEPIECES, EXCLUSIVELY AVAILABLE AT TIME KULTURE</div>
			<div class="img-container p-2">
				<img src="{{ url('assets/img/tk-game/pointer-02.png') }}" alt="options">
			</div>
			<p class="text-white p-3 f-montserrate">TAP TO MOVE YOUR PUZZLE PIECE</p>
			<a href="#" class="btn-start start">START</a>
		</div>
		<div class="box">
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
								<h1 class="text-yellow f-montserrate my-score">48</h1>
								<p class="f-montserrate mlh">Time: 3 Minutes 34 Second</p>
								<a href="" class="btn-retry">RETRY</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-6 text-center">
							<h2 class="text-yellow">SCOREBOARD</h2>
							<h2 class="scoreboard">
								<div class="score-num">
									<div class="row">
										<div class="col-md-3 col-3 ta-l">
											1
										</div>
										<div class="col-md-9 col-9 ta-l">
											OLIVIA
										</div>
									</div>
								</div>
								<div class="score-num user-score">
									<div class="row">
										<div class="col-md-3 col-3 ta-l">
											2
										</div>
										<div class="col-md-9 col-9 ta-l">
											GLEN
										</div>
									</div>
								</div>
								<div class="score-num">
									<div class="row">
										<div class="col-md-3 col-3 ta-l">
											3
										</div>
										<div class="col-md-9 col-9 ta-l">
											MATHEW
										</div>
									</div>
								</div>
								<div class="score-num">
									<div class="row">
										<div class="col-md-3 col-3 ta-l">
											4
										</div>
										<div class="col-md-9 col-9 ta-l">
											DAVID
										</div>
									</div>
								</div>
								<div class="score-num">
									<div class="row">
										<div class="col-md-3 col-3 ta-l">
											5
										</div>
										<div class="col-md-9 col-9 ta-l">
											SANCHEZ
										</div>
									</div>
								</div>
								<div class="score-num">
									<div class="row">
										<div class="col-md-3 col-3 ta-l">
											6
										</div>
										<div class="col-md-9 col-9 ta-l">
											NYEMAR
										</div>
									</div>
								</div>
								<div class="score-num">
									<div class="row">
										<div class="col-md-3 col-3 ta-l">
											7
										</div>
										<div class="col-md-9 col-9 ta-l">
											MESSI
										</div>
									</div>
								</div>
								<div class="score-num">
									<div class="row">
										<div class="col-md-3 col-3 ta-l">
											8
										</div>
										<div class="col-md-9 col-9 ta-l">
											RONALDO
										</div>
									</div>
								</div>
								<div class="score-num">
									<div class="row">
										<div class="col-md-3 col-3 ta-l">
											9
										</div>
										<div class="col-md-9 col-9 ta-l">
											PETER
										</div>
									</div>
								</div>
								<div class="score-num">
									<div class="row">
										<div class="col-md-3 col-3 ta-l">
											10
										</div>
										<div class="col-md-9 col-9 ta-l">
											FELLENI
										</div>
									</div>
								</div>
							</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 align-bottom">
							<div class="mt-5 text-center">
								<div class="mb-4 w-fix text-large uppercase">Get ahead with by earning extraa points.<span><a class="text-yellow click-here" href=""> CLICK HERE</a></span></div>
								<p class="text-yellow f-montserrate mb-3 mlh">Check your email at 11:59pm to see if you are the daily champion</p>
								<a href="" class="text-white text-underline tnc f-montserrate">Terms & Conditions</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="me full"></div>
		</div>
		<div class="app-footer d-flex justify-content-center">
			<div class="group text-center">
				<div class="outline-yellow tk point-tk">00000</div>
				POINTS
			</div>
			<div class="group text-center">
				<div class="outline-yellow tk time-tk">00:00:00</div>
				TIME
			</div>

		</div>
	</div>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<script src="{{ url('assets/js/index.js') }}"></script>
	<script>
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

		today = mm + '/' + dd + '/' + yyyy;

		$('.date').append(today);
	</script>
</body>
@endsection
