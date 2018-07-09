@extends('layouts.bonus')

@section('title', 'Time Kulture 2018')

@section('content')
    <input type="hidden" id="uniqueToken" name="uniqueToken" value="{{ app('request')->input('token') }}">
    <input type="hidden" id="matchId" name="matchId" value="{{ app('request')->input('matchid') }}">
    <header class="bonus-checkpoint">

            <div class="bonus-container score-container p-bot-50">  

            	<div class="row text-center">

	            	<div class="app-header">
	            		@php($uniqueToken = app('request')->input('token'))
						@php($firstname = explode(" ",getFullNameByToken($uniqueToken)))

						<div class="outline-yellow tk greeting ml-0 mmr-0">CONGRATULATIONS <span class="text-yellow">{{ $firstname[0] }}</span></div>

						<div class="date tk mr-0 mml-0"></div>

					</div>

				</div>



                <div class="row text-center">

                    <div class="bonus-container-inner"> 

                    	<div class="row text-center">

		                    <div class="col-xs-12 col-md-12"> 

		                        <h5>SCOREBOARD</h5> 

		                    </div> 

		                </div>



                        <div class="score-container-inner">   

			                <div class="row visible-xs visible-sm">

								<div class="col-md-12 "> 

									<h3> Get ahead with by earning extra points.<span><a class="text-yellow click-here" href="{{ url('/bonus') }}?token={{ app('request')->input('token') }}&matchid={{ app('request')->input('matchid') }}"> CLICK HERE</a></span> </h3> 

									<p>Check your email at 11:59pm to see if you are the daily champion</p> 

								</div>

							</div>





                            <div class="row text-center m-bot-30">

                                <div class="col-12 col-sm-12 col-md-12 col-lg-6">  

                                	<h6 class="text-yellow">TODAY</h6> 

									<h2 class="scoreboard">

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
														<div class="col-md-9 col-9 ta-l">
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
														<div class="col-md-9 col-9 ta-l">
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

									</h2>

                                </div>





                                <div class="col-12 col-sm-12 col-md-12 col-lg-6 m-xs-top-30 m-sm-top-30">  

                                	<h6 class="text-yellow">YESTERDAY</h6> 



									<h2 class="scoreboard">

										@php($scoreboard = getPastScoreboardNames())
										@php($count = count($scoreboard))
										@php($increment = 1)
										@foreach($scoreboard as $item)
											@if($increment == 2)
												<div class="score-num user-score">
													<div class="row">
														<div class="col-md-3 col-3 ta-l">
															{{ $increment }}
														</div>
														<div class="col-md-9 col-9 ta-l">
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
														<div class="col-md-9 col-9 ta-l">
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

									</h2>

                                </div>

                            </div> 



                            <div class="row">

								<div class="col-md-12 "> 

									<h3 class=" hidden-xs hidden-sm"> Get ahead with by earning extra points.<span><a class="text-yellow click-here" href="{{ url('/bonus') }}?token={{ app('request')->input('token') }}&matchid={{ app('request')->input('matchid') }}"> CLICK HERE</a></span> </h3> 

									<p class="text-yellow  hidden-xs hidden-sm">Check your email at 11:59pm to see if you are the daily champion</p>

									<a href="/Time_Kulture_2018_TC_Puzzle_Game.pdf" target="_blank" class="tnc">Terms & Conditions</a> 

								</div>

							</div>

 

                        </div> 

                    </div>

                </div> 





            </div>

    </header>

@endsection

@section('customJS')
<script type="text/javascript">
    $(document).ready(function() {
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
		});
</script>
@endsection
