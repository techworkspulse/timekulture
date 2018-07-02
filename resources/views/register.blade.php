<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<form id="registration-form" method="POST" action="">
	{{ csrf_field() }}

	Name: <input type="text" id="name" name="name"><br />
	Email: <input type="text" id="email" name="email"><br />
	Phone: <input type="text" id="phoneNumber" name="phoneNumber"><br />
	Gender: <?=generateGenderRadio()?><br />
	IC Number: <input type="number" id="icNumber" name="icNumber"><br />
	<p style="color: red;" id="error"></p>
	<button id="register-submit" type="button">REGISTER</button>
</form>

<script>
	$(document).ready(function() {
		$('#register-submit').on('click', function(e) {
			$.ajax({
				type: "POST",
				url: "/createPlayer",
				data: $("#registration-form").serialize(),
				success: function(status) {
					var result = JSON.parse(status);
					if (result.status) {
						window.location.href = '/game?token='+result.message+'&matchid='+result.matchid;
					} else {
						$('#error').html(result.message);
					}
				},
				errpr: function(jqXHR, exception) {

				}
			});
		});
		
	});
</script>
</body>

</html>