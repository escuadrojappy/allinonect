@extends('master.logins')

@section('content')
	<link rel="stylesheet" href="{{ asset('css/doh.css') }}">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
	<style>
		
	</style>

	<div class="bg-login">
		<div class="main">
			<input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup">
				<form id="login-form">
					<img src="{{ asset('images/doh.png') }}" alt="">
					<label>Department of Health</label>
					<p>Administrator Account</p>
					<input type="email" name="email" placeholder="Email" required>
					<input type="password" name="password" placeholder="Password" required>
					<button type="submit" class="btn">
						Sign In
					</button>
				</form>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function () {
			$(document).on('submit', '#login-form', function (e) {
				e.preventDefault()
				var params = {}
				$('#login-form input').each((key, element) => {
					var name = $(element).attr('name')
					var value = $(element).val()
					params[name] = value
				})

				$.post(`${apiUrl}auth/login`, params).done((result) => {
					console.log(result)
				}).fail((error) => {
					if (error.status == 401) {
						$.confirm({
							title: 'Encountered an error!',
							content: 'Please match your registered email address and password.',
							type: 'red',
							typeAnimated: true,
							buttons: {
								tryAgain: {
									text: 'Try again',
									btnClass: 'btn-red',
									action: function(){
									}
								},
								close: function () {
								}
							}
						});
						// $.alert({
						// 	title: error.responseJSON.message,
						// 	content: 'Please match your registered email address and password.',
						// 	boxWidth: '300px',
						// 	useBootstrap: false 
						// })  
					}
					
				})


				// console.log(`${apiUrl}registration`)
			})
		})
	</script>
@endsection
