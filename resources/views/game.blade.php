<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <meta name="csrf_token" content="{{ csrf_token() }}" />
  <title>Picture Puzzle Game</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
      <link rel="stylesheet" href="http://localhost:82/assets/css/style.css">
</head>

<body>
	<input type="hidden" id="uniqueToken" name="uniqueToken" value="{{ app('request')->input('token') }}">
	<input type="hidden" id="matchId" name="matchId" value="{{ app('request')->input('matchid') }}">
  <div id="container">	
	<a href="#" class="button start">Start</a>
	<div class="box">	
		<div class="me full"></div>
	</div>
	<div class="pre_img">	
		<!--<li data-bid="0"><img src="https://preview.ibb.co/kMdsfm/kfp.png"></li>
		<li data-bid="1"><img src="https://preview.ibb.co/kWOEt6/minion.png"></li>
		<li data-bid="2"><img src="https://preview.ibb.co/e0Rv0m/ab.jpg"></li>	
		<li data-bid="3" id="upfile1"><img src="https://image.ibb.co/cXSomR/upload1.png" /></li>
		<input type="file" name="image" id="file1" style="display: none">-->
	</div>
	<!--<div align="center"><a href="#" class="button reset" align="center">Reset</a></div>-->
</div>

<div class="cover" >
	<div class="score">
		<p id="scr_head"> &#9875 Puzzel Solved &#9875</p>
		<p id="scr_time"> Time : <span id="min">00</span> Min <span id="sec">00</span> Sec</p>
		<p id="scr_moves"> Moves : <span id="moves"></span></p>
		<p class="i">developed by mayur birle</p>
		<div class="button OK">OK</div>
	</div>
</div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

  

    <script  src="http://localhost:82/assets/js/index.js"></script>




</body>

</html>
