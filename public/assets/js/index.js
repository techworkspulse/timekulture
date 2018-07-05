$(document).ready(function() {


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
			number = data;
		})
		.fail(function(xhr) {
			//console.log('error', xhr);
			window.location.href = "/";
		});

		return number;
	}

	var random = getPuzzleId(); 


	$('.me').css({"background-image" : 'url('+images[random]+')'});

	$(".start").click(function() {
		$(".start").delay(100).slideUp(500);
		$(".full, .start-container").hide();
		$(".pre_img").addClass("prevent_click");

		date1 = new Date();
		Start();
		return 0;
	});

	function Start() {
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
				showScore();
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
