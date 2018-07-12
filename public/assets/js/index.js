$(document).ready(function() {

	reset();

	var completionStatus = 0;
	var points = 1000;

	var box = $(".box"),
		orginal = [0, 1, 2, 3, 4, 5, 6, 7, 8],
		temp = orginal,
		x = [],
		sec = 0,
		date1,date2,
		moves = 0,
		mm = 0,
		ss = 0,
		upIMG,
		images = ["./assets/img/tk-game/TUDOR.jpg","./assets/img/tk-game/tissot.jpg","./assets/img/tk-game/TAG-Heuer.jpg",
		"./assets/img/tk-game/Oris.jpg","./assets/img/tk-game/Maurice.jpg","./assets/img/tk-game/Longines.jpg",
		"./assets/img/tk-game/Graham.jpg","./assets/img/tk-game/Bell-Ross.jpg","./assets/img/tk-game/Baume-Mercier.jpg"]
		img = 0;

	function getPuzzleId()
	{
		var number = 9;

		$.ajax({
			type: "GET",
			url: "getPuzzleId/"+$('#uniqueToken').val(),
			async: false,
			data: "",
		})
		.done(function(data) {
			if(data == 0)
			{
				$('#btn-retry').addClass('disabled');
				$('#limit-error').html('**Uh Oh! You have reached your limit to play the game');
				return false;
			}
			else
			{
				number = data;
			}
			

		})
		.fail(function(xhr) {
			//console.log('error', xhr);
			//window.location.href = "/";
			$('#limit-error').html('**Uh Oh! You have reached your limit to play the game');
			$('#btn-retry').addClass('disabled');
			return false;
			
			
		});

		return number;
	}

	var random = parseFloat(getPuzzleId())-1; 

	$('.full').css({"background-image" : 'url('+images[random]+')'});

	$(".start").click(function() {
		$(".start-container").fadeOut();
		$('.full').css({"background-image" : 'none'});
		$(".box").css({"background-image" : 'url('+images[random]+')', "background-repeat" : "no-repeat"});
		setTimeout(function() {
			$(".box").addClass("hide-bg-img");
		}, 1000);
		$(".full").delay( 1000 ).slideUp( 300 );
		$(".pre_img").addClass("prevent_click");

		date1 = new Date();
		Start();
		submitMatchLog();
		return 0;
	});

	function Start() {
		completionStatus = 0;
		reset();
		setTimeout(function() {
			timerstart();
		}, 1000);
		randomTile();
		changeBG(random);
		var count = 0,
			a,
			b,
			A,
			B;
		$(".me").click(function() {
			count++;
			if (count == 1) {
				a = $(this).attr("data-bid");
				$('.me_'+a).addClass("green-border");
			} else {
				b = $(this).attr("data-bid");
				$('.me_'+b).addClass("yellow-border");
				$('.me_'+a).delay(800).queue(function (next) {
					$(this).removeClass("yellow-border, green-border");
					next();
				});
				$('.me_'+b).delay(800).queue(function (next) {
					$(this).removeClass("green-border, yellow-border");
					next();
				})
				if (a == b) {
				} else {
					$(".me_" + a)
						.addClass("me_" + b)
						.removeClass("me_" + a);
					$(this)
						.addClass("me_" + a)
						.removeClass("me_" + b);
					$(".me_" + a).attr("data-bid", a);
					$(".me_" + b).attr("data-bid", b);
				}
				moves++;
				swapping(a, b);
				checkCorrect(a);
				checkCorrect(b);
				a = b = count = A = B = 0;
			}
			if (arraysEqual(x)) {
				date2 = new Date();
				timeDifferece();
				stop();
				showScore();
				submitData();
				$('#player-final-score').html();
				$('#player-final-score').html(points);
				$('#player-final-time').html();
				$('#player-final-time').html('Time: '+ mm + ' Minutes ' + ss + ' Second');
				return 0;
			}
		});
		return 0;
	}

	function randomTile() {
		var i;
		for (i = orginal.length-1; i >= 0; i--) {
			var flag = getRandom(0, i);
			x[i] = temp[flag];
			temp[flag] = temp[i];
			temp[i] = x[i];
		}
		for (i = 0; i < orginal.length; i++) {
			box.append(
				'<div  class="me me_' + x[i] + ' tile" data-bid="' + x[i] + '"></div>'
			);
			if ((i + 1) % 3 == 0) box.append("<br>");
		}
		i = 9;
		return 0;
	}

	function arraysEqual(arr) {
		var i;
		for (i = orginal.length - 1; i >= 0; i--) {
			if (arr[i] != i) return false;
		}
		return true;
	}

	function checkCorrect(N1) {
		var pos = x.indexOf(parseInt(N1, 10));
		if (pos != N1) {
			return;
		}
		$(".me_" + N1).addClass("correct , prevent_click ");
		return;
	}

	function swapping(N1, N2) {
		var first = x.indexOf(parseInt(N1, 10)),
			second = x.indexOf(parseInt(N2, 10));
		x[first] = parseInt(N2, 10);
		x[second] = parseInt(N1, 10);
		return 0;
	}

	function getRandom(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}

	function timeDifferece(){
		var diff = date2 - date1;
		var msec = diff;
		var hh = Math.floor(msec / 1000 / 60 / 60);
		msec -= hh * 1000 * 60 * 60;
	 	mm = Math.floor(msec / 1000 / 60); // Gives Minute
		msec -= mm * 1000 * 60;
		ss = Math.floor(msec / 1000);		// Gives Second
		msec -= ss * 1000;
		return 0;
	}


	function changeBG(img){
		if(img != 10){
		$('.me').css({
			"background-image" : "url("+images[img]+")"
		});
		return
		}
		else
			$('.me').css({"background-image" : "url("+upIMG+")"});
	}

	$('.pre_img li').hover(function(){
			img = $(this).attr("data-bid");
			changeBG(img);

		});

	function showScore(){
		$('#min').html(mm);
		$('#sec').html(ss);
		$('#moves').html(moves);
		completionStatus = 1;
		$('.box').css({"background" : "rgba(0,0,0,0.5)"});
		$('.box').addClass('m-expand-box');
		setTimeout(function(){
		$('.cover').slideDown(350);
		},1050);
		setTimeout(function(){
		$('.me').css({"opacity" : "0", "transition" : "all 0.3s"});
		},1050);
		return 0;
	}

	$('.OK').click(function(){
		$('.cover').slideUp(350);
	});

	$('.reset').click(function(){
		$(".tile").remove();
		$("br").remove();
		$(".full").show();
		$(".start").show();
		$(".pre_img").removeClass("prevent_click");

		temp = orginal;
		x = [];
		moves =  ss = mm = 0;
		return 0;
	});

	$("#upfile1").click(function () {
 	   $("#file1").trigger('click');
	});

	$("#file1").change(function(){
        readURL(this);
    });

    $('#btn-retry').click(function() {
    	var retryPuzzleId = getPuzzleId();

    	$.ajax({
		      type: "GET",
		      url: "/getLivesByToken/"+$('#uniqueToken').val(),
		      data: "",
		      success: function(status) {
		        var result = JSON.parse(status);
		        if (result.status) {
		          if(result.message == 0)
		          {
		          	$('#limit-error').html('**Uh Oh! You have reached your limit to play the game');
		          	$('#btn-retry').addClass('disabled');
		          }
		          else
		          {
		          	$.ajax({
			type: "POST",
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
			url: "/retryMatch",
			data: {
				'uniqueToken': $('#uniqueToken').val(),
				'puzzleId': retryPuzzleId,
			},
			success: function(status) {
				var result = JSON.parse(status);
                if (result.status) {
					//window.location.reload(true);
					window.location.href = '/game?token='+$('#uniqueToken').val()+"&matchid="+result.message;
					//location.href.replace("matchid="+$('#matchId').val()+"#", "matchid="+result.message);
                }
                else
                {
                	$('#limit-error').html('**Uh Oh! You have reached your limit to play the game');
                }
			},
			errpr: function(jqXHR, exception) {
				$('#limit-error').html('**Uh Oh! You have reached your limit to play the game');
			}
		});   	
		          }
		       }
		      },
		      errpr: function(jqXHR, exception) {
				$('#limit-error').html('**Uh Oh! You have reached your limit to play the game');
			}
		   });

		
		
	});

     function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
               upIMG =  e.target.result;
               img = 3;
               changeBG(3);
            }
            reader.readAsDataURL(input.files[0]);
        }

    }

    function submitMatchLog() {
		var minutes = 0;
		var seconds = 0;

		var countdownTimer = setInterval(function () {
			if(completionStatus == 1)
			{
				clearInterval(countdownTimer);
			}
			else
			{
				seconds++;
				minutes = Math.floor(seconds / 60);
				if (points != 0)
				{
					points = points - 2;
					$('#player-points').html();
					$('#player-points').html(points);
				}
				//reducePoint();

				if (seconds == 60)
				{
					seconds = 0;
				}
			}			
		}, 1000);

		var downloadTimer = setInterval(function () {
			if(completionStatus == 1)
			{
				clearInterval(downloadTimer);
			}
			else
			{
				$.ajax({
					type: "POST",
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
					url: "storeMatchLog",
					data: {
						'uniqueToken': $('#uniqueToken').val(),
						'matchId': $('#matchId').val(),
						'puzzleId': parseFloat(random)+1,
						'minutes': minutes,
						'seconds': seconds,
						'moves': moves,
						'points': points,
					},
					success: function(status) {
						
					},
					error: function(jqXHR, exception) {

					}
				});
			}
		}, 3000);
	}

	function submitData() {
		$('#overlay').css('display','block');
		$.ajax({
			type: "POST",
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
			url: "/storeMatchData",
			data: {
				'uniqueToken': $('#uniqueToken').val(),
				'matchId': $('#matchId').val(),
				'moves': moves,
				'minutes': mm,
				'seconds': ss,
				'puzzleId': parseFloat(random)+1,
				'points': points,
			},
			success: function(status) {
				$('#overlay').css('display','none');
				getScoreboardNames();
			},
			errpr: function(jqXHR, exception) {
				$('#overlay').css('display','none');
			}
		});
	}

	var timeBegan = null
	    , timeStopped = null
	    , stoppedDuration = 0
	    , started = null;

	function timerstart() {
	    if (timeBegan === null) {
	        timeBegan = new Date();
	    }

	    if (timeStopped !== null) {
	        stoppedDuration += (new Date() - timeStopped);
	    }
	    //console.log(stoppedDuration);

	    started = setInterval(clockRunning, 10);	
	}

	function stop() {
	    timeStopped = new Date();
	    clearInterval(started);
	}
	 
	function reset() {
	    clearInterval(started);
	    stoppedDuration = 0;
	    timeBegan = null;
	    timeStopped = null;
	    document.getElementById("stopwatch").innerHTML = "00:00:000";
	}

	function clockRunning(){
	    var currentTime = new Date()
	        , timeElapsed = new Date(currentTime - timeBegan - stoppedDuration)
	        , hour = timeElapsed.getUTCHours()
	        , min = timeElapsed.getUTCMinutes()
	        , sec = timeElapsed.getUTCSeconds()
	        , ms = timeElapsed.getUTCMilliseconds();

	    document.getElementById("stopwatch").innerHTML = 
	        (min > 9 ? min : "0" + min) + ":" + 
	        (sec > 9 ? sec : "0" + sec) + ":" + 
	        (ms > 99 ? ms : ms > 9 ? ms : "00" + ms);
	};

	function getScoreboardNames(){
		$('#overlay').css('display','block');
		$.ajax({
			type: "POST",
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
			url: "/getScoreboardNames",
			data: "",
			success: function(data) {
				$('#overlay').css('display','none');
	        	$('.scoreboard').html();
	        	var result = '';
	        	for(i=0;i<data.length;i++)
	        	{
	        		result += '<div class="score-num">';
		        	result += '<div class="row">';
					result += '<div class="col-md-3 col-3 ta-l">';
					result +=  parseFloat(i)+1;
					result += '</div>';
					result += '<div class="col-md-9 col-9 ta-l overflow-text-scoreboard ">';	
					var str = data[i]["name"].split(" ");
					result += str[0];
					result += '</div>';	
					result += '</div>';	
					result += '</div>';	
	        	}
	        	var cap = 10 - parseFloat(data.length);
	        	for(j=0;j<cap;j++)
	        	{
	        		result += '<div class="score-num">';
		        	result += '<div class="row">';
					result += '<div class="col-md-3 col-3 ta-l">';
					result += '-';
					result += '</div>';
					result += '<div class="col-md-9 col-9 ta-l overflow-text-scoreboard ">';	
					result += '-';
					result += '</div>';	
					result += '</div>';	
					result += '</div>';	
	        	}
	        	$(".scoreboard").html(result);
			},
			errpr: function(jqXHR, exception) {
				$('#overlay').css('display','none');
			}

		});
	}
});
