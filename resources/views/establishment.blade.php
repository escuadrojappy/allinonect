<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Contact Tracing</title>
	<link rel="stylesheet" href="{{ asset('css/establishment.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/libraries/jquery-confirm.min.css') }}">
	<script src="{{ asset('/js/common.js') }}"></script>
	<script src="{{ asset('/js/jquery-3.6.1.min.js') }}"></script>
	<script src="{{ asset('/js/jquery-confirm.min.js') }}"></script>
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">

</head>

<body style="background-color: rgb(131, 127, 116)">
	<div class="main">
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form id="registrationForm">
				<img src="{{ asset('images/Establishment.png')}}" alt="" id= "logo" >
					<label class="label1" for="chk" aria-hidden="true">Establishment</label>
					<input type="email" name="email" placeholder="Email" id="email" required>
					<input type="text" name="name" placeholder="Business Name" id="business_name" required>
					<textarea name="business_address" rows="3" placeholder="Business Address" id="business_address" required></textarea>
					<input type="number" name="contact_number" placeholder="Contact Number" id="contact_number" required>
					<button type="submit" class="btn">Sign up</button>
				</form>
			</div>

			{{-- <div class="login">
				<form>
					<label class="label2" for="chk" aria-hidden="true">Sign In</label>
					<input type="email" name="email" placeholder="Email" required="" class='login1'>
					<input type="password" name="password" placeholder="Password" required="" class="login2">
					<button class="btn">Submit</button>
				</form>
			</div> --}}
	</div>

	<script>
		$(document).ready(function () {
			$(document).on('submit', '#registrationForm', function (e){
				e.preventDefault()
				var params = {
					email: $('#email').val(),
					name: $('#business_name').val(),
					address: $('#business_address').val(),
					contact_number: $('#contact_number').val(),
					role_id: 2
				}
				$.post(`${apiUrl}auth/registration`, params).done((result) => {
                    alert('Successfully Created!')
                }).fail((error) => {
                    console.log(error)
                })
			})
		}) 
	</script>
</body>
</html>
