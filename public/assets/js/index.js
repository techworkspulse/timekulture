$(document).ready(function() {

	// $.get( "db_connection.php", function( data ) {
		// var result = JSON.parse(data);
	// });

	var completionStatus = 0;
	var points = 1000;
	
	var box = $(".box"),
		orginal = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
		temp = orginal,
		x = [],
		sec = 0,
		date1,date2,
		moves = 0,
		mm = 0,
		ss = 0,
		upIMG,
		//images = ["https://preview.ibb.co/kMdsfm/kfp.png","https://preview.ibb.co/kWOEt6/minion.png","https://preview.ibb.co/e0Rv0m/ab.jpg"]
		images = ["http://localhost:82/assets/img/BR-square.png","http://localhost:82/assets/img/Tissot-Square.png","http://localhost:82/assets/img/Tudor-Square.png"]
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
			number = data;
		})
		.fail(function(xhr) {
			//console.log('error', xhr);
			window.location.href = "/register";
		});

		return number;
	}

	var random = getPuzzleId(); 
		
	$('.me').css({"background-image" : 'url('+images[random]+')'});

	$(".start").click(function() {
		$(".start").delay(100).slideUp(500);
		$(".full").hide();
		$(".pre_img").addClass("prevent_click");
		
		date1 = new Date();
		Start();
		submitMatchLog();
		return 0;
	});

	function Start() {
		completionStatus = 0;
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
				$('.me_'+a).css({"opacity": ".65"});
			} else {
				b = $(this).attr("data-bid");	
				$('.me_'+a).css({"opacity": "1"});
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
				showScore();
				submitData();
				return 0;
			}
		});
		return 0;
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
					points--;
				}

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
						'puzzleId': random,
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

	function reducePoint() {
		$.ajax({
			type: "POST",
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
			url: "/calculatePoints",
			data: {
				'uniqueToken': $('#uniqueToken').val(),
				'matchId': $('#matchId').val(),
			},
			success: function(status) {
				
			},
			errpr: function(jqXHR, exception) {

			}
		});
	}

	function submitData() {
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
				'puzzleId': random,
				'points': points,
			},
			success: function(status) {
				
			},
			errpr: function(jqXHR, exception) {

			}
		});
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
			if ((i + 1) % 6 == 0) box.append("<br>");
		}
		i = 17;
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
		if(img != 3){
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
		setTimeout(function(){
		$('.cover').slideDown(350);
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
});